<?php

declare(strict_types=1);

namespace Name\Core\Conversion\Contracts;

use Name\Core\Conversion\CoerceState;
use Name\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
