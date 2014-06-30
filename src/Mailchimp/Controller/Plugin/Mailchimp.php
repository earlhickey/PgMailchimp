<?php

namespace Mailchimp\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Mailchimp\Client\Mailchimp as MailchimpClient;

/**
 * 
 * Mailchimp Controller Plugin
 * 
 * @author pG
 * @package Mailchimp
 * @since 2014-06-30
 *
 */
class Mailchimp extends AbstractPlugin
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

    public function setService(MailchimpClient $service)
    {
        $this->service = $service;
        return $this;
    }
}
