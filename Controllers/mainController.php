<?php

namespace Controllers;

class mainController extends \mkwhelpers\Controller {

	private $view;

	protected function createTermekfaParams() {
		return array(
			'elemperpage' => $this->params->getIntRequestParam('elemperpage', 20),
			'pageno' => $this->params->getIntRequestParam('pageno', 1),
			'order' => $this->params->getStringRequestParam('order', 'ardesc'),
			'filter' => $this->params->getStringRequestParam('filter', ''),
			'klikkeltcimkekatid' => $this->params->getIntRequestParam('cimkekatid'),
			'arfilter' => $this->params->getStringRequestParam('arfilter', ''),
			'keresett' => $this->params->getStringRequestParam('keresett', ''),
			'vt' => $this->params->getIntRequestParam('vt', 1)
		);
	}

	public function show404($head = null) {
		$this->view = $this->getTemplateFactory()->createMainView('404.tpl');
        \mkw\store::fillTemplate($this->view);
		$tc = new termekController($this->params);
		$this->view->setVar('ajanlotttermekek', $tc->getAjanlottLista());
		$this->view->setVar('seodescription', t('Sajnos nem találjuk.'));
		$this->view->setVar('pagetitle', t('Sajnos nem találjuk.'));
        if ($head) {
            header($head);
        }
		$this->view->printTemplateResult(false);
	}

	public function view() {
		$this->view = $this->getTemplateFactory()->createMainView('main.tpl');
        \mkw\store::fillTemplate($this->view);
		$hc = new hirController($this->params);
		$tc = new termekController($this->params);
		$khc = new korhintaController($this->params);
		$tfc = new termekfaController($this->params);
        $tcc = new termekcimkeController($this->params);
		$this->view->setVar('pagetitle', \mkw\store::getParameter(\mkw\consts::Oldalcim));
		$this->view->setVar('seodescription', \mkw\store::getParameter(\mkw\consts::Seodescription));
        if (\mkw\store::getTheme() == 'mkwcansas') {
            $this->view->setVar('hirek', $hc->gethirlist());
            $this->view->setVar('ajanlotttermekek', $tc->getAjanlottLista());
            $this->view->setVar('legnepszerubbtermekek', $tc->getLegnepszerubbLista(\mkw\store::getParameter(\mkw\consts::Fooldalnepszerutermekdb, 5)));
            $this->view->setVar('legujabbtermekek', $tc->getLegujabbLista());
            $this->view->setVar('korhintalista', $khc->getLista());
            $this->view->setVar('topkategorialista', $tfc->getformenu(\mkw\store::getSetupValue('topkategoriamenunum'), 0));
            $this->view->setVar('kiemeltmarkalista', $tcc->getKiemeltList());
        }
		$this->view->printTemplateResult(true);
	}

	public function termekfa() {
		$com = $this->params->getStringParam('slug');
		$tf = new termekfaController($this->params);
		$ag = $tf->getRepo()->findOneBySlug($com);
		if ($ag && !$ag->getInaktiv()) {
			if (count($ag->getChildren()) > 0) {
				$this->view = $this->getTemplateFactory()->createMainView('katlista.tpl');
				$t = $tf->getkatlista($ag);
			}
			else {
				$this->view = $this->getTemplateFactory()->createMainView('termeklista.tpl');
				$t = $tf->gettermeklistaforparent($ag, 'termekfa');
			}
			foreach ($t as $k => $v) {
				$this->view->setVar($k, $v);
			}
            \mkw\store::fillTemplate($this->view);
			$this->view->setVar('pagetitle', $ag->getShowOldalcim());
			$this->view->setVar('seodescription', $ag->getShowSeodescription());
			$this->view->printTemplateResult(true);
		}
		else {
            \mkw\store::redirectTo404($com, $this->params);
		}
	}

	public function marka() {
		$com = $this->params->getStringParam('slug');
		$tf = new termekfaController($this->params);
		$tc = new termekcimkeController($this->params);
		$c = $tc->getRepo()->findOneBySlug($com);
		if ($c) {
            $this->view = $this->getTemplateFactory()->createMainView('termeklista.tpl');
            $t = $tf->gettermeklistaforparent(null, 'marka');
            foreach ($t as $k => $v) {
                $this->view->setVar($k, $v);
            }
            \mkw\store::fillTemplate($this->view);

            $mpt = \mkw\store::getParameter(\mkw\consts::Markaoldalcim);
            if ($mpt) {
                $mpt = str_replace('[markanev]', $c->getNev(), $mpt);
                $mpt = str_replace('[global]', \mkw\store::getParameter(\mkw\consts::Oldalcim), $mpt);
            }
            else {
                $mpt = \mkw\store::getParameter(\mkw\consts::Oldalcim);
            }
            $this->view->setVar('pagetitle', $mpt);

            $msd = \mkw\store::getParameter(\mkw\consts::Markaseodescription);
            if ($msd) {
                $msd = str_replace('[markanev]', $c->getNev(), $msd);
                $msd = str_replace('[global]', \mkw\store::getParameter(\mkw\consts::Seodescription), $msd);
            }
            else {
                $msd = \mkw\store::getParameter(\mkw\consts::Seodescription);
            }
            $this->view->setVar('seodescription', $msd);

            $this->view->printTemplateResult(true);
        }
        else {
            \mkw\store::redirectTo404($com, $this->params);
        }
    }

