<?php

namespace Name\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Unprocessable Entity Exception';
}
