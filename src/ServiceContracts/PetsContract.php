<?php

declare(strict_types=1);

namespace Name\ServiceContracts;

use Name\Core\Exceptions\APIException;
use Name\Core\FileParam;
use Name\Pets\Category;
use Name\Pets\Pet;
use Name\Pets\PetCreateParams\Status;
use Name\Pets\PetUploadImageResponse;
use Name\Pets\Tag;
use Name\RequestOptions;

/**
 * @phpstan-import-type CategoryShape from \Name\Pets\Category
 * @phpstan-import-type TagShape from \Name\Pets\Tag
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface PetsContract
{
    /**
     * @api
     *
     * @param list<string> $photoURLs
     * @param Category|CategoryShape $category
     * @param Status|value-of<Status> $status pet status in the store
     * @param list<Tag|TagShape> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        array $photoURLs,
        ?int $id = null,
        Category|array|null $category = null,
        Status|string|null $status = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pet;

    /**
     * @api
     *
     * @param int $petID ID of pet to return
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): Pet;

    /**
     * @api
     *
     * @param list<string> $photoURLs
     * @param Category|CategoryShape $category
     * @param \Name\Pets\PetUpdateParams\Status|value-of<\Name\Pets\PetUpdateParams\Status> $status pet status in the store
     * @param list<Tag|TagShape> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array $photoURLs,
        ?int $id = null,
        Category|array|null $category = null,
        \Name\Pets\PetUpdateParams\Status|string|null $status = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pet;

    /**
     * @api
     *
     * @param int $petID Pet id to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param \Name\Pets\PetFindByStatusParams\Status|value-of<\Name\Pets\PetFindByStatusParams\Status> $status Status values that need to be considered for filter
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByStatus(
        \Name\Pets\PetFindByStatusParams\Status|string $status = 'available',
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param list<string> $tags Tags to filter by
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByTags(
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param int $petID ID of pet that needs to be updated
     * @param string $name Name of pet that needs to be updated
     * @param string $status Status of pet that needs to be updated
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateByID(
        int $petID,
        ?string $name = null,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $petID Path param: ID of pet to update
     * @param string|FileParam $image Body param
     * @param string $additionalMetadata Query param: Additional Metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string|FileParam $image,
        ?string $additionalMetadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): PetUploadImageResponse;
}
