<?php

declare(strict_types=1);

namespace Name\Order;

/**
 * Order Status.
 */
enum Status: string
{
    case PLACED = 'placed';

    case APPROVED = 'approved';

    case DELIVERED = 'delivered';
}
