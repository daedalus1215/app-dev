<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restResource' => 'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'dumby.rest.dumby_service_rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/dumby_service_rest[/:dumby_service_rest_id]',
                    'defaults' => array(
                        'controller' => 'dumby\\V1\\Rest\\Dumby_service_rest\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'dumby.rest.dumby_service_rest',
        ),
    ),
    'zf-rest' => array(
        'dumby\\V1\\Rest\\Dumby_service_rest\\Controller' => array(
            'listener' => 'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restResource',
            'route_name' => 'dumby.rest.dumby_service_rest',
            'route_identifier_name' => 'dumby_service_rest_id',
            'collection_name' => 'dumby_service_rest',
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
            'entity_class' => 'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restEntity',
            'collection_class' => 'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restCollection',
            'service_name' => 'dumby_service_rest',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'dumby\\V1\\Rest\\Dumby_service_rest\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'dumby\\V1\\Rest\\Dumby_service_rest\\Controller' => array(
                0 => 'application/vnd.dumby.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'dumby\\V1\\Rest\\Dumby_service_rest\\Controller' => array(
                0 => 'application/vnd.dumby.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'dumby.rest.dumby_service_rest',
                'route_identifier_name' => 'dumby_service_rest_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'dumby\\V1\\Rest\\Dumby_service_rest\\Dumby_service_restCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'dumby.rest.dumby_service_rest',
                'route_identifier_name' => 'dumby_service_rest_id',
                'is_collection' => true,
            ),
        ),
    ),
);
