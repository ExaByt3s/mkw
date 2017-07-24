<?php

namespace Controllers;

class rendezvenyController extends \mkwhelpers\MattableController {

    public function __construct($params) {
        $this->setEntityName('Entities\Rendezveny');
        $this->setKarbFormTplName('rendezvenykarbform.tpl');
        $this->setKarbTplName('rendezvenykarb.tpl');
        $this->setListBodyRowTplName('rendezvenylista_tbody_tr.tpl');
        $this->setListBodyRowVarName('_egyed');
        parent::__construct($params);
    }

    protected function loadVars($t) {
        $x = array();
        if (!$t) {
            $t = new \Entities\Rendezveny();
            $this->getEm()->detach($t);
        }
        $x['id'] = $t->getId();
        $x['nev'] = $t->getNev();
        $x['termeknev'] = $t->getTermekNev();
        $x['tanarnev'] = $t->getTanarNev();
        $x['kezdodatum'] = $t->getKezdodatumStr();
        return $x;
    }

    protected function setFields($obj, $oper) {
        $obj->setNev($this->params->getStringRequestParam('nev'));
        $obj->setKezdodatum($this->params->getStringRequestParam('kezdodatum'));
        $ck = \mkw\store::getEm()->getRepository('Entities\Termek')->find($this->params->getIntRequestParam('termek', 0));
        if ($ck) {
            $obj->setTermek($ck);
        }
        $ck = \mkw\store::getEm()->getRepository('Entities\Dolgozo')->find($this->params->getIntRequestParam('tanar', 0));
        if ($ck) {
            $obj->setTanar($ck);
        }
        return $obj;
    }

    public function getlistbody() {
        $view = $this->createView('rendezvenylista_tbody.tpl');

        $filterarr = new \mkwhelpers\FilterDescriptor();
        if (!is_null($this->params->getRequestParam('nevfilter', NULL))) {
            $filterarr->addFilter('nev', 'LIKE', '%' . $this->params->getStringRequestParam('nevfilter') . '%');
        }

        $this->initPager($this->getRepo()->getCount($filterarr));

        $egyedek = $this->getRepo()->getWithJoins(
            $filterarr, $this->getOrderArray(), $this->getPager()->getOffset(), $this->getPager()->getElemPerPage());

        echo json_encode($this->loadDataToView($egyedek, 'egyedlista', $view));
    }

    public function getSelectList($selid = null) {
        $rec = $this->getRepo()->getAll(array(), array('nev' => 'ASC', 'kezdodatum' => 'DESC'));
        $res = array();
        /** @var \Entities\Rendezveny $sor */
        foreach ($rec as $sor) {
            $res[] = array('id' => $sor->getId(), 'caption' => $sor->getTeljesNev(), 'selected' => ($sor->getId() == $selid));
        }
        return $res;
    }

    public function viewselect() {
        $view = $this->createView('rendezvenylista.tpl');

        $view->setVar('pagetitle', t('Rendezvények'));
        $view->printTemplateResult(false);
    }

    public function viewlist() {
        $view = $this->createView('rendezvenylista.tpl');

        $view->setVar('pagetitle', t('Rendezvények'));
        $view->setVar('orderselect', $this->getRepo()->getOrdersForTpl());
        $view->setVar('batchesselect', $this->getRepo()->getBatchesForTpl());
        $dcs = new dolgozoController($this->params);
        $view->setVar('tanarlist', $dcs->getSelectList());
        $termek = new termekController($this->params);
        $view->setVar('termeklist', $termek->getSelectList(null));
        $view->printTemplateResult(false);
    }

    protected function _getkarb($tplname) {
        $id = $this->params->getRequestParam('id', 0);
        $oper = $this->params->getRequestParam('oper', '');
        $view = $this->createView($tplname);

        $view->setVar('pagetitle', t('Rendezvény'));
        $view->setVar('formaction', '/admin/rendezveny/save');
        $view->setVar('oper', $oper);
        $record = $this->getRepo()->findWithJoins($id);
        $view->setVar('egyed', $this->loadVars($record));
        $tanar = new dolgozoController($this->params);
        $view->setVar('tanarlist', $tanar->getSelectList(($record ? $record->getTanarId() : 0)));
        $termek = new termekController($this->params);
        $view->setVar('termeklist', $termek->getSelectList(($record ? $record->getTermekId() : 0)));

        return $view->getTemplateResult();
    }

}