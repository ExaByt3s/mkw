<?php

namespace Controllers;

use mkw\store;

class bankszamlaController extends \mkwhelpers\JQGridController {

    public function __construct($params) {
        $this->setEntityName('Entities\Bankszamla');
        parent::__construct($params);
    }

    protected function loadCells($sor) {
        $valuta = $sor->getValutanem();
        return array($sor->getBanknev(), $sor->getBankcim(),
            $sor->getSzamlaszam(), $sor->getSwift(), $sor->getIban(),
            (isset($valuta) ? $valuta->getNev() : ''));
    }

    protected function setFields($obj) {
        $obj->setBanknev($this->params->getStringRequestParam('banknev'));
        $obj->setBankcim($this->params->getStringRequestParam('bankcim'));
        $obj->setSzamlaszam($this->params->getStringRequestParam('szamlaszam'));
        $obj->setSwift($this->params->getStringRequestParam('swift'));
        $obj->setIban($this->params->getStringRequestParam('iban'));
        $valutanem = $this->getRepo('Entities\Valutanem')->find($this->params->getIntRequestParam('valutanem', 0));
        if ($valutanem) {
            $obj->setValutanem($valutanem);
        }
        else {
            $obj->setValutanem(null);
        }
        return $obj;
    }

    public function jsonlist() {
        $filter = new \mkwhelpers\FilterDescriptor();
        if ($this->params->getBoolRequestParam('_search', false)) {
            if (!is_null($this->params->getRequestParam('banknev', NULL))) {
                $filter->addFilter('banknev', 'LIKE', '%' . $this->params->getStringRequestParam('banknev') . '%');
            }
            if (!is_null($this->getParam('bankcim', NULL))) {
                $filter->addFilter('bankcim', 'LIKE', '%' . $this->params->getStringRequestParam('bankcim') . '%');
            }
            if (!is_null($this->getParam('szamlaszam', NULL))) {
                $filter->addFilter('szamlaszam', 'LIKE', '%' . $this->params->getStringRequestParam('szamlaszam') . '%');
            }
            if (!is_null($this->getParam('swift', NULL))) {
                $filter->addFilter('swift', 'LIKE', '%' . $this->params->getStringRequestParam('swift') . '%');
            }
            if (!is_null($this->getParam('iban', NULL))) {
                $filter->addFilter('iban', 'LIKE', '%' . $this->params->getStringRequestParam('iban') . '%');
            }
            if (!is_null($this->getParam('valutanem', NULL))) {
                $filter->addFilter('v.nev', 'LIKE', '%' . $this->params->getStringRequestParam('valutanem') . '%');
            }
        }
        $rec = $this->getRepo()->getAll($filter, $this->getOrderArray());
        echo json_encode($this->loadDataToView($rec));
    }

    public function getSelectList($selid = null) {
        $rec = $this->getRepo()->getAll(array(), array('szamlaszam' => 'ASC'));
        $res = array();
        foreach ($rec as $sor) {
            $res[] = array('id' => $sor->getId(), 'caption' => $sor->getSzamlaszam(), 'selected' => ($sor->getId() == $selid));
        }
        return $res;
    }

    public function htmllist() {
        $rec = $this->getRepo()->getAll(array(), array('szamlaszam' => 'ASC'));
        $ret = '<select>';
        foreach ($rec as $sor) {
            $ret .= '<option value="' . $sor->getId() . '">' . $sor->getSzamlaszam() . '</option>';
        }
        $ret .= '</select>';
        echo $ret;
    }

}
