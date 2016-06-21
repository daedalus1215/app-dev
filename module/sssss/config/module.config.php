<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'sssss\\V1\\Rest\\Hhhh\\HhhhResource' => 'sssss\\V1\\Rest\\Hhhh\\HhhhResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'sssss.rest.hhhh' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/hhhh[/:hhhh_id]',
                    'defaults' => array(
                        'controller' => 'sssss\\V1\\Rest\\Hhhh\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'sssss.rest.hhhh',
        ),
    ),
    'zf-rest' => array(
        'sssss\\V1\\Rest\\Hhhh\\Controller' => array(
            'listener' => 'sssss\\V1\\Rest\\Hhhh\\HhhhResource',
            'route_name' => 'sssss.rest.hhhh',
            'route_identifier_name' => 'hhhh_id',
            'collection_name' => 'hhhh',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'sssss\\V1\\Rest\\Hhhh\\HhhhEntity',
            'collection_class' => 'sssss\\V1\\Rest\\Hhhh\\HhhhCollection',
            'service_name' => 'hhhh',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'sssss\\V1\\Rest\\Hhhh\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'sssss\\V1\\Rest\\Hhhh\\Controller' => array(
                0 => 'application/vnd.sssss.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'sssss\\V1\\Rest\\Hhhh\\Controller' => array(
                0 => 'application/vnd.sssss.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'sssss\\V1\\Rest\\Hhhh\\HhhhEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'sssss.rest.hhhh',
                'route_identifier_name' => 'hhhh_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'sssss\\V1\\Rest\\Hhhh\\HhhhCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'sssss.rest.hhhh',
                'route_identifier_name' => 'hhhh_id',
                'is_collection' => true,
            ),
        ),
    ),
);
