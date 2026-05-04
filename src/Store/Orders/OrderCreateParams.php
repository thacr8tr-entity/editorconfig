<?php

declare(strict_types=1);

namespace Name\Store\Orders;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;
use Name\Store\Orders\OrderCreateParams\Status;

/**
 * Place a new order in the store.
 *
 * @see Name\Services\Store\OrdersService::create()
 *
 * @phpstan-type OrderCreateParamsShape = array{
 *   id?: int|null,
 *   complete?: bool|null,
 *   petID?: int|null,
 *   quantity?: int|null,
 *   shipDate?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class OrderCreateParams implements BaseModel
{
    /** @use SdkModel<OrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $complete;

    #[Optional('petId')]
    public ?int $petID;

    #[Optional]
    public ?int $quantity;

    #[Optional]
    public ?\DateTimeInterface $shipDate;

    /**
     * Order Status.
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
    public static function with(
        ?int $id = null,
        ?bool $complete = null,
        ?int $petID = null,
        ?int $quantity = null,
        ?\DateTimeInterface $shipDate = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $complete && $self['complete'] = $complete;
        null !== $petID && $self['petID'] = $petID;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $shipDate && $self['shipDate'] = $shipDate;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withComplete(bool $complete): self
    {
        $self = clone $this;
        $self['complete'] = $complete;

        return $self;
    }

    public function withPetID(int $petID): self
    {
        $self = clone $this;
        $self['petID'] = $petID;

        return $self;
    }

    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    public function withShipDate(\DateTimeInterface $shipDate): self
    {
        $self = clone $this;
        $self['shipDate'] = $shipDate;

        return $self;
    }

    /**
     * Order Status.
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
