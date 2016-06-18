<?php

namespace Wall;



return array(
    'router' => array(
        'routes' => array(
            'wall' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/:username',
                    'constraints' => array(
                        'username' => '\w+'
                    ),
                    'defaults' => array(
                        'controller' => 'Wall\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
        /*
        // Defining a new route
        'routes' => array(
            // name of the route is 'wall'
            'wall' => array(
                // of type Segment
                'type' => 'Zend\Mvc\Router\Http\Segment',
                // and, we define the structure of this 'wall' route
                'options' => array(
                    // with an optional 'id' parameter, essentially a way of identifying a user (in our case a username).
                    'route' => '/api/wall[/:id]',
                    'constraints' => array(
                        'id' => '\w+',
                    ),
                    // Finally in the default section we define our Controller.
                    'defaults' => array(
                        'controller' => 'Wall\Controller\Index',
                    ),
                ),
            ),
        ),*/

    ),
    // Specify the controllers available on this module.
    'controllers' => array(
        'invokables' => array(
            // Simple as defining an id for the controller and the class of hte file containing the controller.
            'Wall\Controller\Index' => 'Wall\Controller\IndexController',
        ),
    ),

    'view_manager' => array(
        // defining variables that control info we show when an action is not found or an exception is thrown.
        'display_not_found_reason'  => true,
        'display_exceptions'        => true,
        // We also define doctype of the HTML code. You can do it here, or hardcode doctype in the layout.
        'doctype'                   => 'HTML5',
        // Define two templates for specific situations and the path where the templates reside.
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        // As we are not defining a layout file on this module, the view will fall back to the one located in the Application module provided by ZF2 by default.
        'template_path_stack'       => array(__DIR__ . '/../view'),
    ),
);
