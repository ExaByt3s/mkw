<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Kosar extends \Entities\Kosar implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = array();



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
            return array('__isInitialized__', '' . "\0" . 'Entities\\Kosar' . "\0" . 'id', '' . "\0" . 'Entities\\Kosar' . "\0" . 'created', '' . "\0" . 'Entities\\Kosar' . "\0" . 'lastmod', '' . "\0" . 'Entities\\Kosar' . "\0" . 'sessionid', '' . "\0" . 'Entities\\Kosar' . "\0" . 'partner', '' . "\0" . 'Entities\\Kosar' . "\0" . 'termek', '' . "\0" . 'Entities\\Kosar' . "\0" . 'termekvaltozat', '' . "\0" . 'Entities\\Kosar' . "\0" . 'mennyiseg', '' . "\0" . 'Entities\\Kosar' . "\0" . 'valutanem', '' . "\0" . 'Entities\\Kosar' . "\0" . 'nettoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'bruttoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'enettoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'ebruttoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'kedvezmeny', '' . "\0" . 'Entities\\Kosar' . "\0" . 'sorrend');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Kosar' . "\0" . 'id', '' . "\0" . 'Entities\\Kosar' . "\0" . 'created', '' . "\0" . 'Entities\\Kosar' . "\0" . 'lastmod', '' . "\0" . 'Entities\\Kosar' . "\0" . 'sessionid', '' . "\0" . 'Entities\\Kosar' . "\0" . 'partner', '' . "\0" . 'Entities\\Kosar' . "\0" . 'termek', '' . "\0" . 'Entities\\Kosar' . "\0" . 'termekvaltozat', '' . "\0" . 'Entities\\Kosar' . "\0" . 'mennyiseg', '' . "\0" . 'Entities\\Kosar' . "\0" . 'valutanem', '' . "\0" . 'Entities\\Kosar' . "\0" . 'nettoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'bruttoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'enettoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'ebruttoegysar', '' . "\0" . 'Entities\\Kosar' . "\0" . 'kedvezmeny', '' . "\0" . 'Entities\\Kosar' . "\0" . 'sorrend');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Kosar $proxy) {
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
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
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
    public function toLista($partner = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toLista', array($partner));

        return parent::toLista($partner);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getSessionid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSessionid', array());

        return parent::getSessionid();
    }

    /**
     * {@inheritDoc}
     */
    public function setSessionid($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSessionid', array($adat));

        return parent::setSessionid($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getPartner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartner', array());

        return parent::getPartner();
    }

    /**
     * {@inheritDoc}
     */
    public function getPartnerId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartnerId', array());

        return parent::getPartnerId();
    }

    /**
     * {@inheritDoc}
     */
    public function getPartnerNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartnerNev', array());

        return parent::getPartnerNev();
    }

    /**
     * {@inheritDoc}
     */
    public function setPartner($val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPartner', array($val));

        return parent::setPartner($val);
    }

    /**
     * {@inheritDoc}
     */
    public function removePartner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePartner', array());

        return parent::removePartner();
    }

    /**
     * {@inheritDoc}
     */
    public function getTermek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermek', array());

        return parent::getTermek();
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekId', array());

        return parent::getTermekId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermek(\Entities\Termek $val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermek', array($val));

        return parent::setTermek($val);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTermek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTermek', array());

        return parent::removeTermek();
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekvaltozat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekvaltozat', array());

        return parent::getTermekvaltozat();
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekvaltozatId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekvaltozatId', array());

        return parent::getTermekvaltozatId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermekvaltozat(\Entities\TermekValtozat $val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermekvaltozat', array($val));

        return parent::setTermekvaltozat($val);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTermekvaltozat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTermekvaltozat', array());

        return parent::removeTermekvaltozat();
    }

    /**
     * {@inheritDoc}
     */
    public function getMennyiseg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMennyiseg', array());

        return parent::getMennyiseg();
    }

    /**
     * {@inheritDoc}
     */
    public function novelMennyiseg($added = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'novelMennyiseg', array($added));

        return parent::novelMennyiseg($added);
    }

    /**
     * {@inheritDoc}
     */
    public function setMennyiseg($val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMennyiseg', array($val));

        return parent::setMennyiseg($val);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastmod()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastmod', array());

        return parent::getLastmod();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', array());

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedStr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedStr', array());

        return parent::getCreatedStr();
    }

    /**
     * {@inheritDoc}
     */
    public function getNettoegysar()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNettoegysar', array());

        return parent::getNettoegysar();
    }

    /**
     * {@inheritDoc}
     */
    public function setNettoegysar($netto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNettoegysar', array($netto));

        return parent::setNettoegysar($netto);
    }

    /**
     * {@inheritDoc}
     */
    public function getBruttoegysar()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBruttoegysar', array());

        return parent::getBruttoegysar();
    }

    /**
     * {@inheritDoc}
     */
    public function setBruttoegysar($brutto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBruttoegysar', array($brutto));

        return parent::setBruttoegysar($brutto);
    }

    /**
     * {@inheritDoc}
     */
    public function getValutanem()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValutanem', array());

        return parent::getValutanem();
    }

    /**
     * {@inheritDoc}
     */
    public function setValutanem($valutanem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setValutanem', array($valutanem));

        return parent::setValutanem($valutanem);
    }

    /**
     * {@inheritDoc}
     */
    public function getValutanemNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValutanemNev', array());

        return parent::getValutanemNev();
    }

    /**
     * {@inheritDoc}
     */
    public function getSorrend()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSorrend', array());

        return parent::getSorrend();
    }

    /**
     * {@inheritDoc}
     */
    public function setSorrend($s)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSorrend', array($s));

        return parent::setSorrend($s);
    }

    /**
     * {@inheritDoc}
     */
    public function getEbruttoegysar()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEbruttoegysar', array());

        return parent::getEbruttoegysar();
    }

    /**
     * {@inheritDoc}
     */
    public function setEbruttoegysar($ebruttoegysar)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEbruttoegysar', array($ebruttoegysar));

        return parent::setEbruttoegysar($ebruttoegysar);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnettoegysar()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnettoegysar', array());

        return parent::getEnettoegysar();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnettoegysar($enettoegysar)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnettoegysar', array($enettoegysar));

        return parent::setEnettoegysar($enettoegysar);
    }

    /**
     * {@inheritDoc}
     */
    public function getKedvezmeny()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKedvezmeny', array());

        return parent::getKedvezmeny();
    }

    /**
     * {@inheritDoc}
     */
    public function setKedvezmeny($kedvezmeny)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKedvezmeny', array($kedvezmeny));

        return parent::setKedvezmeny($kedvezmeny);
    }

}
