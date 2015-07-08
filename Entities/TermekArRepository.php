<?php
namespace Entities;

class TermekArRepository extends \mkwhelpers\Repository {

	public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
		parent::__construct($em,$class);
		$this->setEntityname('Entities\TermekAr');
		$this->setOrders(array(
			'1'=>array('caption'=>'azonosító szerint növekvő','order'=>array('_xx.azonosito'=>'ASC'))
		));
	}

    public function getByTermek($termek) {
		$filter=array();
		$filter['fields'][]='termek';
		$filter['clauses'][]='=';
		$filter['values'][]=$termek;
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