<?php
namespace Entities;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use mkw\consts;
use mkw\store;

/** @ORM\Entity(repositoryClass="Entities\BizonylatfejRepository")
 * @ORM\Table(name="bizonylatfej",options={"collate"="utf8_hungarian_ci", "charset"="utf8", "engine"="InnoDB"})
 * */
class Bizonylatfej {

    private $duplication;

    /**
     * @ORM\Id @ORM\Column(type="string",length=30,nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $trxid;

    /**
     * @ORM\Column(type="bigint", options={"unsigned"=true},nullable=true)
     */
    private $otpayid;

    /**
     * @ORM\Column(type="string", length=30,nullable=true)
     */
    private $otpaymsisdn;

    /**
     * @ORM\Column(type="string", length=30,nullable=true)
     */
    private $otpaympid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $otpayresult;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $otpayresulttext;

    /**
     * @ORM\Column(type="string", length=36,nullable=true)
     */
    private $masterpasscorrelationid;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $masterpassbanktrxid;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $masterpasstrxid;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $foxpostbarcode;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $fix = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $mese = false;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $lastmod;

    /**
     * @ORM\ManyToOne(targetEntity="Bizonylattipus", inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="bizonylattipus_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Bizonylattipus
     */
    private $bizonylattipus;

    /** @ORM\Column(type="string",length=100,nullable=true) */
    private $bizonylatnev;

    /** @ORM\Column(type="integer") */
    private $irany;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $nyomtatva = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $storno = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $stornozott = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $rontott = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $penztmozgat;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $fizetve = false;

    /** @ORM\Column(type="string",length=255,nullable=false) */
    private $tulajnev;

    /** @ORM\Column(type="string",length=10,nullable=false) */
    private $tulajirszam;

    /** @ORM\Column(type="string",length=40,nullable=true) */
    private $tulajvaros;

    /** @ORM\Column(type="string",length=60,nullable=true) */
    private $tulajutca;

    /** @ORM\Column(type="string",length=13,nullable=false) */
    private $tulajadoszam;

    /** @ORM\Column(type="string",length=30,nullable=true) */
    private $tulajeuadoszam;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $tulajeorinr;

    /** @ORM\Column(type="string",length=30,nullable=true) */
    private $erbizonylatszam;

    /** @ORM\Column(type="string",length=100,nullable=true) */
    private $fuvarlevelszam;

    /** @ORM\Column(type="date",nullable=false) */
    private $kelt;

    /** @ORM\Column(type="date",nullable=false) */
    private $teljesites;

    /** @ORM\Column(type="date",nullable=true) */
    private $esedekesseg;

    /** @ORM\Column(type="date",nullable=true) */
    private $esedekesseg1;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $fizetendo1;

    /** @ORM\Column(type="date",nullable=true) */
    private $esedekesseg2;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $fizetendo2;

    /** @ORM\Column(type="date",nullable=true) */
    private $esedekesseg3;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $fizetendo3;

    /**
     * @ORM\ManyToOne(targetEntity="Fizmod",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="fizmod_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Fizmod
     */
    private $fizmod;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $fizmodnev;

    /**
     * @ORM\ManyToOne(targetEntity="Szallitasimod",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="szallitasimod_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Szallitasimod
     */
    private $szallitasimod;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $szallitasimodnev;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $netto;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $afa;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $brutto;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $fizetendo;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $kerkul;

    /**
     * @ORM\ManyToOne(targetEntity="Valutanem",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="valutanem_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Valutanem
     */
    private $valutanem;

    /** @ORM\Column(type="string",length=6,nullable=true) */
    private $valutanemnev;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $nettohuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $afahuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $bruttohuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $arfolyam;

    /**
     * @ORM\ManyToOne(targetEntity="Partner",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="partner_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Partner
     */
    private $partner;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $partnernev;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $partnervezeteknev = '';

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $partnerkeresztnev = '';

    /** @ORM\Column(type="string",length=13,nullable=true) */
    private $partneradoszam;

    /** @ORM\Column(type="string",length=30,nullable=true) */
    private $partnereuadoszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnermukengszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnerjovengszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnerostermszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnervalligszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnerfvmszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnercjszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $partnerstatszamjel;

    /** @ORM\Column(type="string",length=10,nullable=true) */
    private $partnerirszam;

    /** @ORM\Column(type="string",length=40,nullable=true) */
    private $partnervaros;

    /** @ORM\Column(type="string",length=60,nullable=true) */
    private $partnerutca;

    /** @ORM\Column(type="string",length=10,nullable=true) */
    private $partnerlirszam;

    /** @ORM\Column(type="string",length=40,nullable=true) */
    private $partnerlvaros;

    /** @ORM\Column(type="string",length=60,nullable=true) */
    private $partnerlutca;

    /** @ORM\Column(type="string",length=100,nullable=true) */
    private $partneremail = '';

    /** @ORM\Column(type="string",length=40,nullable=true) */
    private $partnertelefon = '';

    /**
     * @ORM\ManyToOne(targetEntity="Bankszamla",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="bankszamla_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Bankszamla
     */
    private $bankszamla;

    /** @ORM\Column(type="string",length=50,nullable=true) */
    private $tulajbanknev;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $tulajbankszamlaszam;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $tulajswift;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $tulajiban;

    /**
     * @ORM\ManyToOne(targetEntity="Uzletkoto",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="uzletkoto_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Uzletkoto
     */
    private $uzletkoto;

    /** @ORM\Column(type="string",length=50,nullable=true) */
    private $uzletkotonev;

    /** @ORM\Column(type="string",length=100,nullable=true) */
    private $uzletkotoemail;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $uzletkotojutalek;

    /**
     * @ORM\ManyToOne(targetEntity="Raktar",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="raktar_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Raktar
     */
    private $raktar;

    /** @ORM\Column(type="string",length=50,nullable=true) */
    private $raktarnev;

    /** @ORM\OneToMany(targetEntity="Bizonylattetel", mappedBy="bizonylatfej",cascade={"persist"}) */
    private $bizonylattetelek;

    /** @ORM\Column(type="text",nullable=true) */
    private $megjegyzes;

    /** @ORM\Column(type="text",nullable=true) */
    private $belsomegjegyzes;

    /** @ORM\Column(type="text",nullable=true) */
    private $webshopmessage;

    /** @ORM\Column(type="text",nullable=true) */
    private $couriermessage;

    /** @ORM\Column(type="text",nullable=true) */
    private $sysmegjegyzes;

    /** @ORM\Column(type="date",nullable=true) */
    private $hatarido;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $szallnev = '';

    /** @ORM\Column(type="string",length=10,nullable=true) */
    private $szallirszam = '';

    /** @ORM\Column(type="string",length=40,nullable=true) */
    private $szallvaros = '';

    /** @ORM\Column(type="string",length=60,nullable=true) */
    private $szallutca = '';

    /** @ORM\Column(type="string",length=32,nullable=true) */
    private $ip;

    /** @ORM\Column(type="text",nullable=true) */
    private $referrer;

    /**
     * @ORM\ManyToOne(targetEntity="Bizonylatstatusz",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="bizonylatstatusz_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Bizonylatstatusz
     */
    private $bizonylatstatusz;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $bizonylatstatusznev;

    /** @ORM\Column(type="string",length=255, nullable=true) */
    private $bizonylatstatuszcsoport;


    /**
     * @ORM\ManyToOne(targetEntity="Bizonylatfej",inversedBy="szulobizonylatfejek")
     * @ORM\JoinColumn(name="parbizonylatfej_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\Bizonylatfej
     */
    private $parbizonylatfej;

    /** @ORM\OneToMany(targetEntity="Bizonylatfej", mappedBy="parbizonylatfej",cascade={"persist"}) */
    private $szulobizonylatfejek;

    /** @ORM\Column(type="integer") */
    private $partnerszamlatipus;

