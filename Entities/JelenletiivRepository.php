<?php
namespace Entities;

class JelenletiivRepository extends \mkwhelpers\Repository {

	public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
		parent::__construct($em,$class);
		$this->setEntityname('Entities\Jelenletiiv');
		$this->setOrders(array(
			'1'=>array('caption'=>'dátum és dolgozó szerint','order'=>array('_xx.datum'=>'ASC','d.nev'=>'ASC')),
			'2'=>array('caption'=>'dolgozó és dátum szerint','order'=>array('d.nev'=>'ASC','_xx.datum'=>'ASC'))
		));
/* MINTA
		$this->setBatches(array(
			'1'=>'áthelyezés másik címkecsoportba'
		));
*/
	}

	public function getWithJoins($filter,$order,$offset=0,$elemcount=0) {
		$a=$this->alias;
		$q=$this->_em->createQuery('SELECT '.$a.',d,j '
			.' FROM '.$this->entityname.' '.$a
			.' LEFT JOIN '.$a.'.dolgozo d'
			.' LEFT JOIN '.$a.'.jelenlettipus j'
			.$this->getFilterString($filter)
			.$this->getOrderString($order));
		$q->setParameters($this->getQueryParameters($filter));
		if ($offset>0) {
			$q->setFirstResult($offset);
		}
		if ($elemcount>0) {
			$q->setMaxResults($elemcount);
		}
		return $q->getResult();
	}

	public function getCount($filter) {
		$a=$this->alias;
		$q=$this->_em->createQuery('SELECT COUNT('.$a.') FROM '.$this->entityname.' '.$a
			.' LEFT JOIN '.$a.'.dolgozo d'
			.' LEFT JOIN '.$a.'.jelenlettipus j'
			.$this->getFilterString($filter));
		$q->setParameters($this->getQueryParameters($filter));
		return $q->getSingleScalarResult();
	}
}