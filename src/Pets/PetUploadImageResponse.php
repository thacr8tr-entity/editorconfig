<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Contracts\BaseModel;

/**
 * @phpstan-type PetUploadImageResponseShape = array{
 *   code?: int|null, message?: string|null, type?: string|null
 * }
 */
final class PetUploadImageResponse implements BaseModel
{
    /** @use SdkModel<PetUploadImageResponseShape> */
    use SdkModel;

    #[Optional]
    public ?int $code;

    #[Optional]
    public ?string $message;

    #[Optional]
    public ?string $type;

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
        ?int $code = null,
        ?string $message = null,
        ?string $type = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $message && $self['message'] = $message;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withCode(int $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
