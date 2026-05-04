<?php

declare(strict_types=1);

namespace Name\Services;

use Name\Client;
use Name\Core\Contracts\BaseResponse;
use Name\Core\Conversion\ListOf;
use Name\Core\Exceptions\APIException;
use Name\Core\FileParam;
use Name\Pets\Category;
use Name\Pets\Pet;
use Name\Pets\PetCreateParams;
use Name\Pets\PetCreateParams\Status;
use Name\Pets\PetFindByStatusParams;
use Name\Pets\PetFindByTagsParams;
use Name\Pets\PetUpdateByIDParams;
use Name\Pets\PetUpdateParams;
use Name\Pets\PetUploadImageParams;
use Name\Pets\PetUploadImageResponse;
use Name\Pets\Tag;
use Name\RequestOptions;
use Name\ServiceContracts\PetsRawContract;

/**
 * Everything about your Pets.
 *
 * @phpstan-import-type CategoryShape from \Name\Pets\Category
 * @phpstan-import-type TagShape from \Name\Pets\Tag
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
final class PetsRawService implements PetsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new pet to the store
     *
     * @param array{
     *   name: string,
     *   photoURLs: list<string>,
     *   id?: int,
     *   category?: Category|CategoryShape,
     *   status?: Status|value-of<Status>,
     *   tags?: list<Tag|TagShape>,
     * }|PetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function create(
        array|PetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'pet',
            body: (object) $parsed,
            options: $options,
            convert: Pet::class,
        );
    }

    /**
     * @api
     *
     * Returns a single pet
     *
     * @param int $petID ID of pet to return
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['pet/%1$s', $petID],
            options: $requestOptions,
            convert: Pet::class,
        );
    }

    /**
     * @api
     *
     * Update an existing pet by Id
     *
     * @param array{
     *   name: string,
     *   photoURLs: list<string>,
     *   id?: int,
     *   category?: Category|CategoryShape,
     *   status?: PetUpdateParams\Status|value-of<PetUpdateParams\Status>,
     *   tags?: list<Tag|TagShape>,
     * }|PetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function update(
        array|PetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'pet',
            body: (object) $parsed,
            options: $options,
            convert: Pet::class,
        );
    }

    /**
     * @api
     *
     * delete a pet
     *
     * @param int $petID Pet id to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['pet/%1$s', $petID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Multiple status values can be provided with comma separated strings
     *
     * @param array{
     *   status?: PetFindByStatusParams\Status|value-of<PetFindByStatusParams\Status>,
     * }|PetFindByStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByStatus(
        array|PetFindByStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetFindByStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pet/findByStatus',
            query: $parsed,
            options: $options,
            convert: new ListOf(Pet::class),
        );
    }

    /**
     * @api
     *
     * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
     *
     * @param array{tags?: list<string>}|PetFindByTagsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByTags(
        array|PetFindByTagsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetFindByTagsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pet/findByTags',
            query: $parsed,
            options: $options,
            convert: new ListOf(Pet::class),
        );
    }

    /**
     * @api
     *
     * Updates a pet in the store with form data
     *
     * @param int $petID ID of pet that needs to be updated
     * @param array{name?: string, status?: string}|PetUpdateByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateByID(
        int $petID,
        array|PetUpdateByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetUpdateByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['pet/%1$s', $petID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * uploads an image
     *
     * @param int $petID Path param: ID of pet to update
     * @param string|FileParam $image Body param
     * @param array{additionalMetadata?: string}|PetUploadImageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PetUploadImageResponse>
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string|FileParam $image,
        array|PetUploadImageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetUploadImageParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['pet/%1$s/uploadImage', $petID],
            query: array_diff_key($parsed, array_flip(['image'])),
            headers: ['Content-Type' => 'application/octet-stream'],
            body: $parsed,
            options: $options,
            convert: PetUploadImageResponse::class,
        );
    }
}
