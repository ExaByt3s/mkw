<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PartnerMIJSZOklevel extends \Entities\PartnerMIJSZOklevel implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'id', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'partner', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'mijszoklevelkibocsajto', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'mijszoklevelszint', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'oklevelev'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'id', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'partner', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'mijszoklevelkibocsajto', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'mijszoklevelszint', '' . "\0" . 'Entities\\PartnerMIJSZOklevel' . "\0" . 'oklevelev'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PartnerMIJSZOklevel $proxy) {
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
    public function toLista()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toLista', []);

        return parent::toLista();
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
    public function getPartner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartner', []);

        return parent::getPartner();
    }

    /**
     * {@inheritDoc}
     */
    public function getPartnerId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartnerId', []);

        return parent::getPartnerId();
    }

    /**
     * {@inheritDoc}
     */
    public function getPartnerNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartnerNev', []);

        return parent::getPartnerNev();
    }

    /**
     * {@inheritDoc}
     */
    public function setPartner($partner)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPartner', [$partner]);

        return parent::setPartner($partner);
    }

    /**
     * {@inheritDoc}
     */
    public function getMIJSZOklevelkibocsajto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMIJSZOklevelkibocsajto', []);

        return parent::getMIJSZOklevelkibocsajto();
    }

    /**
     * {@inheritDoc}
     */
    public function getMIJSZOklevelkibocsajtoId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMIJSZOklevelkibocsajtoId', []);

        return parent::getMIJSZOklevelkibocsajtoId();
    }

    /**
     * {@inheritDoc}
     */
    public function getMIJSZOklevelkibocsajtoNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMIJSZOklevelkibocsajtoNev', []);

        return parent::getMIJSZOklevelkibocsajtoNev();
    }

    /**
     * {@inheritDoc}
     */
    public function setMIJSZOklevelkibocsajto($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMIJSZOklevelkibocsajto', [$adat]);

        return parent::setMIJSZOklevelkibocsajto($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getMIJSZOklevelszint()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMIJSZOklevelszint', []);

        return parent::getMIJSZOklevelszint();
    }

    /**
     * {@inheritDoc}
     */
    public function getMIJSZOklevelszintId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMIJSZOklevelszintId', []);

        return parent::getMIJSZOklevelszintId();
    }

    /**
     * {@inheritDoc}
     */
    public function getMIJSZOklevelszintNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMIJSZOklevelszintNev', []);

        return parent::getMIJSZOklevelszintNev();
    }

    /**
     * {@inheritDoc}
     */
    public function setMIJSZOklevelszint($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMIJSZOklevelszint', [$adat]);

        return parent::setMIJSZOklevelszint($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getOklevelev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOklevelev', []);

        return parent::getOklevelev();
    }

    /**
     * {@inheritDoc}
     */
    public function setOklevelev($oklevelev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOklevelev', [$oklevelev]);

        return parent::setOklevelev($oklevelev);
    }

}