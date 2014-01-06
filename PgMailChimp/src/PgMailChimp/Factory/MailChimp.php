<?php
/**
 *
 * @author pG
 *
 */

namespace PgMailChimp\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use MailChimp\Client\MailChimp;

class MailChimpClientFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['zfr_mailchimp'])) {
            throw new Exception\RuntimeException(
                'No config was found for ZfrMailChimpModule. Did you copy the `mailchimp.local.php` file to your autoload folder?'
            );
        }

        return new MailChimp($config['zfr_mailchimp']['key']);
    }
}