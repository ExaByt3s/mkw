<?php
namespace Entities;

class TermekErtesitoRepository extends \mkwhelpers\Repository {

	public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
		parent::__construct($em,$class);
		$this->setEntityname('Entities\TermekErtesito');
		$this->setOrders(array(
			'1'=>array('caption'=>'név szerint','order'=>array('_xx.nev'=>'ASC'))
		));
	}

	public function getByPartner($partner) {
		$filter=array();
		$filter['fields'][]='partner';
		$filter['clauses'][]='=';
		$filter['values'][]=$partner;
		$filter['sql'][]='(_xx.sent IS NULL)';
		return $this->getAll($filter,array('created'=>'ASC'));
	}

/* Ha van JOIN, ezek akkor kellenek
	public function getWithJoins($filter,$order,$offset=0,$elemcount=0) {
		$a=$this->alias;
		$q=$this->_em->createQuery('SELECT '.$a
			.' FROM '.$this->entityname.' '.$a
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
			.$this->getFilterString($filter));
		$q->setParameters($this->getQueryParameters($filter));
		return $q->getSingleScalarResult();
	}
*/
}