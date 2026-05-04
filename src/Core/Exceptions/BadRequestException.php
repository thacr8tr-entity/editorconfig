<?php

namespace Name\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Bad Request Exception';
}
