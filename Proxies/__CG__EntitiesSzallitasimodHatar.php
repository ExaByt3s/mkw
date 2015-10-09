<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SzallitasimodHatar extends \Entities\SzallitasimodHatar implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'id', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'szallitasimod', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'valutanem', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'hatarertek', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'osszeg');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'id', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'szallitasimod', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'valutanem', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'hatarertek', '' . "\0" . 'Entities\\SzallitasimodHatar' . "\0" . 'osszeg');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SzallitasimodHatar $proxy) {
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
    public function getHatarertek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHatarertek', array());

        return parent::getHatarertek();
    }

    /**
     * {@inheritDoc}
     */
    public function setHatarertek($hatarertek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHatarertek', array($hatarertek));

        return parent::setHatarertek($hatarertek);
    }

    /**
     * {@inheritDoc}
     */
    public function getSzallitasimod()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSzallitasimod', array());

        return parent::getSzallitasimod();
    }

    /**
     * {@inheritDoc}
     */
    public function setSzallitasimod($val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSzallitasimod', array($val));

        return parent::setSzallitasimod($val);
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
    public function getValutanemNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValutanemNev', array());

        return parent::getValutanemNev();
    }

    /**
     * {@inheritDoc}
     */
    public function getValutanemId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValutanemId', array());

        return parent::getValutanemId();
    }

    /**
     * {@inheritDoc}
     */
    public function setValutanem($val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setValutanem', array($val));

        return parent::setValutanem($val);
    }

    /**
     * {@inheritDoc}
     */
    public function getOsszeg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOsszeg', array());

        return parent::getOsszeg();
    }

    /**
     * {@inheritDoc}
     */
    public function setOsszeg($osszeg)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOsszeg', array($osszeg));

        return parent::setOsszeg($osszeg);
    }

}