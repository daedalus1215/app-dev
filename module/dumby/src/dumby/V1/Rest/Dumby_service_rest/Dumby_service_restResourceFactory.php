<?php
namespace dumby\V1\Rest\Dumby_service_rest;

class Dumby_service_restResourceFactory
{
    public function __invoke($services)
    {
        return new Dumby_service_restResource();
    }
}
