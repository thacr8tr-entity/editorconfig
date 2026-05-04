<?php

declare(strict_types=1);

namespace Name\ServiceContracts;

use Name\Core\Contracts\BaseResponse;
use Name\Core\Exceptions\APIException;
use Name\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface StoreRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,int>>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