    /**
     * @ORM\ManyToOne(targetEntity="FoxpostTerminal",inversedBy="bizonylatfejek")
     * @ORM\JoinColumn(name="foxpostterminal_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     * @var \Entities\FoxpostTerminal
     */
    private $foxpostterminal;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $traceurl;

    /** @ORM\Column(type="string",length=10,nullable=true) */
    private $bizonylatnyelv;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $reportfile;

    /** @ORM\OneToMany(targetEntity="Folyoszamla", mappedBy="bizonylatfej",cascade={"persist"}) */
    private $folyoszamlak;

    /** @ORM\Column(type="integer",nullable=true) */
    private $regmode;

    /** @ORM\Column(type="integer",nullable=true) */
    private $stornotipus;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $tulajkisadozo = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $tulajegyenivallalkozo = false;

    /** @ORM\Column(type="string",length=100,nullable=true) */
    private $tulajevnev;

    /** @ORM\Column(type="string",length=100,nullable=true) */
    private $tulajevnyilvszam;

    public function __toString() {
        return (string)$this->id;
    }

    public function calcOsszesen() {
        $mincimlet = 0;
        $kerekit = false;
        $defakerekit = false;
        if ($this->getValutanem()) {
            $mincimlet = $this->getValutanem()->getMincimlet();
            $kerekit = $this->getValutanem()->getKerekit();
        }
        $defavaluta = \mkw\Store::getEm()->getRepository('Entities\Valutanem')->find(\mkw\Store::getParameter(\mkw\consts::Valutanem));
        if ($defavaluta) {
            $defakerekit = $defavaluta->getKerekit();
        }
        $fizmodtipus = 'B';
        $fizmod = $this->getFizmod();
        if ($fizmod) {
            $fizmodtipus = $fizmod->getTipus();
        }
        $this->netto = 0;
        $this->afa = 0;
        $this->brutto = 0;
        $this->nettohuf = 0;
        $this->afahuf = 0;
        $this->bruttohuf = 0;
        foreach ($this->bizonylattetelek as $bt) {
            $this->netto += $bt->getNetto();
            $this->afa += $bt->getAfaertek();
            //$this->brutto += $bt->getBrutto();
            $this->nettohuf += $bt->getNettohuf();
            $this->afahuf += $bt->getAfaertekhuf();
            //$this->bruttohuf += $bt->getBruttohuf();
        }
        if ($kerekit) {
            $this->brutto = round($this->netto + $this->afa);
        }
        else {
            $this->brutto = $this->netto + $this->afa;
        }
        if ($mincimlet && ($fizmodtipus == 'P')) {
            $valosbrutto = $this->brutto;
            $this->brutto = \mkw\Store::kerekit($this->brutto, $mincimlet);
            $this->kerkul = $this->brutto - $valosbrutto;
        }
        $this->fizetendo = $this->brutto;
        if ($defakerekit) {
            $this->bruttohuf = round($this->nettohuf + $this->afahuf);
        }
        else {
            $this->bruttohuf = $this->nettohuf + $this->afahuf;
        }
    }

    public function calcRugalmasFizmod() {
        $regifizmod = $this->getFizmod();
        if ($regifizmod->getRugalmas()) {
            $fh = \mkw\Store::getEm()->getRepository('Entities\FizmodHatar')->getByValutanemHatar($this->getValutanem(), $this->getFizetendo());
            if ($fh) {
                $this->setFizmod($fh->getFizmod());
            }
        }
    }
    public function calcOsztottFizetendo() {
        // superzone osztott fizetendo
        if (\mkw\Store::isOsztottFizmod()) {
            $this->setEsedekesseg1();
            $this->setFizetendo1(0);
            $this->setEsedekesseg2();
            $this->setFizetendo2(0);
            $this->setEsedekesseg3();
            $this->setFizetendo3(0);
            $eddigi = 0;
            $fizmod = $this->getFizmod();
            $kelt = new \DateTimeImmutable(\mkw\Store::convDate($this->getKeltStr()));
            if ($fizmod->getOsztotthaladek1() && ($fizmod->getOsztottszazalek1() * 1 > 0)) {
                $this->setEsedekesseg1($kelt->add(new \DateInterval('P' . $fizmod->getOsztotthaladek1() . 'D')));
                $fiz = round($this->fizetendo * $fizmod->getOsztottszazalek1() / 100, 2);
                $this->setFizetendo1($fiz);
                $eddigi = $eddigi + $fiz;
            }
            if ($fizmod->getOsztotthaladek2()) {
                $this->setEsedekesseg2($kelt->add(new \DateInterval('P' . $fizmod->getOsztotthaladek2() . 'D')));
                if ($fizmod->getOsztottszazalek2() * 1 > 0) {
                    $fiz = round($this->fizetendo * $fizmod->getOsztottszazalek2() / 100, 2);
                    $this->setFizetendo2($fiz);
                    $eddigi = $eddigi + $fiz;
                }
                else {
                    $this->setFizetendo2($this->fizetendo - $eddigi);
                    $eddigi = $this->fizetendo;
                }
            }
            if ($fizmod->getOsztotthaladek3()) {
                $this->setEsedekesseg3($kelt->add(new \DateInterval('P' . $fizmod->getOsztotthaladek3() . 'D')));
                $this->setFizetendo3($this->fizetendo - $eddigi);
            }
        }
    }

    public function __construct() {
        $this->szulobizonylatfejek = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bizonylattetelek = new \Doctrine\Common\Collections\ArrayCollection();
        $this->folyoszamlak = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setPersistentData();
    }

    public function getEgyenleg() {
        if ($this->getStorno() || $this->getStornozott() || $this->getRontott() || !$this->getPenztmozgat()) {
            return 0;
        }
        return \mkw\Store::getEm()->getRepository('Entities\Folyoszamla')->getSumByHivatkozottBizonylat($this->getId());
    }

    public function getOsztottEgyenleg() {
        if ($this->getStorno() || $this->getStornozott() || $this->getRontott() || !$this->getPenztmozgat()) {
            return 0;
        }
        return \mkw\Store::getEm()->getRepository('Entities\Folyoszamla')->getSumByHivatkozottBizonylatDatum($this->getId());
    }

    /**
     * @param \Entities\Emailtemplate $emailtpl
     * @param \Entities\Bizonylatfej|null $bf
     * @param bool|true $topartner
     */
    public function sendStatuszEmail($emailtpl, $bf = null, $topartner = true) {
        if (!$bf) {
            $bf = $this;
        }
        if ($emailtpl) {
            $tpldata = $bf->toLista();
            $subject = \mkw\Store::getTemplateFactory()->createMainView('string:' . $emailtpl->getTargy());
            $subject->setVar('rendeles', $tpldata);
            $body = \mkw\Store::getTemplateFactory()->createMainView('string:' . $emailtpl->getHTMLSzoveg());
            $body->setVar('rendeles', $tpldata);
            if (\mkw\Store::getConfigValue('developer')) {
                \mkw\Store::writelog($subject->getTemplateResult(), 'bizstatuszemail.html');
                \mkw\Store::writelog($body->getTemplateResult(), 'bizstatuszemail.html');
            }
            else {
                $mailer = \mkw\Store::getMailer();
                if ($topartner) {
                    $mailer->addTo($bf->getPartneremail());
                    $m = explode(',', $bf->getUzletkotoemail());
                    $mailer->addTo($m);
                }
                $mailer->setSubject($subject->getTemplateResult());
                $mailer->setMessage($body->getTemplateResult());
                $mailer->send();
            }
        }
    }

