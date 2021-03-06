<?php

namespace ChurchTools\Api2\Exception;

class GetStatusByIdForbiddenException extends \RuntimeException implements ClientException
{
    public function __construct()
    {
        parent::__construct('Forbidden to see status', 403);
    }
}