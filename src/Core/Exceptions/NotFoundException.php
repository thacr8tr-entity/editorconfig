<?php

namespace Name\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Not Found Exception';
}
