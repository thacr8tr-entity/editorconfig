<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;

/**
 * Updates a pet in the store with form data.
 *
 * @see Name\Services\PetsService::updateByID()
 *
 * @phpstan-type PetUpdateByIDParamsShape = array{
 *   name?: string|null, status?: string|null
 * }
 */
final class PetUpdateByIDParams implements BaseModel
{
    /** @use SdkModel<PetUpdateByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Name of pet that needs to be updated.
     */
    #[Optional]
    public ?string $name;

    /**
     * Status of pet that needs to be updated.
     */
    #[Optional]
    public ?string $status;

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
        ?string $name = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Name of pet that needs to be updated.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Status of pet that needs to be updated.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
