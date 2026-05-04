<?php

declare(strict_types=1);

namespace Name\Pets\PetFindByStatusParams;

/**
 * Status values that need to be considered for filter.
 */
enum Status: string
{
    case AVAILABLE = 'available';

    case PENDING = 'pending';

    case SOLD = 'sold';
}
