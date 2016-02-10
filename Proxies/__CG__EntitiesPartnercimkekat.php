<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Partnercimkekat extends \Entities\Partnercimkekat implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entities\\Partnercimkekat' . "\0" . 'nev', '' . "\0" . 'Entities\\Partnercimkekat' . "\0" . 'slug', '' . "\0" . 'Entities\\Partnercimkekat' . "\0" . 'cimkek'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\Partnercimkekat' . "\0" . 'nev', '' . "\0" . 'Entities\\Partnercimkekat' . "\0" . 'slug', '' . "\0" . 'Entities\\Partnercimkekat' . "\0" . 'cimkek'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Partnercimkekat $proxy) {
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
    public function getCimkek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCimkek', []);

        return parent::getCimkek();
    }

    /**
     * {@inheritDoc}
     */
    public function AddCimke(\Entities\Cimketorzs $cimke)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'AddCimke', [$cimke]);

        return parent::AddCimke($cimke);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCimke(\Entities\Cimketorzs $cimke)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCimke', [$cimke]);

        return parent::removeCimke($cimke);
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
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', []);

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', [$slug]);

        return parent::setSlug($slug);
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
    public function getTermeklaponlathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermeklaponlathato', []);

        return parent::getTermeklaponlathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermeklaponlathato($lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermeklaponlathato', [$lathato]);

        return parent::setTermeklaponlathato($lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekakciodobozbanlathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekakciodobozbanlathato', []);

        return parent::getTermekakciodobozbanlathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermekakciodobozbanlathato($lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermekakciodobozbanlathato', [$lathato]);

        return parent::setTermekakciodobozbanlathato($lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getTermeklistabanlathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermeklistabanlathato', []);

        return parent::getTermeklistabanlathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermeklistabanlathato($lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermeklistabanlathato', [$lathato]);

        return parent::setTermeklistabanlathato($lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekszurobenlathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekszurobenlathato', []);

        return parent::getTermekszurobenlathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setTermekszurobenlathato($lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTermekszurobenlathato', [$lathato]);

        return parent::setTermekszurobenlathato($lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getSorrend()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSorrend', []);

        return parent::getSorrend();
    }

    /**
     * {@inheritDoc}
     */
    public function setSorrend($sorrend)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSorrend', [$sorrend]);

        return parent::setSorrend($sorrend);
    }

}
