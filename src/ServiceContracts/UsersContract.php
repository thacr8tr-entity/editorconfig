<?php

declare(strict_types=1);

namespace Name\ServiceContracts;

use Name\Core\Exceptions\APIException;
use Name\RequestOptions;
use Name\Users\User;

/**
 * @phpstan-import-type UserShape from \Name\Users\User
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
     *
     * @param int $userStatus User Status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
        RequestOptions|array|null $requestOptions = null,
    ): User;

    /**
     * @api
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @param string $existingUsername The username that needs to be replaced
     * @param int $userStatus User Status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $existingUsername,
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $username The name that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<User|UserShape> $items
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createWithList(
        ?array $items = null,
        RequestOptions|array|null $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @param string $password The password for login in clear text
     * @param string $username The user name for login
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function login(
        ?string $password = null,
        ?string $username = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