    public function toLista() {
        $ret = array();
        $ret['id'] = $this->getId();
        $ret['editprinted'] = $this->getBizonylattipus() ? $this->getBizonylattipus()->getEditprinted() : false;
        $ret['bizonylatnev'] = $this->getBizonylatnev();
        $ret['nyomtatva'] = $this->getNyomtatva();
        $ret['raktarnev'] = $this->getRaktarnev();
        $ret['kelt'] = $this->getKeltStr();
        $ret['keltstr'] = $this->getKeltStr();
        $ret['teljesitesstr'] = $this->getTeljesitesStr();
        $ret['esedekessegstr'] = $this->getEsedekessegStr();
        $ret['esedekesseg1str'] = $this->getEsedekesseg1Str();
        $ret['fizetendo1'] = $this->getFizetendo1();
        $ret['esedekesseg2str'] = $this->getEsedekesseg2Str();
        $ret['fizetendo2'] = $this->getFizetendo2();
        $ret['esedekesseg3str'] = $this->getEsedekesseg3Str();
        $ret['fizetendo3'] = $this->getFizetendo3();
        $ret['tulajnev'] = $this->getTulajnev();
        $ret['tulajirszam'] = $this->getTulajirszam();
        $ret['tulajvaros'] = $this->getTulajvaros();
        $ret['tulajutca'] = $this->getTulajutca();
        $ret['tulajadoszam'] = $this->getTulajadoszam();
        $ret['tulajeuadoszam'] = $this->getTulajeuadoszam();
        $ret['tulajeorinr'] = $this->getTulajeorinr();
        $ret['ertek'] = $this->getBrutto();
        $ret['nettohuf'] = $this->getNettohuf();
        $ret['afahuf'] = $this->getAfahuf();
        $ret['bruttohuf'] = $this->getBruttohuf();
        $ret['netto'] = $this->getNetto();
        $ret['afa'] = $this->getAfa();
        $ret['brutto'] = $this->getBrutto();
        $ret['fizetendo'] = $this->getFizetendo();
        $ret['fizetendokiirva'] = \mkw\Store::Num2Text($this->getFizetendo());
        $ret['fizmodnev'] = $this->getFizmodnev();
        $ret['szallitasimodnev'] = $this->getSzallitasimodnev();
        $ret['tulajbanknev'] = $this->getTulajbanknev();
        $ret['tulajbankszamlaszam'] = $this->getTulajbankszamlaszam();
        $ret['tulajiban'] = $this->getTulajiban();
        $ret['tulajswift'] = $this->getTulajswift();
        $ret['partneremail'] = $this->getPartneremail();
        $ret['partnertelefon'] = $this->getPartnertelefon();
        $ret['partnerkeresztnev'] = $this->getPartnerkeresztnev();
        $ret['partnervezeteknev'] = $this->getPartnervezeteknev();
        $ret['szamlanev'] = $this->getPartnernev();
        $ret['szamlairszam'] = $this->getPartnerirszam();
        $ret['szamlavaros'] = $this->getPartnervaros();
        $ret['szamlautca'] = $this->getPartnerutca();
        $ret['telefon'] = $this->getPartnertelefon();
        $ret['szallnev'] = $this->getSzallnev();
        $ret['szallirszam'] = $this->getSzallirszam();
        $ret['szallvaros'] = $this->getSzallvaros();
        $ret['szallutca'] = $this->getSzallutca();
        $ret['adoszam'] = $this->getPartneradoszam();
        $ret['euadoszam'] = $this->getPartnereuadoszam();
        $ret['partneradoszam'] = $this->getPartneradoszam();
        $ret['partnereuadoszam'] = $this->getPartnereuadoszam();
        $ret['webshopmessage'] = $this->getWebshopmessage();
        $ret['couriermessage'] = $this->getCouriermessage();
        $ret['megjegyzes'] = $this->getMegjegyzes();
        $ret['allapotnev'] = $this->getBizonylatstatusznev();
        $ret['fuvarlevelszam'] = $this->getFuvarlevelszam();
        $ret['erbizonylatszam'] = $this->getErbizonylatszam();
        $ret['valutanemnev'] = $this->getValutanemnev();
        $ret['arfolyam'] = $this->getArfolyam();
        $ret['partnerszamlatipus'] = $this->getPartnerSzamlatipus();
        $ret['uzletkotonev'] = $this->getUzletkotonev();
        $ret['uzletkotoemail'] = $this->getUzletkotoemail();
        $ret['uzletkotojutalek'] = $this->getUzletkotojutalek();
        $ret['stornotipus'] = $this->getStornotipus();
        $ret['storno'] = $this->getStorno();
        $ret['stornozott'] = $this->getStornozott();
        $ret['foxpost'] = false;
        if ($this->foxpostterminal) {
            $ret['foxpost'] = true;
            $ret['foxpostterminal']['nev'] = $this->foxpostterminal->getNev();
            $ret['foxpostterminal']['cim'] = $this->foxpostterminal->getCim();
            $ret['foxpostterminal']['findme'] = $this->foxpostterminal->getFindme();
            $ret['foxpostterminal']['nyitva'] = $this->foxpostterminal->getNyitva();
        }
        $tetellist = array();
        foreach ($this->bizonylattetelek as $tetel) {
            $tetellist[] = $tetel->toLista();
        }
        $ret['tetellista'] = $tetellist;
        return $ret;
    }

    public function setPersistentData() {
        $this->setTulajData();
    }

    protected function setTulajData() {
        $this->setTulajnev(store::getParameter(\mkw\consts::Tulajnev));
        $this->setTulajirszam(store::getParameter(\mkw\consts::Tulajirszam));
        $this->setTulajvaros(store::getParameter(\mkw\consts::Tulajvaros));
        $this->setTulajutca(store::getParameter(\mkw\consts::Tulajutca));
        $this->setTulajadoszam(store::getParameter(\mkw\consts::Tulajadoszam));
        $this->setTulajeuadoszam(store::getParameter(\mkw\consts::Tulajeuadoszam));
        $this->setTulajeorinr(store::getParameter(\mkw\consts::Tulajeorinr));
        $this->setTulajkisadozo(store::getParameter(consts::Tulajkisadozo, false));
        $this->setTulajegyenivallalkozo(store::getParameter(consts::Tulajegyenivallalkozo, false));
        $this->setTulajevnev(store::getParameter(consts::Tulajevnev));
        $this->setTulajevnyilvszam(store::getParameter(consts::Tulajevnyilvszam));
    }

    public function calcEsedekesseg() {
        $this->esedekesseg = \mkw\Store::calcEsedekesseg($this->getKelt(), $this->getFizmod(), $this->getPartner());
    }

    public function getId() {
        return $this->id;
    }

    public function setId($val) {
        if (!$this->id) {
            $this->id = $val;
        }
    }

    public function clearId() {
        $this->id = null;
    }

    public function getTrxId() {
        return $this->trxid;
    }

    public function getOTPayId() {
        return $this->otpayid;
    }

    public function setOTPayId($val) {
        $this->otpayid = $val;
    }

    public function generateId($from = null) {
        if ($this->getId()) {
            return $this->getId();
        }
        $bt = $this->getBizonylattipus();
        $szam = 0;
        if ($bt && is_null($this->id)) {
            $azon = $bt->getAzonosito();
            if (is_null($azon)) {
                $azon = '';
            }
            $kezdo = $bt->getKezdosorszam();
            $ev = $this->getKelt()->format('Y');
            if (!$from) {
                $q = store::getEm()->createQuery('SELECT COUNT(bf) FROM Entities\Bizonylatfej bf WHERE bf.bizonylattipus=:p');
                $q->setParameters(array('p' => $bt));
                if ($q->getSingleScalarResult() > 0) {
                    $kezdo = 1;
                }
                if (!$kezdo) {
                    $kezdo = 1;
                }
                $szam = $kezdo;
                $q = store::getEm()->createQuery('SELECT MAX(bf.id) FROM Entities\Bizonylatfej bf WHERE (bf.bizonylattipus=:p1) AND (YEAR(bf.kelt)=:p2)');
                $q->setParameters(array(
                    'p1' => $bt,
                    'p2' => $ev
                ));
                $max = $q->getSingleScalarResult();
                if ($max) {
                    $szam = explode('/', $max);
                    if (is_array($szam)) {
                        $szam = $szam[1] + 1;
                    }
                }
            }
            else {
                $szam = $from;
                $q = store::getEm()->createQuery('SELECT MAX(bf.id) FROM Entities\Bizonylatfej bf WHERE (bf.bizonylattipus=:p1) AND (YEAR(bf.kelt)=:p2)');
                $q->setParameters(array(
                    'p1' => $bt,
                    'p2' => $ev
                ));
                $max = $q->getSingleScalarResult();
                if ($max) {
                    $szam = explode('/', $max);
                    if (is_array($szam)) {
                        $szam = $szam[1] + 1;
                    }
                }
                if ($szam < $from) {
                    $szam = $from;
                }
            }
            $this->id = \mkw\Store::createBizonylatszam($azon, $ev, $szam);
        }
        return $szam;
    }

