<?php
/**
 *
 * @author pG
 *
 */

namespace Mailchimp\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mailchimp\Client\MailChimp;

class MailChimpClientFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['mailchimp'])) {
            throw new \RuntimeException(
                'No config was found for MailchimpModule. Did you copy the `mailchimp.local.php` file to your autoload folder?'
            );
        }

        return new MailChimp($config['mailchimp']);
    }
}
