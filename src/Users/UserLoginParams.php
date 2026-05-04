<?php

declare(strict_types=1);

namespace Name\Users;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;

/**
 * Logs user into the system.
 *
 * @see Name\Services\UsersService::login()
 *
 * @phpstan-type UserLoginParamsShape = array{
 *   password?: string|null, username?: string|null
 * }
 */
final class UserLoginParams implements BaseModel
{
    /** @use SdkModel<UserLoginParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The password for login in clear text.
     */
    #[Optional]
    public ?string $password;

    /**
     * The user name for login.
     */
    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $password = null,
        ?string $username = null
    ): self {
        $self = new self;

        null !== $password && $self['password'] = $password;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * The password for login in clear text.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The user name for login.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
