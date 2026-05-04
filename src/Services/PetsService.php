<?php

declare(strict_types=1);

namespace Name\Services;

use Name\Client;
use Name\Core\Exceptions\APIException;
use Name\Core\FileParam;
use Name\Core\Util;
use Name\Pets\Category;
use Name\Pets\Pet;
use Name\Pets\PetCreateParams\Status;
use Name\Pets\PetUploadImageResponse;
use Name\Pets\Tag;
use Name\RequestOptions;
use Name\ServiceContracts\PetsContract;

/**
 * Everything about your Pets.
 *
 * @phpstan-import-type CategoryShape from \Name\Pets\Category
 * @phpstan-import-type TagShape from \Name\Pets\Tag
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class PetsService implements PetsContract
{
    /**
     * @api
     */
    public PetsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PetsRawService($client);
    }

    /**
     * @api
     *
     * Add a new pet to the store
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
    ): Pet {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'photoURLs' => $photoURLs,
                'id' => $id,
                'category' => $category,
                'status' => $status,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a single pet
     *
     * @param int $petID ID of pet to return
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): Pet {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($petID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing pet by Id
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
    ): Pet {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'photoURLs' => $photoURLs,
                'id' => $id,
                'category' => $category,
                'status' => $status,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * delete a pet
     *
     * @param int $petID Pet id to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($petID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Multiple status values can be provided with comma separated strings
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
    ): array {
        $params = Util::removeNulls(['status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->findByStatus(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
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
    ): array {
        $params = Util::removeNulls(['tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->findByTags(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a pet in the store with form data
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
    ): mixed {
        $params = Util::removeNulls(['name' => $name, 'status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateByID($petID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * uploads an image
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
    ): PetUploadImageResponse {
        $params = Util::removeNulls(['additionalMetadata' => $additionalMetadata]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadImage($petID, $image, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
