<?php

declare(strict_types=1);

namespace Name\Core\Conversion;

use Name\Core\Conversion\Concerns\ArrayOf;
use Name\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