    public function szuro() {
		$tf = new termekfaController($this->params);
        $this->view = $this->getTemplateFactory()->createMainView('termeklista.tpl');
        $t = $tf->gettermeklistaforparent(null, 'szuro');
        foreach ($t as $k => $v) {
            $this->view->setVar($k, $v);
        }
        \mkw\store::fillTemplate($this->view);
        $this->view->printTemplateResult(true);
    }

	public function kereses() {
		$term = trim($this->params->getStringRequestParam('term'));
		if ($term) {
			$r = \mkw\store::getEm()->getRepository('\Entities\Termek');
			$res = $r->getNevek($term);
			echo json_encode($res);
		}
		else {
			$keresoszo = trim($this->params->getStringRequestParam('keresett'));
			if ($keresoszo != '') {
				$log = new \Entities\Keresoszolog($keresoszo);
                \mkw\store::getEm()->persist($log);
                \mkw\store::getEm()->flush();

				$tf = new termekfaController($this->params);
				$t = $tf->gettermeklistaforparent(null, 'kereses');

                $this->view = $this->getTemplateFactory()->createMainView('termeklista.tpl');
                foreach ($t as $k => $v) {
                    $this->view->setVar($k, $v);
                }
                \mkw\store::fillTemplate($this->view);
				$this->view->setVar('seodescription', t('A keresett kifejezés: ') . $keresoszo);
				$this->view->setVar('pagetitle', t('A keresett kifejezés: ') . $keresoszo);
				$this->view->printTemplateResult(true);
			}
			else {
				$this->view = $this->getTemplateFactory()->createMainView('nincstalalat.tpl');
				$tc = new termekController($this->params);
				$this->view->setVar('ajanlotttermekek', $tc->getAjanlottLista());
                \mkw\store::fillTemplate($this->view);
				$this->view->setVar('seodescription', t('Keressen valamit.'));
				$this->view->setVar('pagetitle', t('Keressen valamit.'));
				$this->view->printTemplateResult(true);
			}
		}
	}

