<?php
return array(
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=sn; host=localhost',
        'driver_options' => array(
            1002 => 'SET NAMES \'UTF8\'',
        ),
        'adapters' => array(
            'dumb_db_adapter' => array(),
        ),
    ),
    'service-manager' => array(
        'factories' => array(
            'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            0 => 'ViewJsonStrategy',
        ),
    ),
    'zf-mvc-auth' => array(
        'authentication' => array(
            'map' => array(
                'STATUS\\V1' => 'status',
            ),
        ),
    ),
);
