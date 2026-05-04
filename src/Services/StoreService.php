<?php

declare(strict_types=1);

namespace Name\Services;

use Name\Client;
use Name\Core\Exceptions\APIException;
use Name\RequestOptions;
use Name\ServiceContracts\StoreContract;
use Name\Services\Store\OrdersService;

/**
 * Access to Petstore orders.
 *
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class StoreService implements StoreContract
{
    /**
     * @api
     */
    public StoreRawService $raw;

    /**
     * @api
     */
    public OrdersService $orders;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StoreRawService($client);
        $this->orders = new OrdersService($client);
    }

    /**
     * @api
     *
     * Returns a map of status codes to quantities
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,int>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listInventory(requestOptions: $requestOptions);

        return $response->parse();
    }
}