	public function termek() {
        switch (\mkw\store::getTheme()) {
            case 'mkwcansas':
                $com = $this->params->getStringParam('slug');
                $tc = new termekController($this->params);
                $termek = $tc->getRepo()->findOneBySlug($com);
                if ($termek && !$termek->getInaktiv() && $termek->getLathato() && !$termek->getFuggoben()) {
                    $this->view = $this->getTemplateFactory()->createMainView('termeklap.tpl');
                    \mkw\store::fillTemplate($this->view);
                    $this->view->setVar('pagetitle', $termek->getShowOldalcim());
                    $this->view->setVar('seodescription', $termek->getShowSeodescription());
                    $this->view->setVar('legnepszerubbtermekek', $tc->getLegnepszerubbLista(\mkw\store::getParameter(\mkw\consts::Termeklapnepszerutermekdb, 5)));
                    $this->view->setVar('hozzavasarolttermekek', $tc->getHozzavasaroltLista($termek));
                    $t = $tc->getTermekLap($termek);
                    foreach ($t as $k => $v) {
                        $this->view->setVar($k, $v);
                    }
                    $this->view->printTemplateResult(true);
                }
                else {
                    \mkw\store::redirectTo404($com, $this->params);
                }
                break;
            case 'superzone':
                $com = $this->params->getStringParam('slug');
                $tc = new termekController($this->params);
                $termek = $tc->getRepo()->findOneBySlug($com);
                if ($termek && !$termek->getInaktiv() && $termek->getLathato() && !$termek->getFuggoben()) {
                    $this->view = $this->getTemplateFactory()->createMainView('termeklapszin.tpl');
                    \mkw\store::fillTemplate($this->view);
                    $this->view->setVar('pagetitle', $termek->getShowOldalcim());
                    $this->view->setVar('seodescription', $termek->getShowSeodescription());
                    $t = array();
                    $vtt = array();
                    $t['caption'] = $termek->getNev();
                    $t['cikkszam'] = $termek->getCikkszam();
                    $valtozatok = $termek->getValtozatok();
                    $ma = new \DateTime();
                    foreach ($valtozatok as $valt) {
                        if ($valt->getElerheto() && $valt->getLathato()) {
                            if ($valt->getAdatTipus1Id() == \mkw\store::getParameter(\mkw\consts::ValtozatTipusSzin)) {
                                $vtt[$valt->getErtek1()]['id'] = $valt->getErtek1();
                                $vtt[$valt->getErtek1()]['caption'] = $valt->getErtek1();
                                $vtt[$valt->getErtek1()]['kepurlmini'] = $valt->getKepurlMini();
                                $vtt[$valt->getErtek1()]['kepurlsmall'] = $valt->getKepurlSmall();
                                $vtt[$valt->getErtek1()]['kepurlmedium'] = $valt->getKepurlMedium();
                                $vtt[$valt->getErtek1()]['kepurllarge'] = $valt->getKepurlLarge();
                                $vtt[$valt->getErtek1()]['keszlet'] += $valt->getKeszlet() - $valt->getFoglaltMennyiseg();
                                $vtt[$valt->getErtek1()]['bejon'] = $vtt[$valt->getErtek1()]['bejon'] || (($valt->getBeerkezesdatumStr()) && ($valt->getBeerkezesdatum() >= $ma) ? true : false);
                                $vtt[$valt->getErtek1()]['link'] = \mkw\store::getRouter()->generate('showtermekm', false, array('slug' => $com), array('szin' => urlencode($valt->getErtek1())));
                            }
                            if ($valt->getAdatTipus2Id() == \mkw\store::getParameter(\mkw\consts::ValtozatTipusSzin)) {
                                $vtt[$valt->getErtek2()]['id'] = $valt->getErtek2();
                                $vtt[$valt->getErtek2()]['caption'] = $valt->getErtek2();
                                $vtt[$valt->getErtek2()]['kepurlmini'] = $valt->getKepurlMini();
                                $vtt[$valt->getErtek2()]['kepurlsmall'] = $valt->getKepurlSmall();
                                $vtt[$valt->getErtek2()]['kepurlmedium'] = $valt->getKepurlMedium();
                                $vtt[$valt->getErtek2()]['kepurllarge'] = $valt->getKepurlLarge();
                                $vtt[$valt->getErtek2()]['keszlet'] += $valt->getKeszlet() - $valt->getFoglaltMennyiseg();
                                $vtt[$valt->getErtek2()]['bejon'] = $vtt[$valt->getErtek2()]['bejon'] || (($valt->getBeerkezesdatumStr()) && ($valt->getBeerkezesdatum() >= $ma) ? true : false);
                                $vtt[$valt->getErtek2()]['link'] = \mkw\store::getRouter()->generate('showtermekm', false, array('slug' => $com), array('szin' => urlencode($valt->getErtek2())));
                            }
                        }
                    }
                    $t['valtozatok'] = $vtt;
                    $this->view->setVar('termek', $t);
                    $this->view->printTemplateResult(true);
                }
                else {
                    \mkw\store::redirectTo404($com, $this->params);
                }
                break;
        }
	}

