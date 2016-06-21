<?php
return array(
    'db' => array(
        'adapters' => array(
            'dumb_db_adapter' => array(
                'database' => 'sn',
                'driver' => 'PDO_Mysql',
                'hostname' => 'localhost',
                'username' => 'root',
                'password' => 'root',
                'port' => '3306',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authentication' => array(
            'adapters' => array(
                'status' => array(
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\HttpAdapter',
                    'options' => array(
                        'accept_schemes' => array(
                            0 => 'basic',
                        ),
                        'realm' => 'api',
                        'htpasswd' => 'data/htpasswd',
                    ),
                ),
            ),
        ),
    ),
);
