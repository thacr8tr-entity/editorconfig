<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;

/**
 * uploads an image.
 *
 * @see Name\Services\PetsService::uploadImage()
 *
 * @phpstan-type PetUploadImageParamsShape = array{
 *   additionalMetadata?: string|null
 * }
 */
final class PetUploadImageParams implements BaseModel
{
    /** @use SdkModel<PetUploadImageParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Additional Metadata.
     */
    #[Optional]
    public ?string $additionalMetadata;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $additionalMetadata = null): self
    {
        $self = new self;

        null !== $additionalMetadata && $self['additionalMetadata'] = $additionalMetadata;

        return $self;
    }

    /**
     * Additional Metadata.
     */
    public function withAdditionalMetadata(string $additionalMetadata): self
    {
        $self = clone $this;
        $self['additionalMetadata'] = $additionalMetadata;

        return $self;
    }
}
