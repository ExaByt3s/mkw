<?php
namespace Entities;

/**
 * @Entity(repositoryClass="Entities\PartnercimkekatRepository")
 */
class Partnercimkekat extends Cimkekat {
	/**
	 * @gedmo:Sluggable
	 * @Column(type="string",length=100,nullable=true)
	 */
	private $nev;
	/**
	 * @gedmo:Slug
	 * @Column(type="string",length=255,nullable=true)
	 */
	private $slug;
	/** @OneToMany(targetEntity="Partnercimketorzs", mappedBy="kategoria", cascade={"persist"}) */
	private $cimkek;

	public function __construct() {
		$this->cimkek=new \Doctrine\Common\Collections\ArrayCollection();
	}

	public function getCimkek() {
		return $this->cimkek;
	}

	public function AddCimke(Cimketorzs $cimke) {
		if (!$this->cimkek->contains($cimke)) {
			$this->cimkek->add($cimke);
			$cimke->setKategoria($this);
		}
	}

	public function removeCimke(Cimketorzs $cimke) {
		if ($this->cimkek->removeElement($cimke)) {
			$cimke->removeKategoria();
			return true;
		}
		return false;
	}

	public function getNev() {
		return $this->nev;
	}

	public function setNev($nev) {
		$this->nev = $nev;
	}

	public function getSlug() {
		return $this->slug;
	}

	public function setSlug($slug) {
		$this->slug=$slug;
	}
}