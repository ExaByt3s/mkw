<?php

namespace Entities;

class PartnerRepository extends \mkwhelpers\Repository {

	public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
		parent::__construct($em, $class);
		$this->setEntityname('Entities\Partner');
		$this->setOrders(array(
			'1' => array('caption' => 'név szerint növekvő', 'order' => array('nev' => 'ASC')),
			'2' => array('caption' => 'cím szerint növekvő', 'order' => array('irszam' => 'ASC', 'varos' => 'ASC', 'utca' => 'ASC'))
		));

        $btch = array();
        if (\mkw\store::isMIJSZ()) {
            $btch['mijszexportin'] = 'Oktató export IN';
            $btch['mijszexportus'] = 'Oktató export US';
        }
        $btch['megjegyzesexport'] = 'Megjegyzés export';
        $btch['roadrecordexport'] = 'Roadrecord export';
		$this->setBatches($btch);
	}

    public function getSzamlatipusList($sel) {
        return array(
            array(
                'id' => 0,
                'caption' => 'magyar',
                'selected' => ($sel == 0)
            ),
            array(
                'id' => 1,
                'caption' => 'EU-n belüli',
                'selected' => ($sel == 1)
            ),
            array(
                'id' => 2,
                'caption' => 'EU-n kívüli',
                'selected' => ($sel == 2)
            )
        );
    }

	public function getWithJoins($filter, $order, $offset = 0, $elemcount = 0) {
		$a = $this->alias;
		$q = $this->_em->createQuery('SELECT ' . $a . ',fm,uk'
				. ' FROM ' . $this->entityname . ' ' . $a
				. ' LEFT JOIN ' . $a . '.fizmod fm'
				. ' LEFT JOIN ' . $a . '.uzletkoto uk '
				. ' LEFT JOIN ' . $a . '.valutanem v '
				. ' LEFT JOIN ' . $a . '.szallitasimod szm '
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

	public function getCount($filter) {
		$a = $this->alias;
		$q = $this->_em->createQuery('SELECT COUNT(' . $a . ') FROM ' . $this->entityname . ' ' . $a
				. ' LEFT JOIN ' . $a . '.fizmod fm'
				. ' LEFT JOIN ' . $a . '.uzletkoto uk '
				. ' LEFT JOIN ' . $a . '.valutanem v '
				. ' LEFT JOIN ' . $a . '.szallitasimod szm '
				. $this->getFilterString($filter));
		$q->setParameters($this->getQueryParameters($filter));
		return $q->getSingleScalarResult();
	}

    public function getAllForSelectList($filter, $order, $offset = 0, $elemcount = 0) {
        $a = $this->alias;
        $q = $this->_em->createQuery('SELECT ' . $a . '.id,' . $a . '.nev, ' . $a . '.irszam, ' . $a . '.varos, ' . $a . '.utca, ' .$a . '.hazszam,' . $a . '.email'
                . ' FROM ' . $this->entityname . ' ' . $a
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

    public function getBizonylatfejLista($keresett) {
        $filter = new \mkwhelpers\FilterDescriptor();
        $filter->addFilter(array('_xx.nev', '_xx.email'), 'LIKE', '%' . $keresett . '%');
        $order = array('_xx.nev' => 'ASC');
        $a = $this->alias;
        $q = $this->_em->createQuery('SELECT ' . $a . '.id,' . $a . '.nev, ' . $a . '.irszam, ' . $a . '.varos, ' . $a . '.utca, ' . $a . '.hazszam,'
            . $a . '.szamlatipus, ' . $a . '.email'
            . ' FROM ' . $this->entityname . ' ' . $a
            . $this->getFilterString($filter)
            . $this->getOrderString($order));
        $q->setParameters($this->getQueryParameters($filter));
        $res = $q->getScalarResult();
        return $res;
    }

    public function getByCimkek($cimkefilter) {
        $partnerkodok = array();
        if ($cimkefilter) {
            if (is_array($cimkefilter)) {
                $cimkekodok = implode(',', $cimkefilter);
            }
            else {
                $cimkekodok = $cimkefilter;
            }
            if ($cimkekodok) {
                $q = \mkw\store::getEm()->createQuery('SELECT p.id FROM Entities\Partnercimketorzs pc JOIN pc.partnerek p WHERE pc.id IN (' . $cimkekodok . ')');
                $res = $q->getScalarResult();
                foreach ($res as $sor) {
                    $partnerkodok[] = $sor['id'];
                }
            }
        }
        return $partnerkodok;
    }

	public function countByEmail($email) {
		$filter = new \mkwhelpers\FilterDescriptor();
        $filter
            ->addFilter('email', '=', $email)
            ->addFilter('vendeg', '=', false);
		return $this->getCount($filter);
	}

	public function findByUserPass($user, $pass) {
        $filter = new \mkwhelpers\FilterDescriptor();
        $filter
            ->addFilter('email', '=', $user)
            ->addFilter('jelszo', '=', sha1(strtoupper(md5($pass)) . \mkw\store::getSalt()));
		return $this->getAll($filter, array());
	}

	public function findVendegByEmail($email) {
        $filter = new \mkwhelpers\FilterDescriptor();
        $filter
            ->addFilter('email', '=', $email)
            ->addFilter('vendeg', '=', true);
		return $this->getAll($filter, array());
	}

	public function findByIdSessionid($id, $sessionid) {
        $filter = new \mkwhelpers\FilterDescriptor();
        $filter
            ->addFilter('id', '=', $id)
            ->addFilter('sessionid', '=', $sessionid);
		return $this->getAll($filter, array());
	}

    public function findNemVendegByEmail($email) {
        $filter = new \mkwhelpers\FilterDescriptor();
        $filter
            ->addFilter('email', '=', $email)
            ->addFilter('vendeg', '=', false);
		return $this->getAll($filter, array());
    }

    public function checkloggedin() {
        if (isset(\mkw\store::getMainSession()->pk)) {
            $users = $this->findByIdSessionid(\mkw\store::getMainSession()->pk, \Zend_Session::getId());
            return count($users) == 1;
        }
        return false;
    }

    public function getLoggedInUser() {
        if ($this->checkloggedin()) {
            return $this->find(\mkw\store::getMainSession()->pk);
        }
        return null;
    }

	public function checkloggedinUKPartner() {
		if (isset(\mkw\store::getMainSession()->ukpartner)) {
			$users = $this->findByIdSessionid(\mkw\store::getMainSession()->ukpartner, \Zend_Session::getId());
			return count($users) == 1;
		}
		return false;
	}

	public function getLoggedInUKPartner() {
		if ($this->checkloggedinUKPartner()) {
			return $this->find(\mkw\store::getMainSession()->ukpartner);
		}
		return null;
	}

	public function checkAnonym($partnerid) {
        $res = 0;
        $partner = $this->find($partnerid);
        if ($partner) {
            $filter = new \mkwhelpers\FilterDescriptor();
            $filter->addFilter('bizonylattipus_id', null, array('szamla', 'esetiszamla'));
            $filter->addFilter('partner_id', '=', $partnerid);
            switch (\mkw\store::getParameter(\mkw\consts::SzamlaOrzesAlap, 1)) {
                case 1:
                    $maxdatum = $this->getRepo('\Entities\Bizonylatfej')->getMaxSzamlaDatum('kelt', $filter);
                    break;
                case 2:
                    $maxdatum = $this->getRepo('\Entities\Bizonylatfej')->getMaxSzamlaDatum('teljesites', $filter);
                    break;
            }
            if (is_array($maxdatum) && $maxdatum[0]['datum']) {
                $ev = date("Y", strtotime($maxdatum[0]['datum'])) + \mkw\store::getIntParameter(\mkw\consts::SzamlaOrzesEv, 7);
                $datum = $ev . '-12-31';
                $most = date('Y-m-d');
                if ($datum >= $most) {
                    $res = 0;
                }
                else {
                    $res = 1;
                }
            }
            else {
                $res = 1;
            }
        }
        return $res;
    }

    public function doAnonym($partnerid) {
	    $res = $this->checkAnonym($partnerid);
	    /** @var \Entities\Partner $partner */
        $partner = $this->find($partnerid);
        if ($partner) {
            if ($res) {
                $partner->doAnonym();
                $partner->setAnonym(true);
                $partner->setAnonymdatum(date(\mkw\store::$SQLDateFormat));
                $this->_em->persist($partner);
                $this->_em->flush();
                /** @var \Entities\Bizonylatfej $bf */
                foreach ($partner->getBizonylatfejek() as $bf) {
                    $bf->setSimpleedit(true);
                    $bf->setPartnerLeiroadat($partner);
                    $this->_em->persist($bf);
                    $this->_em->flush();
                }
                /** @var \Entities\Bankbizonylatfej $bbf */
                foreach ($partner->getBankbizonylatfejek() as $bbf) {
                    $bbf->setPartnerLeiroadat($partner);
                    $this->_em->persist($bbf);
                    $this->_em->flush();
                }
                /** @var \Entities\Penztarbizonylatfej $pbf */
                foreach ($partner->getPenztarbizonylatfejek() as $pbf) {
                    $pbf->setPartnerLeiroadat($partner);
                    $this->_em->persist($pbf);
                    $this->_em->flush();
                }
                /** @var \Entities\Bankbizonylattetel $bbt */
                foreach ($partner->getBankbizonylattetelek() as $bbt) {
                    $bbt->setPartnerLeiroadat($partner);
                    $this->_em->persist($bbt);
                    $this->_em->flush();
                }
            }
            else {
                $partner->clearGDPRData();
                $partner->setAnonymizalnikell(true);
                $partner->setAnonymkeresdatum(date(\mkw\store::$SQLDateFormat));
                $this->_em->persist($partner);
                $this->_em->flush();
            }
        }
    }
}