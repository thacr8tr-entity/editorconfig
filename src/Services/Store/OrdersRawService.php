<?php

declare(strict_types=1);

namespace Name\Services\Store;

use Name\Client;
use Name\Core\Contracts\BaseResponse;
use Name\Core\Exceptions\APIException;
use Name\Order;
use Name\RequestOptions;
use Name\ServiceContracts\Store\OrdersRawContract;
use Name\Store\Orders\OrderCreateParams;
use Name\Store\Orders\OrderCreateParams\Status;

/**
 * Access to Petstore orders.
 *
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class OrdersRawService implements OrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Place a new order in the store
     *
     * @param array{
     *   id?: int,
     *   complete?: bool,
     *   petID?: int,
     *   quantity?: int,
     *   shipDate?: \DateTimeInterface,
     *   status?: Status|value-of<Status>,
     * }|OrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'store/order',
            body: (object) $parsed,
            options: $options,
            convert: Order::class,
        );
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generate exceptions.
     *
     * @param int $orderID ID of order that needs to be fetched
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['store/order/%1$s', $orderID],
            options: $requestOptions,
            convert: Order::class,
        );
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param int $orderID ID of the order that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['store/order/%1$s', $orderID],
            options: $requestOptions,
            convert: null,
        );
    }
}
