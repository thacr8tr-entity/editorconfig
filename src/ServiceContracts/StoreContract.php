<?php

declare(strict_types=1);

namespace Name\ServiceContracts;

use Name\Core\Exceptions\APIException;
use Name\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface StoreContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,int>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): array;
}
