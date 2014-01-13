<?php
/*
 *
 */

namespace PgMailchimp;

use Zend\ModuleManager\Feature;

class Module implements Feature\AutoloaderProviderInterface, Feature\ConfigProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            /*'invokables' => array(
                'Radioveronica\Service\Contestant' => 'Radioveronica\Service\Contestant',
                'Radioveronica\Service\SmsUser' => 'Radioveronica\Service\SmsUser',
            ),
            'factories' => array(
                'SRG\Service\MailChimp' => function ($sm) {
                    $service = new \SRG\Service\MailChimp(\SRG\Service\MailChimp::RADIOVERONICA);
                    return $service;
                },
            ),*/
        );
    }

}
