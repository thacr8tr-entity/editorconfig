<?php

declare(strict_types=1);

namespace Name\ServiceContracts\Store;

use Name\Core\Contracts\BaseResponse;
use Name\Core\Exceptions\APIException;
use Name\Order;
use Name\RequestOptions;
use Name\Store\Orders\OrderCreateParams;

/**
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface OrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
