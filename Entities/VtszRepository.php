<?php
namespace Entities;

class VtszRepository extends \mkwhelpers\Repository {

	public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
		parent::__construct($em,$class);
		$this->entityname='Entities\Vtsz';
	}

	public function getAll($filter,$order, $offset = 0, $elemcount = 0) {
		return $this->_em->createQuery('SELECT '.$this->alias.',a FROM '.$this->entityname.' '.$this->alias
			.' LEFT JOIN '.$this->alias.'.afa a'
			.$this->getFilterString($filter)
			.$this->getOrderString($order))
			->setParameters($this->getQueryParameters($filter))
			->getResult();
	}
}