<?php

declare(strict_types=1);

namespace Name\ServiceContracts\Store;

use Name\Core\Exceptions\APIException;
use Name\Order;
use Name\RequestOptions;
use Name\Store\Orders\OrderCreateParams\Status;

/**
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface OrdersContract
{
    /**
     * @api
     *
     * @param Status|value-of<Status> $status Order Status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?int $id = null,
        ?bool $complete = null,
        ?int $petID = null,
        ?int $quantity = null,
        ?\DateTimeInterface $shipDate = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): Order;

    /**
     * @api
     *
     * @param int $orderID ID of order that needs to be fetched
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): Order;

    /**
     * @api
     *
     * @param int $orderID ID of the order that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
