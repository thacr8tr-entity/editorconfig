<?php

namespace Name\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Name Permission Denied Exception';
}
