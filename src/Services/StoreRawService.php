<?php

declare(strict_types=1);

namespace Name\Services;

use Name\Client;
use Name\Core\Contracts\BaseResponse;
use Name\Core\Conversion\MapOf;
use Name\Core\Exceptions\APIException;
use Name\RequestOptions;
use Name\ServiceContracts\StoreRawContract;

/**
 * Access to Petstore orders.
 *
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class StoreRawService implements StoreRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a map of status codes to quantities
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,int>>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'store/inventory',
            options: $requestOptions,
            convert: new MapOf('int'),
        );
    }
}
