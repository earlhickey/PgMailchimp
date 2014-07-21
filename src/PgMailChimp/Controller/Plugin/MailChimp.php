<?php

namespace PgMailChimp\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use PgMailChimp\Client\MailChimp as MailChimpClient;

/**
 * 
 * MailChimp Controller Plugin
 * 
 * @author pG
 * @package MailChimp
 * @since 2014-06-30
 *
 */
class MailChimp extends AbstractPlugin
{
    protected $service;

    public function subscribe($recipient)
    {
        return $this->getService()->subscribe($recipient);
    }

    public function unsubscribe($recipient)
    {
        return $this->getService()->unsubscribe($recipient);
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService(MailChimpClient $service)
    {
        $this->service = $service;
        return $this;
    }
}
