<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Entities\OrarendRepository")
 * @ORM\Table(name="orarend",
 * options={"collate"="utf8_hungarian_ci", "charset"="utf8", "engine"="InnoDB"},
 * indexes={
 * 		@ORM\index(name="orarendnapkezdet_idx",columns={"nap","kezdet"})
 * })
 * @ORM\HasLifecycleCallbacks
 */
class Orarend {

    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id = 0;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $lastmod;

    /**
     * @ORM\ManyToOne(targetEntity="Dolgozo")
     * @ORM\JoinColumn(name="dolgozo_id",referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $dolgozo;

    /**
     * @ORM\ManyToOne(targetEntity="Dolgozo")
     * @ORM\JoinColumn(name="helyettesito_id",referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $helyettesito;

    /**
     * @ORM\ManyToOne(targetEntity="Jogaterem")
     * @ORM\JoinColumn(name="jogaterem_id",referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $jogaterem;

    /**
     * @ORM\ManyToOne(targetEntity="Jogaoratipus")
     * @ORM\JoinColumn(name="jogaoratipus_id",referencedColumnName="id",nullable=true,onDelete="restrict")
     */
    private $jogaoratipus;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    private $nev = '';

    /** @ORM\Column(type="integer",nullable=true) */
    private $maxferohely = 0;

    /** @ORM\Column(type="integer",nullable=false) */
    private $nap = 0;

    /** @ORM\Column(type="time",nullable=false) */
    private $kezdet;

    /** @ORM\Column(type="time",nullable=false) */
    private $veg;

    /** @ORM\Column(type="boolean", nullable=false) */
    private $inaktiv = false;

    /** @ORM\Column(type="boolean", nullable=false) */
    private $alkalmi = false;

    /** @ORM\Column(type="boolean", nullable=false) */
    private $elmarad = false;

    public function getDolgozo() {
        return $this->dolgozo;
    }

    public function getDolgozoNev() {
        if ($this->dolgozo) {
            return $this->dolgozo->getNev();
        }
        return '';
    }

    public function getDolgozoId() {
        if ($this->dolgozo) {
            return $this->dolgozo->getId();
        }
        return '';
    }

    public function setDolgozo($dolgozo) {
        $this->dolgozo = $dolgozo;
    }

    public function getHelyettesito() {
        return $this->helyettesito;
    }

    public function getHelyettesitoNev() {
        if ($this->helyettesito) {
            return $this->helyettesito->getNev();
        }
        return '';
    }

    public function getHelyettesitoId() {
        if ($this->helyettesito) {
            return $this->helyettesito->getId();
        }
        return '';
    }

    public function setHelyettesito($helyettesito) {
        $this->helyettesito = $helyettesito;
    }

    public function getJogaterem() {
        return $this->jogaterem;
    }

    public function getJogateremNev() {
        if ($this->jogaterem) {
            return $this->jogaterem->getNev();
        }
        return '';
    }

    public function getJogateremOrarendclass() {
        if ($this->jogaterem) {
            return $this->jogaterem->getOrarendclass();
        }
        return '';
    }

    public function getJogateremId() {
        if ($this->jogaterem) {
            return $this->jogaterem->getId();
        }
        return '';
    }

    public function setJogaterem($jogaterem) {
        $this->jogaterem = $jogaterem;
    }

    public function getJogaoratipus() {
        return $this->jogaoratipus;
    }

    public function getJogaoratipusNev() {
        if ($this->jogaoratipus) {
            return $this->jogaoratipus->getNev();
        }
        return '';
    }

    public function getJogaoratipusId() {
        if ($this->jogaoratipus) {
            return $this->jogaoratipus->getId();
        }
        return '';
    }

    public function setJogaoratipus($jogaoratipus) {
        $this->jogaoratipus = $jogaoratipus;
        if (!$this->nev) {
            $this->setNev($this->getJogaoratipusNev());
        }
    }

    /**
     * @return mixed
     */
    public function getNev() {
        return $this->nev;
    }

    /**
     * @param mixed $nev
     */
    public function setNev($nev) {
        $this->nev = $nev;
    }

    /**
     * @return mixed
     */
    public function getMaxferohely() {
        return $this->maxferohely;
    }

    /**
     * @param mixed $maxferohely
     */
    public function setMaxferohely($maxferohely) {
        $this->maxferohely = $maxferohely;
    }

    /**
     * @return mixed
     */
    public function getNap() {
        return $this->nap;
    }

    public function getNapNev() {
        return \mkw\store::getDayname($this->nap);
    }

    /**
     * @param mixed $nap
     */
    public function setNap($nap) {
        $this->nap = $nap;
    }

    /**
     * @return mixed
     */
    public function getKezdet() {
        return $this->kezdet;
    }

    public function getKezdetStr() {
        if ($this->getKezdet()) {
            return $this->getKezdet()->format(\mkw\store::$TimeFormat);
        }
        return '';
    }

    /**
     * @param mixed $kezdet
     */
    public function setKezdet($kezdet) {
        if (is_a($kezdet, 'DateTime')) {
            $this->kezdet = $kezdet;
        }
        else {
            if ($kezdet == '') {
                $kezdet = date(\mkw\store::$DateFormat);
            }
            $this->kezdet = new \DateTime(\mkw\store::convTime($kezdet));
        }
    }

    /**
     * @return mixed
     */
    public function getVeg() {
        return $this->veg;
    }

    public function getVegStr() {
        if ($this->getVeg()) {
            return $this->getVeg()->format(\mkw\store::$TimeFormat);
        }
        return '';
    }

    /**
     * @param mixed $veg
     */
    public function setVeg($veg) {
        if (is_a($veg, 'DateTime')) {
            $this->veg = $veg;
        }
        else {
            if ($veg == '') {
                $veg = date(\mkw\store::$DateFormat);
            }
            $this->veg = new \DateTime(\mkw\store::convTime($veg));
        }
    }

    /**
     * @return mixed
     */
    public function getInaktiv() {
        return $this->inaktiv;
    }

    /**
     * @param mixed $inaktiv
     */
    public function setInaktiv($inaktiv) {
        $this->inaktiv = $inaktiv;
    }

    public function getId() {
        return $this->id;
    }

    public function getDolgozoUrl() {
        if ($this->dolgozo) {
            return $this->dolgozo->getUrl();
        }
        return '';
    }

    public function getHelyettesitoUrl() {
        if ($this->helyettesito) {
            return $this->helyettesito->getUrl();
        }
        return '';
    }

    public function getJogaoratipusUrl() {
        if ($this->jogaoratipus) {
            return $this->jogaoratipus->getUrl();
        }
        return '';
    }

    /**
     * @return mixed
     */
    public function getAlkalmi() {
        return $this->alkalmi;
    }

    /**
     * @param mixed $alkalmi
     */
    public function setAlkalmi($alkalmi) {
        $this->alkalmi = $alkalmi;
    }

    public function isDelelottKezdodik() {
        $noon = '12:00:00';
        return $this->getKezdetStr() <= $noon;
    }

    /**
     * @return mixed
     */
    public function getElmarad() {
        return $this->elmarad;
    }

    /**
     * @param mixed $elmarad
     */
    public function setElmarad($elmarad) {
        $this->elmarad = $elmarad;
    }
}