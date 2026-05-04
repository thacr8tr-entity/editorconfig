<?php

declare(strict_types=1);

namespace Name\ServiceContracts;

use Name\Core\Contracts\BaseResponse;
use Name\Core\Exceptions\APIException;
use Name\RequestOptions;
use Name\Users\User;
use Name\Users\UserCreateParams;
use Name\Users\UserCreateWithListParams;
use Name\Users\UserLoginParams;
use Name\Users\UserUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface UsersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $existingUsername The username that needs to be replaced
     * @param array<string,mixed>|UserUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $existingUsername,
        array|UserUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $username The name that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserCreateWithListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function createWithList(
        array|UserCreateWithListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserLoginParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function login(
        array|UserLoginParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
