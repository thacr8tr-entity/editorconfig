<?php

namespace Name\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Rate Limit Exception';
}
