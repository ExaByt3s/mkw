<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Dolgozo extends \Entities\Dolgozo implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'id', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'nev', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'jelszo', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'irszam', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'varos', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'utca', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'telefon', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'email', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'munkakor', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'szulido', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'szulhely', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'evesmaxszabi', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'munkaviszonykezdete', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'jelenletek');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'id', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'nev', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'jelszo', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'irszam', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'varos', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'utca', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'telefon', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'email', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'munkakor', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'szulido', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'szulhely', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'evesmaxszabi', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'munkaviszonykezdete', '' . "\0" . 'Entities\\Dolgozo' . "\0" . 'jelenletek');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Dolgozo $proxy) {
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
    public function getIrszam()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIrszam', array());

        return parent::getIrszam();
    }

    /**
     * {@inheritDoc}
     */
    public function setIrszam($irszam)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIrszam', array($irszam));

        return parent::setIrszam($irszam);
    }

    /**
     * {@inheritDoc}
     */
    public function getVaros()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVaros', array());

        return parent::getVaros();
    }

    /**
     * {@inheritDoc}
     */
    public function setVaros($varos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVaros', array($varos));

        return parent::setVaros($varos);
    }

    /**
     * {@inheritDoc}
     */
    public function getUtca()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUtca', array());

        return parent::getUtca();
    }

    /**
     * {@inheritDoc}
     */
    public function setUtca($utca)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUtca', array($utca));

        return parent::setUtca($utca);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefon', array());

        return parent::getTelefon();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefon($telefon)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefon', array($telefon));

        return parent::setTelefon($telefon);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getSzulido()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSzulido', array());

        return parent::getSzulido();
    }

    /**
     * {@inheritDoc}
     */
    public function getSzulidoStr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSzulidoStr', array());

        return parent::getSzulidoStr();
    }

    /**
     * {@inheritDoc}
     */
    public function setSzulido($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSzulido', array($adat));

        return parent::setSzulido($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getSzulhely()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSzulhely', array());

        return parent::getSzulhely();
    }

    /**
     * {@inheritDoc}
     */
    public function setSzulhely($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSzulhely', array($adat));

        return parent::setSzulhely($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getEvesmaxszabi()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEvesmaxszabi', array());

        return parent::getEvesmaxszabi();
    }

    /**
     * {@inheritDoc}
     */
    public function setEvesmaxszabi($eves)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEvesmaxszabi', array($eves));

        return parent::setEvesmaxszabi($eves);
    }

    /**
     * {@inheritDoc}
     */
    public function getMunkaviszonykezdete()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMunkaviszonykezdete', array());

        return parent::getMunkaviszonykezdete();
    }

    /**
     * {@inheritDoc}
     */
    public function getMunkaviszonykezdeteStr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMunkaviszonykezdeteStr', array());

        return parent::getMunkaviszonykezdeteStr();
    }

    /**
     * {@inheritDoc}
     */
    public function setMunkaviszonykezdete($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMunkaviszonykezdete', array($adat));

        return parent::setMunkaviszonykezdete($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getMunkakor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMunkakor', array());

        return parent::getMunkakor();
    }

    /**
     * {@inheritDoc}
     */
    public function getMunkakorNev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMunkakorNev', array());

        return parent::getMunkakorNev();
    }

    /**
     * {@inheritDoc}
     */
    public function getMunkakorId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMunkakorId', array());

        return parent::getMunkakorId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMunkakor(\Entities\Munkakor $munkakor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMunkakor', array($munkakor));

        return parent::setMunkakor($munkakor);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMunkakor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMunkakor', array());

        return parent::removeMunkakor();
    }

    /**
     * {@inheritDoc}
     */
    public function getJelenletek()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJelenletek', array());

        return parent::getJelenletek();
    }

    /**
     * {@inheritDoc}
     */
    public function addJelenlet(\Entities\Jelenletiiv $adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addJelenlet', array($adat));

        return parent::addJelenlet($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function removeJelenlet(\Entities\Jelenletiiv $adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeJelenlet', array($adat));

        return parent::removeJelenlet($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function getJelszo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJelszo', array());

        return parent::getJelszo();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlainJelszo($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlainJelszo', array($adat));

        return parent::setPlainJelszo($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function checkPlainJelszo($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'checkPlainJelszo', array($adat));

        return parent::checkPlainJelszo($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function setJelszo($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJelszo', array($adat));

        return parent::setJelszo($adat);
    }

    /**
     * {@inheritDoc}
     */
    public function checkJelszo($adat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'checkJelszo', array($adat));

        return parent::checkJelszo($adat);
    }

}