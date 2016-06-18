<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Common;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            '\Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ),
            ),
        );
    }
    /**
     * The onBootstrap() method is called when ModuleManager is bootstrapping the module
     *
     * Configure the listener, adding it to EventManager
     * @param type $e
     */
    public function onBootstrap($e)
    {
        $app = $e->getTarget();
        $services = $app->getServiceManager();
        $events = $app->getEventManager();
        $events->attach(
                $services->get('Common\Listeners\Listener')
        );
    }
}