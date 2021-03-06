<?php

namespace Controllers;

class KivetfejController extends bizonylatfejController {

    public function __construct($params) {
        $this->biztipus = 'kivet';
        $this->setPageTitle('Kivét');
        $this->setPluralPageTitle('Kivétek');
        parent::__construct($params);
    }

    public function onGetKarb($view, $record, $egyed, $oper, $id) {
        $source = $this->params->getStringRequestParam('source', '');
        if ($oper == 'inherit') {
            $egyed['id'] = \mkw\store::createUID();
            $egyed['parentid'] = $id;
            $kelt = date(\mkw\store::$DateFormat);
            $egyed['keltstr'] = $kelt;
            $egyed['teljesitesstr'] = $kelt;
            $egyed['esedekessegstr'] = \mkw\store::calcEsedekesseg($kelt, $record->getFizmod(), $record->getPartner());
            $egyed['reportfile'] = '';
            $view->setVar('reportfilelist', $this->getRepo()->getReportfileSelectList('', $this->biztipus));
            switch ($source) {
                case 'megrendeles':
                    $egyed['megjegyzes'] = \mkw\store::translate('Rendelés szám', $record->getBizonylatnyelv()) . ': ' . $id;
                    break;
                case 'szallito':
                    $egyed['megjegyzes'] = \mkw\store::translate('Szállítólevél szám', $record->getBizonylatnyelv()) . ': ' . $id;
                    break;
            }
            $ttk = array();
            $cikl = 1;
            foreach($egyed['tetelek'] as $tetel) {
                $tetel['parentid'] = $tetel['id'];
                $tetel['id'] = \mkw\store::createUID($cikl);
                $tetel['oper'] = 'inherit';
                $ttk[] = $tetel;
                $cikl++;
            }
            $egyed['tetelek'] = $ttk;
        }
        return $egyed;
    }

}

