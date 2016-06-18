<?php

/*
 * Contains more configuration information for this Module for ModuleManager to grab.
 */

namespace Users;

class Module
{
    /**
     * Return the path to our configuration file.
     *
     * Just returning the array contained in the configuration file for the module
     *
     *
     * @return String- Return the path to our configuration file.
     *
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Tell the autoloader where it can find the files for this module.
     * @return Array
     */
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
}