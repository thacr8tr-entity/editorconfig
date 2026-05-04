<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;
use Name\Pets\PetFindByStatusParams\Status;

/**
 * Multiple status values can be provided with comma separated strings.
 *
 * @see Name\Services\PetsService::findByStatus()
 *
 * @phpstan-type PetFindByStatusParamsShape = array{
 *   status?: null|Status|value-of<Status>
 * }
 */
final class PetFindByStatusParams implements BaseModel
{
    /** @use SdkModel<PetFindByStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Status values that need to be considered for filter.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(Status|string|null $status = null): self
    {
        $self = new self;

        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Status values that need to be considered for filter.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
