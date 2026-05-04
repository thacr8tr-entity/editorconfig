<?php

declare(strict_types=1);

namespace Name\Users;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;

/**
 * This can only be done by the logged in user.
 *
 * @see Name\Services\UsersService::create()
 *
 * @phpstan-type UserCreateParamsShape = array{
 *   id?: int|null,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   password?: string|null,
 *   phone?: string|null,
 *   username?: string|null,
 *   userStatus?: int|null,
 * }
 */
final class UserCreateParams implements BaseModel
{
    /** @use SdkModel<UserCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $firstName;

    #[Optional]
    public ?string $lastName;

    #[Optional]
    public ?string $password;

    #[Optional]
    public ?string $phone;

    #[Optional]
    public ?string $username;

    /**
     * User Status.
     */
    #[Optional]
    public ?int $userStatus;

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
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $password && $self['password'] = $password;
        null !== $phone && $self['phone'] = $phone;
        null !== $username && $self['username'] = $username;
        null !== $userStatus && $self['userStatus'] = $userStatus;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }

    /**
     * User Status.
     */
    public function withUserStatus(int $userStatus): self
    {
        $self = clone $this;
        $self['userStatus'] = $userStatus;

        return $self;
    }
}
