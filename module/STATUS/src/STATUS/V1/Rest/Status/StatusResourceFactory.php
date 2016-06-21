<?php
namespace STATUS\V1\Rest\Status;

class StatusResourceFactory
{
    public function __invoke($services)
    {
        return new StatusResource();
    }
}
