<?php

namespace Name\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Authentication Exception';
}
