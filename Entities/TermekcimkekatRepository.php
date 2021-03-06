<?php

namespace Entities;

use mkwhelpers\FilterDescriptor;

class TermekcimkekatRepository extends \mkwhelpers\Repository {

    public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
        parent::__construct($em, $class);
        $this->setEntityname('Entities\Termekcimkekat');
    }

    public function getWithJoins($filter, $order, $offset = 0, $elemcount = 0) {
        $q = $this->_em->createQuery('SELECT _xx,c'
            . ' FROM Entities\Termekcimkekat _xx'
            . ' LEFT JOIN _xx.cimkek c '
            . $this->getFilterString($filter)
            . $this->getOrderString($order));
        $q->setParameters($this->getQueryParameters($filter));
        if ($offset > 0) {
            $q->setFirstResult($offset);
        }
        if ($elemcount > 0) {
            $q->setMaxResults($elemcount);
        }
        return $q->getResult();
    }

    public function getScalarWithJoins($filter, $order, $offset = 0, $elemcount = 0) {
        $q = $this->_em->createQuery('SELECT _xx.id,_xx.nev,_xx.slug,_xx.sorrend,c.id AS cid,c.nev AS cnev,c.sorrend AS csorrend'
            . ' FROM Entities\Termekcimkekat _xx'
            . ' LEFT JOIN _xx.cimkek c '
            . $this->getFilterString($filter)
            . $this->getOrderString($order));
        $q->setParameters($this->getQueryParameters($filter));
        if ($offset > 0) {
            $q->setFirstResult($offset);
        }
        if ($elemcount > 0) {
            $q->setMaxResults($elemcount);
        }
        return $q->getScalarResult();
    }

    public function findWithJoins($id) {
        // TODO SQLINJECTION
        $res = $this->getWithJoins($this->alias . '.id=' . $id, array());
        return $res[0];
    }

    public function getCount($filter) {
        $q = $this->_em->createQuery('SELECT COUNT(_xx.id)'
            . ' FROM Entities\Termekcimkekat _xx'
            . ' LEFT JOIN _xx.cimkek c '
            . $this->getFilterString($filter));
        $q->setParameters($this->getQueryParameters($filter));
        return $q->getSingleScalarResult();
    }

    public function getForTermekSzuro($termekid, $selectedids) {
        $filter = new FilterDescriptor();
        if (count($termekid) > 0) {
            $filterstr = '(_xx.termekszurobenlathato=1) AND (t.id IN (' . implode(',', $termekid) . '))';
            if (count($selectedids) > 0) {
                $filterstr = $filterstr . ' OR (c.id IN (' . implode(',', $selectedids) . '))';
            }
        }
        else {
            $filterstr = 'true=false';
        }
        $filter->addSql($filterstr);
        $order = array('_xx.sorrend' => 'asc', '_xx.nev' => 'asc', 'c.sorrend' => 'asc', 'c.nev' => 'asc');
        $q = $this->_em->createQuery('SELECT _xx,c,t'
            . ' FROM Entities\Termekcimkekat _xx'
            . ' LEFT JOIN _xx.cimkek c '
            . ' INNER JOIN c.termekek t '
            . $this->getFilterString($filter)
            . $this->getOrderString($order));
        $q->setParameters($this->getQueryParameters($filter));
        return $q->getResult();
    }

}
