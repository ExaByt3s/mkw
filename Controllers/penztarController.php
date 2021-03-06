<?php

namespace Controllers;

use mkw\store;

class penztarController extends \mkwhelpers\JQGridController {

    public function __construct($params) {
        $this->setEntityName('Entities\Penztar');
        parent::__construct($params);
    }

    protected function loadCells($sor) {
        $valuta = $sor->getValutanem();
        return array($sor->getNev(), (isset($valuta) ? $valuta->getNev() : ''));
    }

    protected function setFields($obj) {
        $obj->setNev($this->params->getStringRequestParam('nev'));
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
            if (!is_null($this->params->getRequestParam('nev', NULL))) {
                $filter->addFilter('nev', 'LIKE', '%' . $this->params->getStringRequestParam('nev') . '%');
            }
            if (!is_null($this->getParam('valutanem', NULL))) {
                $filter->addFilter('v.nev', 'LIKE', '%' . $this->params->getStringRequestParam('valutanem') . '%');
            }
        }
        $rec = $this->getRepo()->getAll($filter, $this->getOrderArray());
        echo json_encode($this->loadDataToView($rec));
    }

    public function getSelectList($selid = null) {
        $rec = $this->getRepo()->getAll(array(), array('nev' => 'ASC'));
        $res = array();
        /** @var \Entities\Penztar $sor */
        foreach ($rec as $sor) {
            $res[] = array('id' => $sor->getId(), 'caption' => $sor->getNev(), 'selected' => ($sor->getId() == $selid), 'valutanem' => $sor->getValutanemId());
        }
        return $res;
    }

    public function htmllist() {
        $rec = $this->getRepo()->getAll(array(), array('nev' => 'ASC'));
        $ret = '<select>';
        foreach ($rec as $sor) {
            $ret .= '<option value="' . $sor->getId() . '">' . $sor->getNev() . '</option>';
        }
        $ret .= '</select>';
        echo $ret;
    }

}
