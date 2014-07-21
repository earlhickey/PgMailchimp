<?php

namespace PgMailchimp\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PgMailchimp\Client\Mailchimp;

class MailchimpClientFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['mailchimp'])) {
            throw new \RuntimeException(
                'No config was found for PgMailchimp Module. Did you copy the `pg-mailchimp.local.php` file to your autoload folder?'
            );
        }

        return new Mailchimp($config['mailchimp']);
    }
}
