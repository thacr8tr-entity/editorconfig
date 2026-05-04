<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;

/**
 * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
 *
 * @see Name\Services\PetsService::findByTags()
 *
 * @phpstan-type PetFindByTagsParamsShape = array{tags?: list<string>|null}
 */
final class PetFindByTagsParams implements BaseModel
{
    /** @use SdkModel<PetFindByTagsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Tags to filter by.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $tags
     */
    public static function with(?array $tags = null): self
    {
        $self = new self;

        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * Tags to filter by.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
