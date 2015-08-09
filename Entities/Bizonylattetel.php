<?php

namespace Entities;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use mkw\store,
    Doctrine\Common\Collections\ArrayCollection;

/** @ORM\Entity(repositoryClass="Entities\BizonylattetelRepository")
 *  @ORM\Table(name="bizonylattetel")
 * */
class Bizonylattetel {

    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="create")
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $lastmod;

    /**
     * @ORM\ManyToOne(targetEntity="Bizonylatfej",inversedBy="bizonylattetelek")
     * @ORM\JoinColumn(name="bizonylatfej_id", referencedColumnName="id",nullable=true,onDelete="cascade")
     */
    private $bizonylatfej;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $mozgat;

    /** @ORM\Column(type="integer") */
    private $irany;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $arvaltoztat = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $storno = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $stornozott = false;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $rontott = false;

    /**
     * @ORM\ManyToOne(targetEntity="Termek",inversedBy="bizonylattetelek")
     * @ORM\JoinColumn(name="termek_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $termek;

    /** @ORM\Column(type="string",length=255,nullable=false) */
    private $termeknev;

    /** @ORM\Column(type="string",length=20,nullable=true) */
    private $me;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $kiszereles;

    /** @ORM\Column(type="string",length=50,nullable=true) */
    private $cikkszam;

    /** @ORM\Column(type="string",length=50,nullable=true) */
    private $idegencikkszam;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $ehparany;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $hparany;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $szelesseg = 0;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $magassag = 0;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $hosszusag = 0;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $suly = 0;

    /** @ORM\Column(type="boolean",nullable=false) */
    private $osszehajthato = false;

    /**
     * @ORM\ManyToOne(targetEntity="Vtsz",inversedBy="bizonylattetelek")
     * @ORM\JoinColumn(name="vtsz_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $vtsz;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $vtsznev;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $vtszszam;

    /**
     * @ORM\ManyToOne(targetEntity="Afa",inversedBy="bizonylattetelek")
     * @ORM\JoinColumn(name="afa_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $afa;

    /** @ORM\Column(type="string",length=255,nullable=true) */
    private $afanev;

    /** @ORM\Column(type="integer") */
    private $afakulcs;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $gymennyiseg;

    /** @ORM\Column(type="decimal",precision=14,scale=2,nullable=true) */
    private $mennyiseg;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $nettoegysar;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $bruttoegysar;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $nettoegysarhuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $bruttoegysarhuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $enettoegysar;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $ebruttoegysar;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $enettoegysarhuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $ebruttoegysarhuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $netto;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $afaertek;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $brutto;

    /**
     * @ORM\ManyToOne(targetEntity="Valutanem",inversedBy="bizonylattetelek")
     * @ORM\JoinColumn(name="valutanem_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $valutanem;

    /** @ORM\Column(type="string",length=6,nullable=true) */
    private $valutanemnev;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $nettohuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $afaertekhuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $bruttohuf;

    /** @ORM\Column(type="decimal",precision=14,scale=4,nullable=true) */
    private $arfolyam;

    /**
     * @ORM\ManyToOne(targetEntity="Bizonylattetel",inversedBy="szulobizonylattetelek")
     * @ORM\JoinColumn(name="parbizonylattetel_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $parbizonylattetel;

    /** @ORM\OneToMany(targetEntity="Bizonylattetel", mappedBy="parbizonylattetel",cascade={"persist"}) */
    private $szulobizonylattetelek;

    /** @ORM\Column(type="date",nullable=true) */
    private $hatarido;

    /**
     * @ORM\ManyToOne(targetEntity="TermekValtozat",inversedBy="bizonylattetelek")
     * @ORM\JoinColumn(name="termekvaltozat_id", referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $termekvaltozat;

    public function __construct() {
        $this->szulobizonylattetelek = new ArrayCollection();
    }

    public function toLista() {
        $ret = array();
        $termek = $this->getTermek();
        $ret = $ret + $termek->toKosar($this->getTermekvaltozat());
        $ret['mennyiseg'] = $this->getMennyiseg();
        $ret['nettoegysarhuf'] = $this->getNettoegysarhuf();
        $ret['bruttoegysarhuf'] = $this->getBruttoegysarhuf();
        $ret['nettohuf'] = $this->getNettohuf();
        $ret['afahuf'] = $this->getAfaertekhuf();
        $ret['bruttohuf'] = $this->getBruttohuf();
        $ret['nettoegysar'] = $this->getNettoegysar();
        $ret['bruttoegysar'] = $this->getBruttoegysar();
        $ret['netto'] = $this->getNetto();
        $ret['afa'] = $this->getAfaertek();
        $ret['brutto'] = $this->getBrutto();
        $ret['termeknev'] = $this->getTermeknev();
        $ret['me'] = $this->getME();
        $ret['afanev'] = $this->getAfanev();
        $valt = $this->getTermekvaltozat();
        $v = array();
        if ($valt) {
            if ($valt->getAdatTipus1()) {
                $v[] = array('nev' => $valt->getAdatTipus1Nev(), 'ertek' => $valt->getErtek1());
            }
            if ($valt->getAdatTipus2()) {
                $v[] = array('nev' => $valt->getAdatTipus2Nev(), 'ertek' => $valt->getErtek2());
            }
        }
        $ret['valtozatok'] = $v;
        return $ret;
    }

    public function setPersistentData() {
        $bf = $this->bizonylatfej;
        if ($bf) {
            $this->setValutanem($bf->getValutanem());
            $this->setArfolyam($bf->getArfolyam());
        }
    }

    public function calc() {
        $this->setNetto($this->getNettoegysar() * $this->getMennyiseg());
        $this->setBrutto($this->getBruttoegysar() * $this->getMennyiseg());
        $this->setAfaertek($this->getBrutto() - $this->getNetto());
        $this->setNettohuf($this->getNettoegysarhuf() * $this->getMennyiseg());
        $this->setBruttohuf($this->getBruttoegysarhuf() * $this->getMennyiseg());
        $this->setAfaertekhuf($this->getBruttohuf() - $this->getNettohuf());
    }

    public function getId() {
        return $this->id;
    }

    public function getBizonylatfej() {
        return $this->bizonylatfej;
    }

    public function getBizonylatfejId() {
        if ($this->bizonylatfej) {
            return $this->bizonylatfej->getId();
        }
        return '';
    }

    public function setBizonylatfej($val) {
        if ($this->bizonylatfej !== $val) {
            $this->bizonylatfej = $val;
            $val->addBizonylattetel($this);
        }
    }

    public function removeBizonylatfej() {
        if ($this->bizonylatfej !== null) {
            $val = $this->bizonylatfej;
            $this->bizonylatfej = null;
            $val->removeBizonylattetel($this);
        }
    }

    public function getMozgat() {
        return $this->mozgat;
    }

    public function setMozgat() {
        $bf = $this->bizonylatfej;
        $t = $this->termek;
        if ($bf && $t) {
            $this->mozgat = $bf->getMozgat() && $t->getMozgat();
        }
        else {
            $this->mozgat = false;
        }
    }

    public function getArvaltoztat() {
        return $this->arvaltoztat;
    }

    public function setArvaltoztat($val) {
        $this->arvaltoztat = $val;
    }

    public function getStorno() {
        return $this->storno;
    }

    public function setStorno($val) {
        $this->storno = $val;
        if ($this->storno) {
            $this->setStornozott(false);
        }
    }

    public function getStornozott() {
        return $this->stornozott;
    }

    public function setStornozott($val) {
        $this->stornozott = $val;
        if ($this->stornozott) {
            $this->setStorno(false);
        }
    }

    public function getTermek() {
        return $this->termek;
    }

    public function getTermekId() {
        if ($this->termek) {
            return $this->termek->getId();
        }
        return '';
    }

    public function setTermek($val) {
        if ($this->termek !== $val) {
            $this->termek = $val;
            $this->termeknev = $val->getNev();
            $this->cikkszam = $val->getCikkszam();
            $this->hosszusag = $val->getHosszusag();
            $this->ehparany = $val->getHparany();
            $this->idegencikkszam = $val->getIdegencikkszam();
            $this->kiszereles = $val->getKiszereles();
            $this->magassag = $val->getMagassag();
            $this->me = $val->getMe();
            $this->osszehajthato = $val->getOsszehajthato();
            $this->suly = $val->getSuly();
            $this->szelesseg = $val->getSzelesseg();
            $vtsz = $val->getVtsz();
            if ($vtsz) {
                $this->setVtsz($vtsz);
            }
            $afa = $val->getAfa();
            if ($afa) {
                $this->setAfa($afa);
            }
            $this->setMozgat();
//			$val->addBizonylattetelek($this);
        }
    }

    public function removeTermek() {
        if ($this->termek !== null) {
//			$val=$this->termek;
            $this->termek = null;
            $this->termeknev = '';
            $this->cikkszam = '';
            $this->hosszusag = 0;
            $this->ehparany = 0;
            $this->idegencikkszam = '';
            $this->kiszereles = 0;
            $this->magassag = 0;
            $this->me = '';
            $this->osszehajthato = false;
            $this->suly = 0;
            $this->szelesseg = 0;
//			$this->
            $this->setMozgat();
//			$val->removeBizonylattetelek($this);
        }
    }

    public function getTermeknev() {
        return $this->termeknev;
    }

    public function setTermeknev($val) {
        $this->termeknev = $val;
    }

    public function getCikkszam() {
        return $this->cikkszam;
    }

    public function setCikkszam($val) {
        $this->cikkszam = $val;
    }

    public function getIdegencikkszam() {
        return $this->idegencikkszam;
    }

    public function setIdegencikkszam($val) {
        $this->idegencikkszam = $val;
    }

    public function getME() {
        return $this->me;
    }

    public function setME($val) {
        $this->me = $val;
    }

    public function getVtsz() {
        return $this->vtsz;
    }

    public function getVtszszam() {
        return $this->vtszszam;
    }

    public function getVtsznev() {
        return $this->vtsznev;
    }

    public function getVtszId() {
        if ($this->vtsz) {
            return $this->vtsz->getId();
        }
        return '';
    }

    public function setVtsz($val) {
        if ($this->vtsz !== $val) {
            $this->vtsz = $val;
            $this->vtsznev = $val->getNev();
            $this->vtszszam = $val->getSzam();
            $afa = $val->getAfa();
            if ($afa) {
                $this->setAfa($afa);
            }
//			$val->addBizonylattetelek($this);
        }
    }

    public function removeVtsz() {
        if ($this->vtsz !== null) {
//			$val=$this->vtsz;
            $this->vtsz = null;
            $this->vtsznev = '';
            $this->vtszszam = '';
//			$val->removeBizonylattetelek($this);
        }
    }

    public function getAfa() {
        return $this->afa;
    }

    public function getAfanev() {
        return $this->afanev;
    }

    public function getAfakulcs() {
        return $this->afakulcs;
    }

    public function getAfaId() {
        if ($this->afa) {
            return $this->afa->getId();
        }
        return '';
    }

    public function setAfa($val) {
        if ($this->afa !== $val) {
            $this->afa = $val;
            $this->afanev = $val->getNev();
            $this->afakulcs = $val->getErtek();
//			$val->addBizonylattetelek($this);
        }
    }

    public function removeAfa() {
        if ($this->afa !== null) {
//			$val=$this->afa;
            $this->afa = null;
            $this->afanev = '';
            $this->afakulcs = 0;
//			$val->removeBizonylattetelek($this);
        }
    }

    public function getGymennyiseg() {
        return $this->gymennyiseg;
    }

    public function setGymennyiseg($val) {
        $this->gymennyiseg = $val;
    }

    public function getMennyiseg() {
        return $this->mennyiseg;
    }

    public function setMennyiseg($val) {
        $this->mennyiseg = $val;
    }

    public function getNettoegysar() {
        return $this->nettoegysar;
    }

    public function setNettoegysar($val) {
        $this->nettoegysar = $val;
        $this->bruttoegysar = $this->getAfa()->calcBrutto($val);
    }

    public function getBruttoegysar() {
        return $this->bruttoegysar;
    }

    public function setBruttoegysar($val) {
        $this->bruttoegysar = $val;
        $this->nettoegysar = $this->termek->getAfa()->calcNetto($val);
    }

    public function getNettoegysarhuf() {
        return $this->nettoegysarhuf;
    }

    public function setNettoegysarhuf($val) {
        $this->nettoegysarhuf = $val;
        $this->bruttoegysarhuf = $this->getAfa()->calcBrutto($val);
    }

    public function getBruttoegysarhuf() {
        return $this->bruttoegysarhuf;
    }

    public function setBruttoegysarhuf($val) {
        $this->bruttoegysarhuf = $val;
        $this->nettoegysarhuf = $this->termek->getAfa()->calcNetto($val);
    }

    public function getEnettoegysar() {
        return $this->enettoegysar;
    }

    public function getEbruttoegysar() {
        return $this->ebruttoegysar;
    }

    public function getEnettoegysarhuf() {
        return $this->enettoegysarhuf;
    }

    public function getEbruttoegysarhuf() {
        return $this->ebruttoegysarhuf;
    }

    public function getNetto() {
        return $this->netto;
    }

    public function setNetto($val) {
        $this->netto = $val;
    }

    public function getAfaertek() {
        return $this->afaertek;
    }

    public function setAfaertek($val) {
        $this->afaertek = $val;
    }

    public function getBrutto() {
        return $this->brutto;
    }

    public function setBrutto($val) {
        $this->brutto = $val;
    }

    public function getValutanem() {
        return $this->valutanem;
    }

    public function getValutanemnev() {
        return $this->valutanemnev;
    }

    public function getValutanemId() {
        if ($this->valutanem) {
            return $this->valutanem->getId();
        }
        return '';
    }

    public function setValutanem($val) {
        if ($this->valutanem !== $val) {
            $this->valutanem = $val;
            $this->valutanemnev = $val->getNev();
//			$val->addBizonylattetel($this);
        }
    }

    public function removeValutanem() {
        if ($this->valutanem !== null) {
//			$val=$this->valutanem;
            $this->valutanem = null;
            $this->valutanemnev = '';
//			$val->removeBizonylattetel($this);
        }
    }

    public function getNettohuf() {
        return $this->nettohuf;
    }

    public function setNettohuf($val) {
        $this->nettohuf = $val;
    }

    public function getAfaertekhuf() {
        return $this->afaertekhuf;
    }

    public function setAfaertekhuf($val) {
        $this->afaertekhuf = $val;
    }

    public function getBruttohuf() {
        return $this->bruttohuf;
    }

    public function setBruttohuf($val) {
        $this->bruttohuf = $val;
    }

    public function getArfolyam() {
        return $this->arfolyam;
    }

    public function setArfolyam($val) {
        $this->arfolyam = $val;
    }

    public function getParbizonylattetel() {
        return $this->parbizonylattetel;
    }

    public function getParbizonylattetelId() {
        if ($this->parbizonylattetel) {
            return $this->parbizonylattetel->getId();
        }
        return '';
    }

    public function setParbizonylattetel($val) {
        if ($this->parbizonylattetel !== $val) {
            $this->parbizonylattetel = $val;
            $val->addSzulobizonylattetel($this);
        }
    }

    public function removeParbizonylattetel() {
        if ($this->parbizonylattetel !== null) {
            $val = $this->parbizonylattetel;
            $this->parbizonylattetel = null;
            $val->removeSzulobizonylattetel($this);
        }
    }

    public function getSzulobizonylattetelek() {
        return $this->szulobizonylattetelek;
    }

    public function addSzulobizonylattetel($val) {
        if (!$this->szulobizonylattetelek->contains($val)) {
            $this->szulobizonylattetelek->add($val);
            $val->setParbizonylattetel($this);
        }
    }

    public function removeSzulobizonylattetel($val) {
        if ($this->szulobizonylattetelek->removeElement($val)) {
            $val->removeParbizonylattetel();
            return true;
        }
        return false;
    }

    public function getHatarido() {
        return $this->hatarido;
    }

    public function getHataridoStr() {
        if ($this->getHatarido()) {
            return $this->getHatarido()->format(store::$DateFormat);
        }
        return '';
    }

    public function setHatarido($adat) {
        if ($adat == '')
            $adat = date(store::$DateFormat);
        $this->hatarido = new \DateTime(store::convDate($adat));
    }

    public function getLastmod() {
        return $this->lastmod;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getTermekvaltozat() {
        return $this->termekvaltozat;
    }

    public function getTermekvaltozatId() {
        if ($this->termekvaltozat) {
            return $this->termekvaltozat->getId();
        }
        return '';
    }

    public function setTermekvaltozat($val) {
        if ($this->termekvaltozat !== $val) {
            $this->termekvaltozat = $val;
//			$val->addBizonylattetelek($this);
        }
    }

    public function removeTermekvaltozat() {
        if ($this->termekvaltozat !== null) {
//			$val=$this->termek;
            $this->termekvaltozat = null;
//			$val->removeBizonylattetelek($this);
        }
    }

    public function getIrany() {
        return $this->irany;
    }

    public function setIrany($val) {
        $this->irany = $val;
    }

    public function getRontott() {
        return $this->rontott;
    }

    public function setRontott($adat) {
        $this->rontott = $adat;
    }

}
