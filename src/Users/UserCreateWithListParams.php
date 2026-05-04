<?php

declare(strict_types=1);

namespace Name\Users;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;

/**
 * Creates list of users with given input array.
 *
 * @see Name\Services\UsersService::createWithList()
 *
 * @phpstan-import-type UserShape from \Name\Users\User
 *
 * @phpstan-type UserCreateWithListParamsShape = array{
 *   items?: list<User|UserShape>|null
 * }
 */
final class UserCreateWithListParams implements BaseModel
{
    /** @use SdkModel<UserCreateWithListParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<User>|null $items */
    #[Optional(list: User::class)]
    public ?array $items;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<User|UserShape>|null $items
     */
    public static function with(?array $items = null): self
    {
        $self = new self;

        null !== $items && $self['items'] = $items;

        return $self;
    }

    /**
     * @param list<User|UserShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }
}
