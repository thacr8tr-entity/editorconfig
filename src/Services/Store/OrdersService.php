<?php

declare(strict_types=1);

namespace Name\Services\Store;

use Name\Client;
use Name\Core\Exceptions\APIException;
use Name\Core\Util;
use Name\Order;
use Name\RequestOptions;
use Name\ServiceContracts\Store\OrdersContract;
use Name\Store\Orders\OrderCreateParams\Status;

/**
 * Access to Petstore orders.
 *
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class OrdersService implements OrdersContract
{
    /**
     * @api
     */
    public OrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OrdersRawService($client);
    }

    /**
     * @api
     *
     * Place a new order in the store
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
    ): Order {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'complete' => $complete,
                'petID' => $petID,
                'quantity' => $quantity,
                'shipDate' => $shipDate,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generate exceptions.
     *
     * @param int $orderID ID of order that needs to be fetched
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): Order {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param int $orderID ID of the order that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