    // superzone színhez tartozó méretek
    public function termekm() {
        $com = $this->params->getStringParam('slug');
        $szin = $this->params->getStringRequestParam('szin');
        $tc = new termekController($this->params);
        /** @var \Entities\Termek $termek */
        $termek = $tc->getRepo()->findOneBySlug($com);
        if ($termek && !$termek->getInaktiv() && $termek->getLathato() && !$termek->getFuggoben()) {
            $this->view = $this->getTemplateFactory()->createMainView('termeklapmeret.tpl');
            \mkw\store::fillTemplate($this->view);
            $this->view->setVar('pagetitle', $termek->getShowOldalcim());
            $this->view->setVar('seodescription', $termek->getShowSeodescription());
            $t = array();
            $vtt = array();
            $t['id'] = $termek->getId();
            $t['caption'] = $termek->getNev();
            $t['cikkszam'] = $termek->getCikkszam();
            $t['leiras'] = $termek->getLeiras();
            $t['szin'] = $szin;
            $partner = \mkw\store::getLoggedInUser();
            $valutanem = $termek->getArValutanem(null, $partner);
            if ($valutanem) {
                $t['valutanemnev'] = $valutanem->getNev();
            }
            else {
                $t['valutanemnev'] = 'X';
            }
            if ($partner && $partner->getSzamlatipus()) {
                $t['ar'] = $termek->getNettoAr(null, $partner);
                $t['eredetiar'] = $termek->getKedvezmenynelkuliNettoAr(null, $partner, $valutanem);
            }
            else {
                $t['ar'] = $termek->getBruttoAr(null, $partner);
                $t['eredetiar'] = $termek->getKedvezmenynelkuliBruttoAr(null, $partner, $valutanem);
            }
            $t['kedvezmeny'] = $termek->getTermekcsoportKedvezmeny($partner);
            $valtozatok = $termek->getValtozatok();
            $ma = new \DateTime();
            foreach ($valtozatok as $valt) {
                if ($valt->getElerheto() && $valt->getLathato()) {
                    if (($valt->getAdatTipus1Id() == \mkw\store::getParameter(\mkw\consts::ValtozatTipusSzin)) && ($valt->getErtek1() == $szin)) {
                        $t['kepurlmedium'] = $valt->getKepurlMedium();
                        $vtt[] = array(
                            'id' => $valt->getId(),
                            'caption' => $valt->getErtek2(),
                            'keszlet' => $valt->getKeszlet() - $valt->getFoglaltMennyiseg(),
                            'beerkezesdatumstr' => $valt->getBeerkezesdatumStr(),
                            'bejon' => (($valt->getKeszlet() - $valt->getFoglaltMennyiseg() <= 0) && ($valt->getBeerkezesdatumStr()) && ($valt->getBeerkezesdatum() >= $ma) ? true : false)
                        );
                    }
                    if (($valt->getAdatTipus2Id() == \mkw\store::getParameter(\mkw\consts::ValtozatTipusSzin)) && ($valt->getErtek2() == $szin)) {
                        $vtt[] = array(
                            'id' => $valt->getId(),
                            'caption' => $valt->getErtek1(),
                            'keszlet' => $valt->getKeszlet() - $valt->getFoglaltMennyiseg(),
                            'beerkezesdatumstr' => $valt->getBeerkezesdatumStr(),
                            'bejon' => (($valt->getKeszlet() - $valt->getFoglaltMennyiseg() <= 0) && ($valt->getBeerkezesdatumStr()) && ($valt->getBeerkezesdatum() >= $ma) ? true : false)
                        );
                    }
                }
            }
            $t['valtozatok'] = $vtt;
            $this->view->setVar('termek', $t);
            $this->view->printTemplateResult(true);
        }
        else {
            \mkw\store::redirectTo404($com, $this->params);
        }
    }

	public function valtozatar() {
		$termekid = $this->params->getIntRequestParam('t');
		$valtozatid = $this->params->getIntRequestParam('vid');
		$termek = \mkw\store::getEm()->getRepository('Entities\Termek')->find($termekid);
		$valtozat = \mkw\store::getEm()->getRepository('Entities\TermekValtozat')->find($valtozatid);
		$ret = array();
		$ret['price'] = number_format($termek->getBruttoAr($valtozat, \mkw\store::getLoggedInUser()), 0, ',', ' ') . ' Ft';
        $ret['kepurlmedium'] = $valtozat->getKepurlMedium();
        $ret['kepurllarge'] = $valtozat->getKepurlLarge();
        $ret['kepurlsmall'] = $valtozat->getKepurlSmall();

        $ret['kepek'] = \mkw\store::getEm()->getRepository('Entities\Termek')->getKepekKiveve($termek, $valtozat);

		echo json_encode($ret);
	}