    public function getBizonylattetelek() {
        return $this->bizonylattetelek;
    }

    public function addBizonylattetel(Bizonylattetel $val) {
        if (!$this->bizonylattetelek->contains($val)) {
            $val->setIrany($this->getIrany());
            $this->bizonylattetelek->add($val);
            $val->setBizonylatfej($this);
        }
    }

    public function removeBizonylattetel(Bizonylattetel $val) {
        if ($this->bizonylattetelek->removeElement($val)) {
            $val->removeBizonylatfej();
            return true;
        }
        return false;
    }

    public function clearBizonylattetelek() {
        $this->bizonylattetelek->clear();
    }

    public function getFolyoszamlak() {
        return $this->folyoszamlak;
    }

    public function addFolyoszamla(Folyoszamla $val) {
        if (!$this->folyoszamlak->contains($val)) {
            $this->folyoszamlak->add($val);
            $val->setBizonylatfej($this);
        }
    }

    public function removeFolyoszamla(Folyoszamla $val) {
        if ($this->folyoszamlak->removeElement($val)) {
            $val->removeBizonylatfej();
            return true;
        }
        return false;
    }

    public function clearFolyoszamlak() {
        $this->folyoszamlak->clear();
    }

    public function getIrany() {
        return $this->irany;
    }

    public function setIrany($val) {
        $this->irany = $val;
    }

    /**
     * @return \Entities\Bizonylattipus
     */
    public function getBizonylattipus() {
        return $this->bizonylattipus;
    }

