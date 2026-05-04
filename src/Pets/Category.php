<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Contracts\BaseModel;

/**
 * @phpstan-type CategoryShape = array{id?: int|null, name?: string|null}
 */
final class Category implements BaseModel
{
    /** @use SdkModel<CategoryShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $id = null, ?string $name = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
