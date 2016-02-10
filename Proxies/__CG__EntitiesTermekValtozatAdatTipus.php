<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TermekValtozatAdatTipus extends \Entities\TermekValtozatAdatTipus implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'id', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'nev', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'valtozatok1', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'valtozatok2'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'id', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'nev', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'valtozatok1', '' . "\0" . 'Entities\\TermekValtozatAdatTipus' . "\0" . 'valtozatok2'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TermekValtozatAdatTipus $proxy) {
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
    public function getValtozatok1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValtozatok1', []);

        return parent::getValtozatok1();
    }

    /**
     * {@inheritDoc}
     */
    public function addValtozat1(\Entities\TermekValtozat $valt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addValtozat1', [$valt]);

        return parent::addValtozat1($valt);
    }

    /**
     * {@inheritDoc}
     */
    public function removeValtozat1(\Entities\TermekValtozat $valt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeValtozat1', [$valt]);

        return parent::removeValtozat1($valt);
    }

    /**
     * {@inheritDoc}
     */
    public function getValtozatok2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValtozatok2', []);

        return parent::getValtozatok2();
    }

    /**
     * {@inheritDoc}
     */
    public function addValtozat2(\Entities\TermekValtozat $valt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addValtozat2', [$valt]);

        return parent::addValtozat2($valt);
    }

    /**
     * {@inheritDoc}
     */
    public function removeValtozat2(\Entities\TermekValtozat $valt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeValtozat2', [$valt]);

        return parent::removeValtozat2($valt);
    }

}
