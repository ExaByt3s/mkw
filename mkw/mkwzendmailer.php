<?php
namespace mkw;

class mkwzendmailer {

    /*
		$ertesito=new Zend_Mail();
		$ertesito->setBodyHtml('Regisztráció érkezett.'.$pluszszoveg);
		$ertesito->setSubject('Regisztráció');
		$ertesito->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
		$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBRegisztracioErtesitesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
		foreach($cimek as $cim) {
			$ertesito->addTo($cim);
		}
		if (!siiker_store::getConfig()->developer) {
			$ertesito->send();
		}
    */


    private $mailer;
    private $to = array();
    private $subject;
    private $message;
    private $headers;
    private $replyto;

    public function setTo($to) {
        if ($to) {
            $this->to[] = $to;
        }
    }

    public function addTo($to) {
        $this->setTo($to);
    }

    public function getTo() {
        return $this->to;
    }

    public function setSubject($param) {
        $this->subject = $param;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setReplyTo($param) {
        $this->replyto = $param;
    }

    public function getReplyTo() {
        return $this->replyto;
    }

    public function send() {
        $this->mailer = new \Zend_Mail('UTF-8');
        $this->mailer->setBodyHtml($this->message);
        $this->mailer->setSubject($this->subject);
        $from = Store::getParameter(consts::EmailFrom);
        $fromdata = explode(';', $from);
        $this->mailer->setFrom($fromdata[0], $fromdata[1]);
        if (!$this->to) {
            $this->mailer->addTo(Store::getParameter(consts::EmailBcc));
        }
        else {
            foreach($this->to as $t) {
                $this->mailer->addTo($t);
            }
        }
        $bcc = Store::getParameter(consts::EmailBcc);
        $bccdata = explode(',', $bcc);
        foreach($bccdata as $_bcc) {
            $this->mailer->addBcc($_bcc);
        }
        if (!$this->replyto) {
            $this->mailer->setReplyTo(Store::getParameter(consts::EmailReplyTo));
        }
        else {
            $this->mailer->setReplyTo($this->replyto);
        }
        $this->mailer->send();
    }
}
