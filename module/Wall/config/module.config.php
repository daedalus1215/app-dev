<?php

namespace Wall;



return array(
    'router' => array(
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
        ),
    ),
);
