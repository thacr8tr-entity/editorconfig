<?php

namespace Name\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Conflict Exception';
}
