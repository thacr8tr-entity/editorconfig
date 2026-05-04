<?php

declare(strict_types=1);

namespace Name\Services;

use Name\Client;
use Name\Core\Exceptions\APIException;
use Name\Core\Util;
use Name\RequestOptions;
use Name\ServiceContracts\UsersContract;
use Name\Users\User;

/**
 * Operations about user.
 *
 * @phpstan-import-type UserShape from \Name\Users\User
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
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
    ): User {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'email' => $email,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $password,
                'phone' => $phone,
                'username' => $username,
                'userStatus' => $userStatus,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get user by user name
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): User {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($username, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'email' => $email,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $password,
                'phone' => $phone,
                'username' => $username,
                'userStatus' => $userStatus,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($existingUsername, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
     *
     * @param string $username The name that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($username, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates list of users with given input array
     *
     * @param list<User|UserShape> $items
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createWithList(
        ?array $items = null,
        RequestOptions|array|null $requestOptions = null
    ): User {
        $params = Util::removeNulls(['items' => $items]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createWithList(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Logs user into the system
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
    ): string {
        $params = Util::removeNulls(
            ['password' => $password, 'username' => $username]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->login(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Logs out current logged in user session
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->logout(requestOptions: $requestOptions);

        return $response->parse();
    }
}
