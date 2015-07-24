<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Termekcimketorzs extends \Entities\Termekcimketorzs implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'nev', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'slug', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'termekek', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'kategoria', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'kiemelt');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'nev', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'slug', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'termekek', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'kategoria', '' . "\0" . 'Entities\\Termekcimketorzs' . "\0" . 'kiemelt');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Termekcimketorzs $proxy) {
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
    public function toLista()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toLista', array());

        return parent::toLista();
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekFilter()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekFilter', array());

        return parent::getTermekFilter();
    }

    /**
     * {@inheritDoc}
     */
    public function getKategoria()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKategoria', array());

        return parent::getKategoria();
    }

    /**
     * {@inheritDoc}
     */
    public function getKategoriaId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKategoriaId', array());

        return parent::getKategoriaId();
    }

    /**
     * {@inheritDoc}
     */
    public function setKategoria(\Entities\Cimkekat $kategoria)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKategoria', array($kategoria));

        return parent::setKategoria($kategoria);
    }

    /**
     * {@inheritDoc}
     */
    public function removeKategoria()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeKategoria', array());

        return parent::removeKategoria();
    }

    /**
     * {@inheritDoc}
     */
    public function getNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNev', array());

        return parent::getNev();
    }

    /**
     * {@inheritDoc}
     */
    public function setNev($nev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNev', array($nev));

        return parent::setNev($nev);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', array());

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', array($slug));

        return parent::setSlug($slug);
    }

    /**
     * {@inheritDoc}
     */
    public function getTermekek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTermekek', array());

        return parent::getTermekek();
    }

    /**
     * {@inheritDoc}
     */
    public function addTermek(\Entities\Termek $termek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTermek', array($termek));

        return parent::addTermek($termek);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTermek(\Entities\Termek $termek)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTermek', array($termek));

        return parent::removeTermek($termek);
    }

    /**
     * {@inheritDoc}
     */
    public function getKiemelt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKiemelt', array());

        return parent::getKiemelt();
    }

    /**
     * {@inheritDoc}
     */
    public function setKiemelt($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKiemelt', array($adat));

        return parent::setKiemelt($adat);
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
    public function getMenu1lathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMenu1lathato', array());

        return parent::getMenu1lathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setMenu1lathato($menu1lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMenu1lathato', array($menu1lathato));

        return parent::setMenu1lathato($menu1lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getMenu2lathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMenu2lathato', array());

        return parent::getMenu2lathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setMenu2lathato($menu2lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMenu2lathato', array($menu2lathato));

        return parent::setMenu2lathato($menu2lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getMenu3lathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMenu3lathato', array());

        return parent::getMenu3lathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setMenu3lathato($menu3lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMenu3lathato', array($menu3lathato));

        return parent::setMenu3lathato($menu3lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getMenu4lathato()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMenu4lathato', array());

        return parent::getMenu4lathato();
    }

    /**
     * {@inheritDoc}
     */
    public function setMenu4lathato($menu4lathato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMenu4lathato', array($menu4lathato));

        return parent::setMenu4lathato($menu4lathato);
    }

    /**
     * {@inheritDoc}
     */
    public function getLeiras()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLeiras', array());

        return parent::getLeiras();
    }

    /**
     * {@inheritDoc}
     */
    public function setLeiras($leiras)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLeiras', array($leiras));

        return parent::setLeiras($leiras);
    }

    /**
     * {@inheritDoc}
     */
    public function getOldalcim()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOldalcim', array());

        return parent::getOldalcim();
    }

    /**
     * {@inheritDoc}
     */
    public function setOldalcim($oldalcim)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOldalcim', array($oldalcim));

        return parent::setOldalcim($oldalcim);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurl($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurl', array($pre));

        return parent::getKepurl($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlSmall($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlSmall', array($pre));

        return parent::getKepurlSmall($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlMedium($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlMedium', array($pre));

        return parent::getKepurlMedium($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepurlLarge($pre = '/')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepurlLarge', array($pre));

        return parent::getKepurlLarge($pre);
    }

    /**
     * {@inheritDoc}
     */
    public function setKepurl($kepurl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKepurl', array($kepurl));

        return parent::setKepurl($kepurl);
    }

    /**
     * {@inheritDoc}
     */
    public function getKepleiras()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKepleiras', array());

        return parent::getKepleiras();
    }

    /**
     * {@inheritDoc}
     */
    public function setKepleiras($kepleiras)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKepleiras', array($kepleiras));

        return parent::setKepleiras($kepleiras);
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
    public function setSorrend($sorrend)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSorrend', array($sorrend));

        return parent::setSorrend($sorrend);
    }

}