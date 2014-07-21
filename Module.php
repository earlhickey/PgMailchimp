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

    /**
     * Create controller plugin mailchimp
     * Use in controller as $this->mailchimp()->functionName($data);
     */
    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'mailchimp' => function ($sm) {
                    $plugin = new Controller\Plugin\Mailchimp;
                    $plugin->setService($sm->getServiceLocator()->get('PgMailchimp\Client\Mailchimp'));
                    return $plugin;
                },
            ),
        );
    }

}
