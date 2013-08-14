<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class EntitiesSzallitasimodProxy extends \Entities\Szallitasimod implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function getNev()
    {
        $this->__load();
        return parent::getNev();
    }

    public function setNev($nev)
    {
        $this->__load();
        return parent::setNev($nev);
    }

    public function getWebes()
    {
        $this->__load();
        return parent::getWebes();
    }

    public function setWebes($webes)
    {
        $this->__load();
        return parent::setWebes($webes);
    }

    public function getLeiras()
    {
        $this->__load();
        return parent::getLeiras();
    }

    public function setLeiras($leiras)
    {
        $this->__load();
        return parent::setLeiras($leiras);
    }

    public function getFizmodok()
    {
        $this->__load();
        return parent::getFizmodok();
    }

    public function setFizmodok($fm)
    {
        $this->__load();
        return parent::setFizmodok($fm);
    }

    public function getSorrend()
    {
        $this->__load();
        return parent::getSorrend();
    }

    public function setSorrend($val)
    {
        $this->__load();
        return parent::setSorrend($val);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nev', 'webes', 'leiras', 'fizmodok', 'bizonylatfejek', 'sorrend');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}