    public function getBizonylattipusId() {
        if ($this->bizonylattipus) {
            return $this->bizonylattipus->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Bizonylattipus $val
     */
    public function setBizonylattipus($val) {
        if ($this->bizonylattipus !== $val) {
            if (!$val) {
                $this->removeBizonylattipus();
            }
            else {
                $this->bizonylattipus = $val;
                if (!$this->duplication) {
                    $this->setIrany($val->getIrany());
                    $this->setBizonylatnev($val->getNev());
                    $this->setPenztmozgat($val->getPenztmozgat());
                    $this->setReportfile($val->getTplname());
                }
            }
        }
    }

    public function removeBizonylattipus() {
        if ($this->bizonylattipus !== null) {
            $this->bizonylattipus = null;
            if (!$this->duplication) {
                $this->bizonylatnev = '';
                $this->setReportfile('');
            }
        }
    }

    public function getBizonylatnev() {
        return $this->bizonylatnev;
    }

    public function setBizonylatnev($val) {
        $this->bizonylatnev = $val;
    }

    public function getNyomtatva() {
        return $this->nyomtatva;
    }

    public function setNyomtatva($val) {
        $this->nyomtatva = $val;
    }

    public function getStorno() {
        return $this->storno;
    }

    public function setStorno($val) {
        $this->storno = $val;
        if ($this->storno && !$this->duplication) {
            $this->setStornozott(false);
        }
    }

    public function getStornozott() {
        return $this->stornozott;
    }

    public function setStornozott($val) {
        $this->stornozott = $val;
        if ($this->stornozott && !$this->duplication) {
            $this->setStorno(false);
        }
        if (!$this->duplication) {
            foreach ($this->bizonylattetelek as $bt) {
                $bt->setStornozott($val);
                \mkw\Store::getEm()->persist($bt);
            }
        }
    }

    public function getMozgat() {
        $bt = $this->getBizonylattipus();
        $raktar = $this->getRaktar();
        if ($bt && $raktar) {
            return $bt->getMozgat() && $raktar->getMozgat();
        }
        return false;
    }

    public function getFoglal() {
        $bt = $this->getBizonylattipus();
        if ($bt) {
            return $bt->getFoglal();
        }
        return false;
    }

    public function getPenztmozgat() {
        return $this->penztmozgat;
    }

    public function setPenztmozgat($val) {
        $this->penztmozgat = $val;
    }

    public function getTulajnev() {
        return $this->tulajnev;
    }

    public function setTulajnev($val) {
        $this->tulajnev = $val;
    }

    public function getTulajirszam() {
        return $this->tulajirszam;
    }

    public function setTulajirszam($val) {
        $this->tulajirszam = $val;
    }

    public function getTulajvaros() {
        return $this->tulajvaros;
    }

    public function setTulajvaros($val) {
        $this->tulajvaros = $val;
    }

    public function getTulajutca() {
        return $this->tulajutca;
    }

    public function setTulajutca($val) {
        $this->tulajutca = $val;
    }

    public function getTulajadoszam() {
        return $this->tulajadoszam;
    }

    public function setTulajadoszam($val) {
        $this->tulajadoszam = $val;
    }

    public function getTulajeuadoszam() {
        return $this->tulajeuadoszam;
    }

    public function setTulajeuadoszam($val) {
        $this->tulajeuadoszam = $val;
    }

    public function getTulajeorinr() {
        return $this->tulajeorinr;
    }

    public function setTulajeorinr($val) {
        $this->tulajeorinr = $val;
    }

    public function getKelt() {
        if (!$this->id && !$this->kelt) {
            $this->kelt = new \DateTime(\mkw\Store::convDate(date(\mkw\Store::$DateFormat)));
        }
        return $this->kelt;
    }

    public function getKeltStr() {
        if ($this->getKelt()) {
            return $this->getKelt()->format(store::$DateFormat);
        }
        return '';
    }

    public function setKelt($adat = '') {
        if (is_a($adat, 'DateTime')) {
            $this->kelt = $adat;
        }
        else {
            if ($adat == '') {
                $adat = date(store::$DateFormat);
            }
            $this->kelt = new \DateTime(store::convDate($adat));
        }
    }

    public function getTeljesites() {
        if (!$this->id && !$this->teljesites) {
            $this->teljesites = new \DateTime(\mkw\Store::convDate(date(\mkw\Store::$DateFormat)));
        }
        return $this->teljesites;
    }

    public function getTeljesitesStr() {
        if ($this->getTeljesites()) {
            return $this->getTeljesites()->format(store::$DateFormat);
        }
        return '';
    }

    public function setTeljesites($adat = '') {
        if (is_a($adat, 'DateTime')) {
            $this->teljesites = $adat;
        }
        else {
            if ($adat == '') {
                $adat = date(store::$DateFormat);
            }
            $this->teljesites = new \DateTime(store::convDate($adat));
        }
    }

    public function getEsedekesseg() {
        if (!$this->id && !$this->esedekesseg) {
            $this->esedekesseg = new \DateTime(\mkw\Store::convDate(date(\mkw\Store::$DateFormat)));
        }
        return $this->esedekesseg;
    }

    public function getEsedekessegStr() {
        if ($this->getEsedekesseg()) {
            return $this->getEsedekesseg()->format(store::$DateFormat);
        }
        return '';
    }

    public function setEsedekesseg($adat = '') {
        if (is_a($adat, 'DateTime')) {
            $this->esedekesseg = $adat;
        }
        else {
            if ($adat == '') {
                $adat = date(store::$DateFormat);
            }
            $this->esedekesseg = new \DateTime(store::convDate($adat));
        }
    }

    public function getHatarido() {
        if (!$this->id && !$this->hatarido) {
            $this->hatarido = new \DateTime(\mkw\Store::convDate(date(\mkw\Store::$DateFormat)));
        }
        return $this->hatarido;
    }

    public function getHataridoStr() {
        if ($this->getHatarido()) {
            return $this->getHatarido()->format(store::$DateFormat);
        }
        return '';
    }

    public function setHatarido($adat = '') {
        if (is_a($adat, 'DateTime')) {
            $this->hatarido = $adat;
        }
        else {
            if ($adat == '') {
                $adat = date(store::$DateFormat);
            }
            $this->hatarido = new \DateTime(store::convDate($adat));
        }
    }

    /**
     * @return \Entities\Fizmod
     */
    public function getFizmod() {
        if (!$this->id && !$this->fizmod) {
            $this->setFizmod(\mkw\Store::getParameter(\mkw\consts::Fizmod));
        }
        return $this->fizmod;
    }

    public function getFizmodnev() {
        return $this->fizmodnev;
    }

    public function getFizmodId() {
        $fm = $this->getFizmod();
        if ($fm) {
            return $fm->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Fizmod $val
     */
    public function setFizmod($val) {
        if (!($val instanceof \Entities\Fizmod)) {
            $val = \mkw\Store::getEm()->getRepository('Entities\Fizmod')->find($val);
        }
        if ($this->fizmod !== $val) {
            if (!$val) {
                $this->removeFizmod();
            }
            else {
                $this->fizmod = $val;
                if (!$this->duplication) {
                    $this->fizmodnev = $val->getNev();
                }
            }
        }
    }

    public function removeFizmod() {
        if ($this->fizmod !== null) {
            $this->fizmod = null;
            if (!$this->duplication) {
                $this->fizmodnev = '';
            }
        }
    }

    /**
     * @return \Entities\Szallitasimod
     */
    public function getSzallitasimod() {
        return $this->szallitasimod;
    }

    public function getSzallitasimodnev() {
        return $this->szallitasimodnev;
    }

    public function getSzallitasimodId() {
        if ($this->szallitasimod) {
            return $this->szallitasimod->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Szallitasimod $val
     */
    public function setSzallitasimod($val) {
        if ($this->szallitasimod !== $val) {
            if (!$val) {
                $this->removeSzallitasimod();
            }
            else {
                $this->szallitasimod = $val;
                if (!$this->duplication) {
                    $this->szallitasimodnev = $val->getNev();
                }
            }
        }
    }

    public function removeSzallitasimod() {
        if ($this->szallitasimod !== null) {
            $this->szallitasimod = null;
            if (!$this->duplication) {
                $this->szallitasimodnev = '';
            }
        }
    }

    public function getNetto() {
        return $this->netto;
    }

    public function setNetto($val) {
        $this->netto = $val;
    }

    public function getAfa() {
        return $this->afa;
    }

    public function setAfa($val) {
        $this->afa = $val;
    }

    public function getBrutto() {
        return $this->brutto;
    }

    public function setBrutto($val) {
        $this->brutto = $val;
    }

    public function getFizetendo() {
        return $this->fizetendo;
    }

    public function setFizetendo($val) {
        $this->fizetendo = $val;
    }

    /**
     * @return \Entities\Valutanem
     */
    public function getValutanem() {
        if (!$this->id && !$this->valutanem) {
            $this->setValutanem(\mkw\Store::getParameter(\mkw\consts::Valutanem));
        }
        return $this->valutanem;
    }

    public function getValutanemnev() {
        return $this->valutanemnev;
    }

    public function getValutanemId() {
        $vn = $this->getValutanem();
        if ($vn) {
            return $vn->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Valutanem $val
     */
    public function setValutanem($val) {
        if (!($val instanceof \Entities\Valutanem)) {
            $val = \mkw\Store::getEm()->getRepository('Entities\Valutanem')->find($val);
        }
        if ($this->valutanem !== $val) {
            if (!$val) {
                $this->removeValutanem();
            }
            else {
                $this->valutanem = $val;
                if (!$this->duplication) {
                    $this->valutanemnev = $val->getNev();
                }
            }
        }
    }

    public function removeValutanem() {
        if ($this->valutanem !== null) {
            $this->valutanem = null;
            if (!$this->duplication) {
                $this->valutanemnev = '';
                $this->setArfolyam(1);
            }
        }
    }

    public function getNettohuf() {
        return $this->nettohuf;
    }

    public function setNettohuf($val) {
        $this->nettohuf = $val;
    }

    public function getAfahuf() {
        return $this->afahuf;
    }

    public function setAfahuf($val) {
        $this->afahuf = $val;
    }

    public function getBruttohuf() {
        return $this->bruttohuf;
    }

    public function setBruttohuf($val) {
        $this->bruttohuf = $val;
    }

    public function getArfolyam() {
        if (!$this->id && !$this->arfolyam) {
            if ($this->getValutanemId() == \mkw\Store::getParameter(\mkw\consts::Valutanem)) {
                $this->setArfolyam(1);
            }
            else {

            }
        }
        return $this->arfolyam;
    }

    public function setArfolyam($val) {
        $this->arfolyam = $val;
    }

    /**
     * @return \Entities\Partner
     */
    public function getPartner() {
        return $this->partner;
    }

    public function getPartnerId() {
        if ($this->partner) {
            return $this->partner->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Partner $val
     */
    public function setPartner($val) {
        if ($this->partner !== $val) {
            if (!$val) {
                $this->removePartner();
            }
            else {
                $this->partner = $val;
                if (!$this->duplication) {
                    $this->setPartnernev($val->getNev());
                    $this->setPartnervezeteknev($val->getVezeteknev());
                    $this->setPartnerkeresztnev($val->getKeresztnev());
                    $this->setPartneradoszam($val->getAdoszam());
                    $this->setPartnercjszam($val->getCjszam());
                    $this->setPartnereuadoszam($val->getEuadoszam());
                    $this->setPartnerfvmszam($val->getFvmszam());
                    $this->setPartnerirszam($val->getIrszam());
                    $this->setPartnerjovengszam($val->getJovengszam());
                    $this->setPartnerlirszam($val->getLirszam());
                    $this->setPartnerlutca($val->getLutca());
                    $this->setPartnerlvaros($val->getLvaros());
                    $this->setPartnertelefon($val->getTelefon());
                    $this->setPartneremail($val->getEmail());
                    $this->setPartnermukengszam($val->getMukengszam());
                    $this->setPartnerostermszam($val->getOstermszam());
                    $this->setPartnerstatszamjel($val->getStatszamjel());
                    $this->setPartnerutca($val->getUtca());
                    $this->setPartnervalligszam($val->getValligszam());
                    $this->setPartnervaros($val->getVaros());

                    $this->setSzallnev($val->getSzallnev());
                    $this->setSzallirszam($val->getSzallirszam());
                    $this->setSzallvaros($val->getSzallvaros());
                    $this->setSzallutca($val->getSzallutca());

                    $this->setPartnerszamlatipus($val->getSzamlatipus());
                    $this->setBizonylatnyelv($val->getBizonylatnyelv());

                    $uk = $val->getUzletkoto();
                    if ($uk) {
                        $this->setUzletkoto($uk);
                    }
                    else {
                        $this->removeUzletkoto();
                    }
                    $fm = $val->getFizmod();
                    if ($fm) {
                        $this->setFizmod($fm);
                    }
                    else {
                        $this->removeFizmod();
                    }
                    $v = $val->getValutanem();
                    if ($v) {
                        $this->setValutanem($v);
                    }
                    else {
                        $this->removeValutanem();
                    }
                }
            }
        }
    }

    public function removePartner() {
        if ($this->partner !== null) {
            $this->partner = null;
            if (!$this->duplication) {
                $this->partnernev = '';
                $this->partnervezeteknev = '';
                $this->partnerkeresztnev = '';
                $this->partneradoszam = '';
                $this->partnercjszam = '';
                $this->partnereuadoszam = '';
                $this->partnerfvmszam = '';
                $this->partnerirszam = '';
                $this->partnerjovengszam = '';
                $this->partnerlirszam = '';
                $this->partnerlutca = '';
                $this->partnerlvaros = '';
                $this->partnermukengszam = '';
                $this->partnerostermszam = '';
                $this->partnerstatszamjel = '';
                $this->partnerutca = '';
                $this->partnervalligszam = '';
                $this->partnervaros = '';
                $this->partnerszamlatipus = 0;
                $this->szallnev = '';
                $this->szallirszam = '';
                $this->szallvaros = '';
                $this->szallutca = '';
                $this->bizonylatnyelv = '';
                $this->removeUzletkoto();
                $this->removeFizmod();
                $this->removeValutanem();
            }
        }
    }

    public function getPartnernev() {
        return $this->partnernev;
    }

    public function setPartnernev($val) {
        $this->partnernev = $val;
    }

    public function getPartnervezeteknev() {
        return $this->partnervezeteknev;
    }

    public function setPartnervezeteknev($val) {
        $this->partnervezeteknev = $val;
    }

    public function getPartnerkeresztnev() {
        return $this->partnerkeresztnev;
    }

    public function setPartnerkeresztnev($val) {
        $this->partnerkeresztnev = $val;
    }

    public function getPartneradoszam() {
        return $this->partneradoszam;
    }

    public function setPartneradoszam($val) {
        $this->partneradoszam = $val;
    }

    public function getPartnercjszam() {
        return $this->partnercjszam;
    }

    public function setPartnercjszam($val) {
        $this->partnercjszam = $val;
    }

    public function getPartnereuadoszam() {
        return $this->partnereuadoszam;
    }

    public function setPartnereuadoszam($val) {
        $this->partnereuadoszam = $val;
    }

    public function getPartnerfvmszam() {
        return $this->partnerfvmszam;
    }

    public function setPartnerfvmszam($val) {
        $this->partnerfvmszam = $val;
    }

    public function getPartnerirszam() {
        return $this->partnerirszam;
    }

    public function setPartnerirszam($val) {
        $this->partnerirszam = $val;
    }

    public function getPartnerjovengszam() {
        return $this->partnerjovengszam;
    }

    public function setPartnerjovengszam($val) {
        $this->partnerjovengszam = $val;
    }

    public function getPartnerlirszam() {
        return $this->partnerlirszam;
    }

    public function setPartnerlirszam($val) {
        $this->partnerlirszam = $val;
    }

    public function getPartnerlutca() {
        return $this->partnerlutca;
    }

    public function setPartnerlutca($val) {
        $this->partnerlutca = $val;
    }

    public function getPartnerlvaros() {
        return $this->partnerlvaros;
    }

    public function setPartnerlvaros($val) {
        $this->partnerlvaros = $val;
    }

    public function getPartnermukengszam() {
        return $this->partnermukengszam;
    }

    public function setPartnermukengszam($val) {
        $this->partnermukengszam = $val;
    }

    public function getPartnerostermszam() {
        return $this->partnerostermszam;
    }

    public function setPartnerostermszam($val) {
        $this->partnerostermszam = $val;
    }

    public function getPartnerstatszamjel() {
        return $this->partnerstatszamjel;
    }

    public function setPartnerstatszamjel($val) {
        $this->partnerstatszamjel = $val;
    }

    public function getPartnerutca() {
        return $this->partnerutca;
    }

    public function setPartnerutca($val) {
        $this->partnerutca = $val;
    }

    public function getPartnervalligszam() {
        return $this->partnervalligszam;
    }

    public function setPartnervalligszam($val) {
        $this->partnervalligszam = $val;
    }

    public function getPartnervaros() {
        return $this->partnervaros;
    }

    public function setPartnervaros($val) {
        $this->partnervaros = $val;
    }

    /**
     * @return \Entities\Bankszamla
     */
    public function getBankszamla() {
        return $this->bankszamla;
    }

    public function getTulajbankszamlaszam() {
        return $this->tulajbankszamlaszam;
    }

    public function getBankszamlaId() {
        if ($this->bankszamla) {
            return $this->bankszamla->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Bankszamla|null $val
     */
    public function setBankszamla($val = null) {
        if ($this->bankszamla !== $val) {
            if (!$val) {
                $this->removeBankszamla();
            }
            else {
                $this->bankszamla = $val;
                if (!$this->duplication) {
                    $this->tulajbanknev = $val->getBanknev();
                    $this->tulajbankszamlaszam = $val->getSzamlaszam();
                    $this->tulajswift = $val->getSwift();
                    $this->tulajiban = $val->getIban();
                }
            }
        }
    }

    public function removeBankszamla() {
        if ($this->bankszamla !== null) {
            $this->bankszamla = null;
            if (!$this->duplication) {
                $this->tulajbanknev = '';
                $this->tulajbankszamlaszam = '';
                $this->tulajswift = '';
                $this->tulajiban = '';
            }
        }
    }

    public function getTulajswift() {
        return $this->tulajswift;
    }

    public function getTulajbanknev() {
        return $this->tulajbanknev;
    }

    /**
     * @return \Entities\Uzletkoto
     */
    public function getUzletkoto() {
        return $this->uzletkoto;
    }

    public function getUzletkotonev() {
        return $this->uzletkotonev;
    }

    public function getUzletkotoemail() {
        return $this->uzletkotoemail;
    }

    public function getUzletkotoId() {
        if ($this->uzletkoto) {
            return $this->uzletkoto->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Uzletkoto $val
     */
    public function setUzletkoto($val) {
        if ($this->uzletkoto !== $val) {
            if (!$val) {
                $this->removeUzletkoto();
            }
            else {
                $this->uzletkoto = $val;
                if (!$this->duplication) {
                    $this->uzletkotonev = $val->getNev();
                    $this->uzletkotoemail = $val->getEmail();
                    $this->uzletkotojutalek = $val->getJutalek();
                }
            }
        }
    }

    public function removeUzletkoto() {
        if ($this->uzletkoto !== null) {
            $this->uzletkoto = null;
            if (!$this->duplication) {
                $this->uzletkotonev = '';
                $this->uzletkotoemail = '';
                $this->uzletkotojutalek = 0;
            }
        }
    }

    /**
     * @return \Entities\Raktar
     */
    public function getRaktar() {
        return $this->raktar;
    }

    public function getRaktarnev() {
        return $this->raktarnev;
    }

    public function getRaktarId() {
        if ($this->raktar) {
            return $this->raktar->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Raktar $val
     */
    public function setRaktar($val) {
        if ($this->raktar !== $val) {
            if (!$val) {
                $this->removeRaktar();
            }
            else {
                $this->raktar = $val;
                if (!$this->duplication) {
                    $this->raktarnev = $val->getNev();
                }
            }
        }
    }

    public function removeRaktar() {
        if ($this->raktar !== null) {
            $this->raktar = null;
            if (!$this->duplication) {
                $this->raktarnev = '';
            }
        }
    }

    public function getErbizonylatszam() {
        return $this->erbizonylatszam;
    }

    public function setErbizonylatszam($val) {
        $this->erbizonylatszam = $val;
    }

    public function getMegjegyzes() {
        return $this->megjegyzes;
    }

    public function setMegjegyzes($val) {
        $this->megjegyzes = $val;
    }

    public function getBelsomegjegyzes() {
        return $this->belsomegjegyzes;
    }

    public function setBelsomegjegyzes($val) {
        $this->belsomegjegyzes = $val;
    }

    public function getLastmod() {
        return $this->lastmod;
    }

    public function clearLastmod() {
        $this->lastmod = null;
    }

    public function getCreated() {
        return $this->created;
    }

    public function clearCreated() {
        $this->created = null;
    }

    public function getSzallnev() {
        return $this->szallnev;
    }

    public function setSzallnev($adat) {
        $this->szallnev = $adat;
    }

    public function getSzallirszam() {
        return $this->szallirszam;
    }

    public function setSzallirszam($adat) {
        $this->szallirszam = $adat;
    }

    public function getSzallvaros() {
        return $this->szallvaros;
    }

    public function setSzallvaros($adat) {
        $this->szallvaros = $adat;
    }

    public function getSzallutca() {
        return $this->szallutca;
    }

    public function setSzallutca($adat) {
        $this->szallutca = $adat;
    }

    public function getWebshopmessage() {
        return $this->webshopmessage;
    }

    public function setWebshopmessage($val) {
        $this->webshopmessage = $val;
    }

    public function getCouriermessage() {
        return $this->couriermessage;
    }

    public function setCouriermessage($val) {
        $this->couriermessage = $val;
    }

    public function getPartnertelefon() {
        return $this->partnertelefon;
    }

    public function setPartnertelefon($telefon) {
        $this->partnertelefon = $telefon;
    }

    public function getPartneremail() {
        return $this->partneremail;
    }

    public function setPartneremail($email) {
        $this->partneremail = $email;
    }

    public function getIp() {
        return $this->ip;
    }

    public function setIp($val) {
        $this->ip = $val;
    }

    public function getReferrer() {
        return $this->referrer;
    }

    public function setReferrer($val) {
        $this->referrer = $val;
    }

    /**
     * @return \Entities\Bizonylatstatusz
     */
    public function getBizonylatstatusz() {
        return $this->bizonylatstatusz;
    }

    public function getBizonylatstatusznev() {
        if (!$this->bizonylatstatusznev) {
            $bs = $this->getBizonylatstatusz();
            if ($bs) {
                return $bs->getNev();
            }
            return '';
        }
        return $this->bizonylatstatusznev;
    }

    public function setBizonylatstatusznev($val) {
        $this->bizonylatstatusznev = $val;
    }

    public function getBizonylatstatuszcsoport() {
        return $this->bizonylatstatuszcsoport;
    }

    public function setBizonylatstatuszcsoport($val) {
        $this->bizonylatstatuszcsoport = $val;
    }

    public function getBizonylatstatuszId() {
        $fm = $this->getBizonylatstatusz();
        if ($fm) {
            return $fm->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Bizonylatstatusz $val
     */
    public function setBizonylatstatusz($val) {
        if (!($val instanceof \Entities\Bizonylatstatusz)) {
            $val = \mkw\Store::getEm()->getRepository('Entities\Bizonylatstatusz')->find($val);
        }
        if ($this->bizonylatstatusz !== $val) {
            if (!$val) {
                $this->removeBizonylatstatusz();
            }
            else {
                $this->bizonylatstatusz = $val;
                if (!$this->duplication) {
                    $this->bizonylatstatusznev = $val->getNev();
                    $this->bizonylatstatuszcsoport = $val->getCsoport();
                }
            }
        }
    }

    public function removeBizonylatstatusz() {
        if ($this->bizonylatstatusz !== null) {
            $this->bizonylatstatusz = null;
            if (!$this->duplication) {
                $this->bizonylatstatusznev = '';
                $this->bizonylatstatuszcsoport = '';
            }
        }
    }

    public function getFuvarlevelszam() {
        return $this->fuvarlevelszam;
    }

    public function setFuvarlevelszam($adat) {
        $this->fuvarlevelszam = $adat;
    }

    /**
     * @return \Entities\Bizonylatfej
     */
    public function getParbizonylatfej() {
        return $this->parbizonylatfej;
    }

    public function getParbizonylatfejId() {
        if ($this->parbizonylatfej) {
            return $this->parbizonylatfej->getId();
        }
        return '';
    }

    /**
     * @param \Entities\Bizonylatfej $val
     */
    public function setParbizonylatfej($val) {
        if ($this->parbizonylatfej !== $val) {
            $this->parbizonylatfej = $val;
            $val->addSzulobizonylatfej($this);
        }
    }

    public function removeParbizonylatfej() {
        if ($this->parbizonylatfej !== null) {
            $val = $this->parbizonylatfej;
            $this->parbizonylatfej = null;
            $val->removeSzulobizonylatfej($this);
        }
    }

    public function getSzulobizonylatfejek() {
        return $this->szulobizonylatfejek;
    }

    /**
     * @param \Entities\Bizonylatfej $val
     */
    public function addSzulobizonylatfej($val) {
        if (!$this->szulobizonylatfejek->contains($val)) {
            $this->szulobizonylatfejek->add($val);
            $val->setParbizonylatfej($this);
        }
    }

    /**
     * @param \Entities\Bizonylatfej $val
     * @return bool
     */
    public function removeSzulobizonylatfej($val) {
        if ($this->szulobizonylatfejek->removeElement($val)) {
            $val->removeParbizonylatfej();
            return true;
        }
        return false;
    }

    public function getPartnerCim() {
        $a = array($this->partnerirszam, $this->partnervaros);
        $cim = implode(' ', $a);
        $a = array($cim, $this->partnerutca);
        return implode(', ', $a);
    }

    public function getOTPayMSISDN() {
        return $this->otpaymsisdn;
    }

    public function setOTPayMSISDN($val) {
        $this->otpaymsisdn = $val;
    }

    public function getOTPayMPID() {
        return $this->otpaympid;
    }

    public function setOTPayMPID($val) {
        $this->otpaympid = $val;
    }

    public function getFizetve() {
        return $this->fizetve;
    }

    public function setFizetve($val) {
        $this->fizetve = $val;
    }

    public function getMasterPassCorrelationID() {
        return $this->masterpasscorrelationid;
    }

    public function setMasterPassCorrelationID($val) {
        $this->masterpasscorrelationid = $val;
    }

    public function getMasterPassBankTrxId() {
        return $this->masterpassbanktrxid;
    }

    public function setMaterPassBankTrxId($val) {
        $this->masterpassbanktrxid = $val;
    }

    public function getMasterPassTrxId() {
        return $this->masterpasstrxid;
    }

    public function setMaterPassTrxId($val) {
        $this->masterpasstrxid = $val;
    }

    public function getOTPayResult() {
        return $this->otpayresult;
    }

    public function setOTPayResult($val) {
        $this->otpayresult = $val;
    }

    public function getOTPayResultText() {
        return $this->otpayresulttext;
    }

    public function setOTPayResultText($val) {
        $this->otpayresulttext = $val;
    }

    public function getPartnerSzamlatipus() {
        return $this->partnerszamlatipus;
    }

    public function setPartnerSzamlatipus($val) {
        $this->partnerszamlatipus = $val;
    }

    public function getFoxpostterminal() {
        return $this->foxpostterminal;
    }

    public function getFoxpostterminalId() {
        if ($this->foxpostterminal) {
            return $this->foxpostterminal->getId();
        }
        return false;
    }

    public function setFoxpostterminal($val) {
        if ($this->foxpostterminal !== $val) {
            $this->foxpostterminal = $val;
        }
    }

    public function removeFoxpostterminal() {
        if ($this->foxpostterminal !== null) {
            $this->foxpostterminal = null;
        }
    }

    public function getFoxpostBarcode() {
        return $this->foxpostbarcode;
    }

    public function setFoxpostBarcode($adat) {
        $this->foxpostbarcode = $adat;
    }

    public function getTraceurl() {
        return $this->traceurl;
    }

    public function setTraceurl($adat) {
        $this->traceurl = $adat;
    }

    public function getRontott() {
        return $this->rontott;
    }

    public function setRontott($adat) {
        $this->rontott = $adat;
        if (!$this->duplication) {
            foreach ($this->bizonylattetelek as $bt) {
                $bt->setRontott($adat);
                \mkw\Store::getEm()->persist($bt);
            }
        }
    }

    public function getSysmegjegyzes() {
        return $this->sysmegjegyzes;
    }

    public function setSysmegjegyzes($adat) {
        $this->sysmegjegyzes = $adat;
    }

    public function getFix() {
        return $this->fix;
    }

    public function setFix($adat) {
        $this->fix = $adat;
    }

    public function getBizonylatnyelv() {
        return $this->bizonylatnyelv;
    }

    public function setBizonylatnyelv($adat) {
        $this->bizonylatnyelv = $adat;
    }

    public function getReportfile() {
        return $this->reportfile;
    }

    public function setReportfile($adat) {
        $this->reportfile = $adat;
    }

    public function getKerkul() {
        return $this->kerkul;
    }

    public function setKerkul($adat) {
        $this->kerkul = $adat;
    }

    public function getTulajiban() {
        return $this->tulajiban;
    }

    public function getEsedekesseg1() {
        return $this->esedekesseg1;
    }

    public function getEsedekesseg1Str() {
        if ($this->getEsedekesseg1()) {
            return $this->getEsedekesseg1()->format(store::$DateFormat);
        }
        return '';
    }

    public function setEsedekesseg1($adat = '') {
        if (is_a($adat, 'DateTime') || is_a($adat, 'DateTimeImmutable')) {
            $this->esedekesseg1 = $adat;
        }
        else {
            if ($adat != '') {
                $this->esedekesseg1 = new \DateTime(store::convDate($adat));
            }
            else {
                $this->esedekesseg1 = null;
            }
        }
    }

    public function getFizetendo1() {
        return $this->fizetendo1;
    }

    public function setFizetendo1($val) {
        $this->fizetendo1 = $val;
    }

    public function getEsedekesseg2() {
        return $this->esedekesseg2;
    }

    public function getEsedekesseg2Str() {
        if ($this->getEsedekesseg2()) {
            return $this->getEsedekesseg2()->format(store::$DateFormat);
        }
        return '';
    }

    public function setEsedekesseg2($adat = '') {
        if (is_a($adat, 'DateTime') || is_a($adat, 'DateTimeImmutable')) {
            $this->esedekesseg2 = $adat;
        }
        else {
            if ($adat != '') {
                $this->esedekesseg2 = new \DateTime(store::convDate($adat));
            }
            else {
                $this->esedekesseg2 = null;
            }
        }
    }

    public function getFizetendo2() {
        return $this->fizetendo2;
    }

    public function setFizetendo2($val) {
        $this->fizetendo2 = $val;
    }

    public function getEsedekesseg3() {
        return $this->esedekesseg3;
    }

    public function getEsedekesseg3Str() {
        if ($this->getEsedekesseg3()) {
            return $this->getEsedekesseg3()->format(store::$DateFormat);
        }
        return '';
    }

    public function setEsedekesseg3($adat = '') {
        if (is_a($adat, 'DateTime') || is_a($adat, 'DateTimeImmutable')) {
            $this->esedekesseg3 = $adat;
        }
        else {
            if ($adat != '') {
                $this->esedekesseg3 = new \DateTime(store::convDate($adat));
            }
            else {
                $this->esedekesseg3 = null;
            }
        }
    }

    public function getFizetendo3() {
        return $this->fizetendo3;
    }

    public function setFizetendo3($val) {
        $this->fizetendo3 = $val;
    }

    public function duplicateFrom($entityB) {
        $this->duplication = true;
        $kivetel = array('setParbizonylatfej');
        $methods = get_class_methods($this);
        foreach ($methods as $v) {
            if ((strpos($v, 'set') > -1) && (!in_array($v, $kivetel))) {
                $get = str_replace('set', 'get', $v);
                if (in_array($get, $methods)) {
                    $this->$v($entityB->$get());
                }
            }
        }
        $this->duplication = false;
        /**
         * foreach($entityB->getBizonylattetelek() as $bt) {
         * $this->addBizonylattetel($bt);
         * }
         */
    }

    /**
     * @param mixed $masterpassbanktrxid
     */
    public function setMasterpassbanktrxid($masterpassbanktrxid) {
        $this->masterpassbanktrxid = $masterpassbanktrxid;
    }

    /**
     * @param mixed $masterpasstrxid
     */
    public function setMasterpasstrxid($masterpasstrxid) {
        $this->masterpasstrxid = $masterpasstrxid;
    }

    /**
     * @param mixed $raktarnev
     */
    public function setRaktarnev($raktarnev) {
        $this->raktarnev = $raktarnev;
    }

    /**
     * @param mixed $szallitasimodnev
     */
    public function setSzallitasimodnev($szallitasimodnev) {
        $this->szallitasimodnev = $szallitasimodnev;
    }

    /**
     * @param mixed $trxid
     */
    public function setTrxid($trxid) {
        $this->trxid = $trxid;
    }

    /**
     * @param mixed $tulajbanknev
     */
    public function setTulajbanknev($tulajbanknev) {
        $this->tulajbanknev = $tulajbanknev;
    }

    /**
     * @param mixed $tulajbankszamlaszam
     */
    public function setTulajbankszamlaszam($tulajbankszamlaszam) {
        $this->tulajbankszamlaszam = $tulajbankszamlaszam;
    }

    /**
     * @param mixed $tulajiban
     */
    public function setTulajiban($tulajiban) {
        $this->tulajiban = $tulajiban;
    }

    /**
     * @param mixed $tulajswift
     */
    public function setTulajswift($tulajswift) {
        $this->tulajswift = $tulajswift;
    }

    /**
     * @param mixed $uzletkotoemail
     */
    public function setUzletkotoemail($uzletkotoemail) {
        $this->uzletkotoemail = $uzletkotoemail;
    }

    /**
     * @param mixed $uzletkotojutalek
     */
    public function setUzletkotojutalek($uzletkotojutalek) {
        $this->uzletkotojutalek = $uzletkotojutalek;
    }

    /**
     * @param mixed $uzletkotonev
     */
    public function setUzletkotonev($uzletkotonev) {
        $this->uzletkotonev = $uzletkotonev;
    }

    /**
     * @param mixed $valutanemnev
     */
    public function setValutanemnev($valutanemnev) {
        $this->valutanemnev = $valutanemnev;
    }

    /**
     * @param mixed $fizmodnev
     */
    public function setFizmodnev($fizmodnev) {
        $this->fizmodnev = $fizmodnev;
    }

    public function getUzletkotojutalek() {
        return $this->uzletkotojutalek;
    }

    /**
     * @return mixed
     */
    public function getMese() {
        return $this->mese;
    }

    /**
     * @param mixed $mese
     */
    public function setMese($mese) {
        $this->mese = $mese;
    }

    /**
     * @return mixed
     */
    public function getRegmode() {
        return $this->regmode;
    }

    /**
     * @param mixed $regmode
     */
    public function setRegmode($regmode) {
        $this->regmode = $regmode;
    }

    /**
     * @return mixed
     */
    public function getStornotipus() {
        return $this->stornotipus;
    }

    /**
     * @param mixed $stornotipus
     */
    public function setStornotipus($stornotipus) {
        $this->stornotipus = $stornotipus;
    }

    /**
     * @return mixed
     */
    public function getTulajegyenivallalkozo() {
        return $this->tulajegyenivallalkozo;
    }

    /**
     * @param mixed $tulajegyenivallalkozo
     */
    public function setTulajegyenivallalkozo($tulajegyenivallalkozo) {
        $this->tulajegyenivallalkozo = $tulajegyenivallalkozo;
    }

    /**
     * @return mixed
     */
    public function getTulajevnev() {
        return $this->tulajevnev;
    }

    /**
     * @param mixed $tulajevnev
     */
    public function setTulajevnev($tulajevnev) {
        $this->tulajevnev = $tulajevnev;
    }

    /**
     * @return mixed
     */
    public function getTulajevnyilvszam() {
        return $this->tulajevnyilvszam;
    }

    /**
     * @param mixed $tulajevnyilvszam
     */
    public function setTulajevnyilvszam($tulajevnyilvszam) {
        $this->tulajevnyilvszam = $tulajevnyilvszam;
    }

    /**
     * @return mixed
     */
    public function getTulajkisadozo() {
        return $this->tulajkisadozo;
    }

    /**
     * @param mixed $tulajkisadozo
     */
    public function setTulajkisadozo($tulajkisadozo) {
        $this->tulajkisadozo = $tulajkisadozo;
    }

}
