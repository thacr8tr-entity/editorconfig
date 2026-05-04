<?php

declare(strict_types=1);

namespace Name\Pets;

use Name\Core\Attributes\Optional;
use Name\Core\Attributes\Required;
use Name\Core\Concerns\SdkModel;
use Name\Core\Concerns\SdkParams;
use Name\Core\Contracts\BaseModel;
use Name\Pets\PetUpdateParams\Status;

/**
 * Update an existing pet by Id.
 *
 * @see Name\Services\PetsService::update()
 *
 * @phpstan-import-type CategoryShape from \Name\Pets\Category
 * @phpstan-import-type TagShape from \Name\Pets\Tag
 *
 * @phpstan-type PetUpdateParamsShape = array{
 *   name: string,
 *   photoURLs: list<string>,
 *   id?: int|null,
 *   category?: null|Category|CategoryShape,
 *   status?: null|Status|value-of<Status>,
 *   tags?: list<Tag|TagShape>|null,
 * }
 */
final class PetUpdateParams implements BaseModel
{
    /** @use SdkModel<PetUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    /** @var list<string> $photoURLs */
    #[Required('photoUrls', list: 'string')]
    public array $photoURLs;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?Category $category;

    /**
     * pet status in the store.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<Tag>|null $tags */
    #[Optional(list: Tag::class)]
    public ?array $tags;

    /**
     * `new PetUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PetUpdateParams::with(name: ..., photoURLs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PetUpdateParams)->withName(...)->withPhotoURLs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $photoURLs
     * @param Category|CategoryShape|null $category
     * @param Status|value-of<Status>|null $status
     * @param list<Tag|TagShape>|null $tags
     */
    public static function with(
        string $name,
        array $photoURLs,
        ?int $id = null,
        Category|array|null $category = null,
        Status|string|null $status = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['photoURLs'] = $photoURLs;

        null !== $id && $self['id'] = $id;
        null !== $category && $self['category'] = $category;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<string> $photoURLs
     */
    public function withPhotoURLs(array $photoURLs): self
    {
        $self = clone $this;
        $self['photoURLs'] = $photoURLs;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Category|CategoryShape $category
     */
    public function withCategory(Category|array $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * pet status in the store.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<Tag|TagShape> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
