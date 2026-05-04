<?php

declare(strict_types=1);

namespace Name\Store\Orders\OrderCreateParams;

/**
 * Order Status.
 */
enum Status: string
{
    case PLACED = 'placed';

    case APPROVED = 'approved';

    case DELIVERED = 'delivered';
}
