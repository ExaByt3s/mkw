<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class EntitiesBizonylatstatuszProxy extends \Entities\Bizonylatstatusz implements \Doctrine\ORM\Proxy\Proxy
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

    public function getEmailtemplate()
    {
        $this->__load();
        return parent::getEmailtemplate();
    }

    public function getEmailtemplateId()
    {
        $this->__load();
        return parent::getEmailtemplateId();
    }

    public function getEmailtemplateNev()
    {
        $this->__load();
        return parent::getEmailtemplateNev();
    }

    public function setEmailtemplate($val)
    {
        $this->__load();
        return parent::setEmailtemplate($val);
    }

    public function removeEmailtemplate()
    {
        $this->__load();
        return parent::removeEmailtemplate();
    }

    public function getSorrend()
    {
        $this->__load();
        return parent::getSorrend();
    }

    public function setSorrend($s)
    {
        $this->__load();
        return parent::setSorrend($s);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nev', 'sorrend', 'emailtemplate', 'bizonylatfejek');
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