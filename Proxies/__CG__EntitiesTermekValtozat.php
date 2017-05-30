<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TermekValtozat extends \Entities\TermekValtozat implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'keszletinfo', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'id', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'created', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lastmod', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'termek', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lathato', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lathato2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lathato3', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'elerheto', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'elerheto2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'elerheto3', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'termekfokep', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'adattipus1', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'ertek1', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'adattipus2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'ertek2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'kosarak', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'netto', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'brutto', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'kep', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'cikkszam', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'idegencikkszam', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'bizonylattetelek', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'vonalkod', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'beerkezesdatum'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'keszletinfo', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'id', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'created', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lastmod', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'termek', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lathato', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lathato2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'lathato3', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'elerheto', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'elerheto2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'elerheto3', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'termekfokep', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'adattipus1', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'ertek1', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'adattipus2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'ertek2', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'kosarak', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'netto', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'brutto', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'kep', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'cikkszam', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'idegencikkszam', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'bizonylattetelek', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'vonalkod', '' . "\0" . 'Entities\\TermekValtozat' . "\0" . 'beerkezesdatum'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TermekValtozat $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function generateVonalkod()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'generateVonalkod', []);

        return parent::generateVonalkod();
    }

    /**
     * {@inheritDoc}
     */
    public function getMozgasDb($datum = NULL, $raktarid = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMozgasDb', [$datum, $raktarid]);

        return parent::getMozgasDb($datum, $raktarid);
    }

    /**
     * {@inheritDoc}
     */
    public function getKeszlet($datum = NULL, $raktarid = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKeszlet', [$datum, $raktarid]);

        return parent::getKeszlet($datum, $raktarid);
    }

    /**
     * {@inheritDoc}
     */
    public function getFoglaltMennyiseg($kivevebiz = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFoglaltMennyiseg', [$kivevebiz]);

        return parent::getFoglaltMennyiseg($kivevebiz);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getTermek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermek', []);

        return parent::getTermek();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermek($termek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermek', [$termek]);

        return parent::setTermek($termek);
    }

    /**
     * {@inheritDoc}
     */
    public function getLathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLathato', []);

        return parent::getLathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setLathato($lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLathato', [$lathato]);

        return parent::setLathato($lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getElerheto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getElerheto', []);

        return parent::getElerheto();
    }

    /**
     * {@inheritDoc}
     */
    public function setElerheto($elerheto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setElerheto', [$elerheto]);

        return parent::setElerheto($elerheto);
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekfokep()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekfokep', []);

        return parent::getTermekfokep();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermekfokep($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermekfokep', [$adat]);

        return parent::setTermekfokep($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdatTipus1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdatTipus1', []);

        return parent::getAdatTipus1();
    }

    /**
     * {@inheritDoc}
     */
    public function getAdatTipus1Id()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdatTipus1Id', []);

        return parent::getAdatTipus1Id();
    }

    /**
     * {@inheritDoc}
     */
    public function getAdatTipus1Nev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdatTipus1Nev', []);

        return parent::getAdatTipus1Nev();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdatTipus1($at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdatTipus1', [$at]);

        return parent::setAdatTipus1($at);
    }

    /**
     * {@inheritDoc}
     */
    public function getErtek1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getErtek1', []);

        return parent::getErtek1();
    }

    /**
     * {@inheritDoc}
     */
    public function setErtek1($ertek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setErtek1', [$ertek]);

        return parent::setErtek1($ertek);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdatTipus2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdatTipus2', []);

        return parent::getAdatTipus2();
    }

    /**
     * {@inheritDoc}
     */
    public function getAdatTipus2Id()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdatTipus2Id', []);

        return parent::getAdatTipus2Id();
    }

    /**
     * {@inheritDoc}
     */
    public function getAdatTipus2Nev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdatTipus2Nev', []);

        return parent::getAdatTipus2Nev();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdatTipus2($at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdatTipus2', [$at]);

        return parent::setAdatTipus2($at);
    }

    /**
     * {@inheritDoc}
     */
    public function getErtek2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getErtek2', []);

        return parent::getErtek2();
    }

    /**
     * {@inheritDoc}
     */
    public function setErtek2($ertek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setErtek2', [$ertek]);

        return parent::setErtek2($ertek);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastmod()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastmod', []);

        return parent::getLastmod();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', []);

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function getNetto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNetto', []);

        return parent::getNetto();
    }

    /**
     * {@inheritDoc}
     */
    public function setNetto($netto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNetto', [$netto]);

        return parent::setNetto($netto);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrutto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrutto', []);

        return parent::getBrutto();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrutto($brutto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrutto', [$brutto]);

        return parent::setBrutto($brutto);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurl($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurl', [$pre]);

        return parent::getKepurl($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlMini($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlMini', [$pre]);

        return parent::getKepurlMini($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlSmall($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlSmall', [$pre]);

        return parent::getKepurlSmall($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlMedium($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlMedium', [$pre]);

        return parent::getKepurlMedium($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlLarge($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlLarge', [$pre]);

        return parent::getKepurlLarge($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepleiras()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepleiras', []);

        return parent::getKepleiras();
    }

    /**
     * {@inheritDoc}
     */
    public function getKep()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKep', []);

        return parent::getKep();
    }

    /**
     * {@inheritDoc}
     */
    public function getKepId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepId', []);

        return parent::getKepId();
    }

    /**
     * {@inheritDoc}
     */
    public function setKep($kep)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKep', [$kep]);

        return parent::setKep($kep);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdegencikkszam()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdegencikkszam', []);

        return parent::getIdegencikkszam();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdegencikkszam($idegencikkszam)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdegencikkszam', [$idegencikkszam]);

        return parent::setIdegencikkszam($idegencikkszam);
    }

    /**
     * {@inheritDoc}
     */
    public function getCikkszam()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCikkszam', []);

        return parent::getCikkszam();
    }

    /**
     * {@inheritDoc}
     */
    public function setCikkszam($cikkszam)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCikkszam', [$cikkszam]);

        return parent::setCikkszam($cikkszam);
    }

    /**
     * {@inheritDoc}
     */
    public function getNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNev', []);

        return parent::getNev();
    }

    /**
     * {@inheritDoc}
     */
    public function getVonalkod()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVonalkod', []);

        return parent::getVonalkod();
    }

    /**
     * {@inheritDoc}
     */
    public function setVonalkod($vonalkod)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVonalkod', [$vonalkod]);

        return parent::setVonalkod($vonalkod);
    }

    /**
     * {@inheritDoc}
     */
    public function getBeerkezesdatum()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBeerkezesdatum', []);

        return parent::getBeerkezesdatum();
    }

    /**
     * {@inheritDoc}
     */
    public function getBeerkezesdatumStr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBeerkezesdatumStr', []);

        return parent::getBeerkezesdatumStr();
    }

    /**
     * {@inheritDoc}
     */
    public function setBeerkezesdatum($adat = '')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBeerkezesdatum', [$adat]);

        return parent::setBeerkezesdatum($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getSzin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSzin', []);

        return parent::getSzin();
    }

    /**
     * {@inheritDoc}
     */
    public function getMeret()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMeret', []);

        return parent::getMeret();
    }

    /**
     * {@inheritDoc}
     */
    public function getElerheto2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getElerheto2', []);

        return parent::getElerheto2();
    }

    /**
     * {@inheritDoc}
     */
    public function setElerheto2($elerheto2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setElerheto2', [$elerheto2]);

        return parent::setElerheto2($elerheto2);
    }

    /**
     * {@inheritDoc}
     */
    public function getElerheto3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getElerheto3', []);

        return parent::getElerheto3();
    }

    /**
     * {@inheritDoc}
     */
    public function setElerheto3($elerheto3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setElerheto3', [$elerheto3]);

        return parent::setElerheto3($elerheto3);
    }

    /**
     * {@inheritDoc}
     */
    public function getLathato2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLathato2', []);

        return parent::getLathato2();
    }

    /**
     * {@inheritDoc}
     */
    public function setLathato2($lathato2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLathato2', [$lathato2]);

        return parent::setLathato2($lathato2);
    }

    /**
     * {@inheritDoc}
     */
    public function getLathato3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLathato3', []);

        return parent::getLathato3();
    }

    /**
     * {@inheritDoc}
     */
    public function setLathato3($lathato3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLathato3', [$lathato3]);

        return parent::setLathato3($lathato3);
    }

}
