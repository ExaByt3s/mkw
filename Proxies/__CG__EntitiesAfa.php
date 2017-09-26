<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Afa extends \Entities\Afa implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entities\\Afa' . "\0" . 'id', '' . "\0" . 'Entities\\Afa' . "\0" . 'nev', '' . "\0" . 'Entities\\Afa' . "\0" . 'ertek', '' . "\0" . 'Entities\\Afa' . "\0" . 'rlbkod', '' . "\0" . 'Entities\\Afa' . "\0" . 'migrid', '' . "\0" . 'Entities\\Afa' . "\0" . 'emagid', '' . "\0" . 'Entities\\Afa' . "\0" . 'bizonylattetelek'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\Afa' . "\0" . 'id', '' . "\0" . 'Entities\\Afa' . "\0" . 'nev', '' . "\0" . 'Entities\\Afa' . "\0" . 'ertek', '' . "\0" . 'Entities\\Afa' . "\0" . 'rlbkod', '' . "\0" . 'Entities\\Afa' . "\0" . 'migrid', '' . "\0" . 'Entities\\Afa' . "\0" . 'emagid', '' . "\0" . 'Entities\\Afa' . "\0" . 'bizonylattetelek'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Afa $proxy) {
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
    public function getNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNev', []);

        return parent::getNev();
    }

    /**
     * {@inheritDoc}
     */
    public function setNev($nev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNev', [$nev]);

        return parent::setNev($nev);
    }

    /**
     * {@inheritDoc}
     */
    public function getErtek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getErtek', []);

        return parent::getErtek();
    }

    /**
     * {@inheritDoc}
     */
    public function setErtek($ertek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setErtek', [$ertek]);

        return parent::setErtek($ertek);
    }

    /**
     * {@inheritDoc}
     */
    public function getRLBkod()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRLBkod', []);

        return parent::getRLBkod();
    }

    /**
     * {@inheritDoc}
     */
    public function setRLBKod($d)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRLBKod', [$d]);

        return parent::setRLBKod($d);
    }

    /**
     * {@inheritDoc}
     */
    public function calcBrutto($netto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'calcBrutto', [$netto]);

        return parent::calcBrutto($netto);
    }

    /**
     * {@inheritDoc}
     */
    public function calcNetto($brutto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'calcNetto', [$brutto]);

        return parent::calcNetto($brutto);
    }

    /**
     * {@inheritDoc}
     */
    public function getMigrid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMigrid', []);

        return parent::getMigrid();
    }

    /**
     * {@inheritDoc}
     */
    public function setMigrid($migrid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMigrid', [$migrid]);

        return parent::setMigrid($migrid);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmagid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmagid', []);

        return parent::getEmagid();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmagid($emagid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmagid', [$emagid]);

        return parent::setEmagid($emagid);
    }

}
