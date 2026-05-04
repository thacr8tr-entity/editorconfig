<?php

declare(strict_types=1);

namespace Name\Pets\PetUpdateParams;

/**
 * pet status in the store.
 */
enum Status: string
{
    case AVAILABLE = 'available';

    case PENDING = 'pending';

    case SOLD = 'sold';
}