	public function valtozat() {
		$termekkod = $this->params->getIntRequestParam('t');
		$tipusid = $this->params->getIntRequestParam('ti');
		$valtozatertek = $this->params->getRequestParam('v');
		$masiktipusid = $this->params->getIntRequestParam('mti');
		$masikselected = $this->params->getRequestParam('sel');
		$ret = array();

		$termek = \mkw\store::getEm()->getRepository('Entities\Termek')->find($termekkod);

		if ($masiktipusid) {
			$t = array($tipusid, $masiktipusid);
			$e = array($valtozatertek, $masikselected);
		}
		else {
			$t = array($tipusid);
			$e = array($valtozatertek);
		}
		$termekvaltozat = \mkw\store::getEm()->getRepository('Entities\TermekValtozat')->getByProperties($termek->getId(), $t, $e);
        $ret['price'] = number_format($termek->getBruttoAr($termekvaltozat, \mkw\store::getLoggedInUser()), 0, ',', ' ') . ' Ft';
        if ($termekvaltozat) {
            $ret['kepurlmedium'] = $termekvaltozat->getKepurlMedium();
            $ret['kepurllarge'] = $termekvaltozat->getKepurlLarge();
            $ret['kepurlsmall'] = $termekvaltozat->getKepurlSmall();
        }
        $ret['kepek'] = \mkw\store::getEm()->getRepository('Entities\Termek')->getKepekKiveve($termek, $termekvaltozat);

		$valtozatok = $termek->getValtozatok();
		foreach ($valtozatok as $valtozat) {
			if ($valtozat->getElerheto()) {
				if ($valtozat->getAdatTipus1Id() == $tipusid && ($valtozat->getErtek1() == $valtozatertek || !$valtozatertek)) {
					$ret['adat'][$valtozat->getErtek2()] = array('value' => $valtozat->getErtek2(), 'sel' => $masikselected == $valtozat->getErtek2());
				}
				elseif ($valtozat->getAdatTipus2Id() == $tipusid && ($valtozat->getErtek2() == $valtozatertek || !$valtozatertek)) {
					$ret['adat'][$valtozat->getErtek1()] = array('value' => $valtozat->getErtek1(), 'sel' => $masikselected == $valtozat->getErtek1());
				}
			}
		}
		echo json_encode($ret);
	}

	public function kapcsolat() {
		$com = $this->params->getStringParam('todo');
		switch ($com) {
			case 'ment':
				$hibas = false;
				$hibak = array();
				$nev = $this->params->getStringRequestParam('nev');
				$email1 = $this->params->getStringRequestParam('email1');
				$email2 = $this->params->getStringRequestParam('email2');
				$telefon = $this->params->getStringRequestParam('telefon');
				$rendelesszam = $this->params->getStringRequestParam('rendelesszam');
                $tema = \mkw\store::getEm()->getRepository('Entities\Kapcsolatfelveteltema')->find($this->params->getStringRequestParam('tema'));
                if ($tema) {
                    $temanev = $tema->getNev();
                }
                else {
                    $temanev = 'Imseretlen';
                }
				$szoveg = $this->params->getStringRequestParam('szoveg');
				if (!\Zend_Validate::is($email1, 'EmailAddress') || !\Zend_Validate::is($email2, 'EmailAddress')) {
					$hibas = true;
					$hibak['email'] = t('Rossz az email');
				}
				if ($email1 !== $email2) {
					$hibas = true;
					$hibak['email'] = t('Nem egyezik a két emailcím');
				}
				if ($nev == '') {
					$hibas = true;
					$hibak['nev'] = t('Üres a név');
				}
				if ($tema == '') {
					$hibas = true;
					$hibak['tema'] = t('Nincs megadva téma');
				}
				if (!$hibas) {
                    $mailer = \mkw\store::getMailer();
                    $mailer->setTo('info@mindentkapni.hu');
                    $mailer->setSubject('Kapcsolatfelvétel, ' . $rendelesszam . ' ' . $nev);
                    $mailer->setMessage(
                        'Rendelésszám: ' . $rendelesszam . '<br>' .
                        'Név: ' . $nev . '<br>' .
                        'Email: ' . $email1 . '<br>' .
                        'Telefon: ' . $telefon . '<br>' .
                        'Téma: ' . $temanev . '<br>' .
                        'Szöveg: ' . $szoveg . '<br>'
                    );
                    $mailer->setReplyTo($email1);
                    $mailer->send();
					$view = $this->getTemplateFactory()->createMainView('kapcsolatkosz.tpl');
                    \mkw\store::fillTemplate($view);
				}
				else {
					$kftc = new kapcsolatfelveteltemaController($this->params);
					$view = $this->getTemplateFactory()->createMainView('kapcsolat.tpl');
					$view->setVar('nev', $nev);
					$view->setVar('email1', $email1);
					$view->setVar('email2', $email2);
					$view->setVar('telefon', $telefon);
					$view->setVar('rendelesszam', $rendelesszam);
					$view->setVar('temalista', $kftc->getSelectList($tema));
					$view->setVar('szoveg', $szoveg);
					$view->setVar('hibak', $hibak);
				}
				$view->printTemplateResult(false);
				break;
			default :
				$kftc = new kapcsolatfelveteltemaController($this->params);
				$this->view = $this->getTemplateFactory()->createMainView('kapcsolat.tpl');
                \mkw\store::fillTemplate($this->view);
                $this->view->setVar('pagetitle', 'Kapcsolatfelvétel a webáruház ügyfélszolgálatával - ' . \mkw\store::getParameter('oldalcim'));
				$this->view->setVar('temalista', $kftc->getSelectList(0));
				$this->view->printTemplateResult(true);
				break;
		}
	}

}