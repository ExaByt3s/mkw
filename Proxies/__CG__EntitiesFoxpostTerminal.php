<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class FoxpostTerminal extends \Entities\FoxpostTerminal implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'id', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'tipus', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'nev', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'cim', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'csoport', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'subgroup', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'nyitva', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'findme', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'geolat', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'geolng', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'bizonylatfejek', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'inaktiv'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'id', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'tipus', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'nev', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'cim', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'csoport', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'subgroup', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'nyitva', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'findme', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'geolat', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'geolng', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'bizonylatfejek', '' . "\0" . 'Entities\\FoxpostTerminal' . "\0" . 'inaktiv'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (FoxpostTerminal $proxy) {
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
    public function setId($val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$val]);

        return parent::setId($val);
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
    public function setNev($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNev', [$adat]);

        return parent::setNev($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getCim()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCim', []);

        return parent::getCim();
    }

    /**
     * {@inheritDoc}
     */
    public function setCim($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCim', [$adat]);

        return parent::setCim($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getCsoport()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCsoport', []);

        return parent::getCsoport();
    }

    /**
     * {@inheritDoc}
     */
    public function setCsoport($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCsoport', [$adat]);

        return parent::setCsoport($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubgroup()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubgroup', []);

        return parent::getSubgroup();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubgroup($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubgroup', [$adat]);

        return parent::setSubgroup($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getNyitva()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNyitva', []);

        return parent::getNyitva();
    }

    /**
     * {@inheritDoc}
     */
    public function setNyitva($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNyitva', [$adat]);

        return parent::setNyitva($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getFindme()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFindme', []);

        return parent::getFindme();
    }

    /**
     * {@inheritDoc}
     */
    public function setFindme($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFindme', [$adat]);

        return parent::setFindme($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getGeolat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGeolat', []);

        return parent::getGeolat();
    }

    /**
     * {@inheritDoc}
     */
    public function setGeolat($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGeolat', [$adat]);

        return parent::setGeolat($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getGeolng()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGeolng', []);

        return parent::getGeolng();
    }

    /**
     * {@inheritDoc}
     */
    public function setGeolng($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGeolng', [$adat]);

        return parent::setGeolng($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getInaktiv()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInaktiv', []);

        return parent::getInaktiv();
    }

    /**
     * {@inheritDoc}
     */
    public function setInaktiv($inaktiv)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInaktiv', [$inaktiv]);

        return parent::setInaktiv($inaktiv);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipus', []);

        return parent::getTipus();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipus($tipus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipus', [$tipus]);

        return parent::setTipus($tipus);
    }

}
