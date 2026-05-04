<?php

namespace Name\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Internal Server Exception';
}
