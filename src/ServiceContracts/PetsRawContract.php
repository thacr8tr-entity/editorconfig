<?php

declare(strict_types=1);

namespace Name\ServiceContracts;

use Name\Core\Contracts\BaseResponse;
use Name\Core\Exceptions\APIException;
use Name\Core\FileParam;
use Name\Pets\Pet;
use Name\Pets\PetCreateParams;
use Name\Pets\PetFindByStatusParams;
use Name\Pets\PetFindByTagsParams;
use Name\Pets\PetUpdateByIDParams;
use Name\Pets\PetUpdateParams;
use Name\Pets\PetUploadImageParams;
use Name\Pets\PetUploadImageResponse;
use Name\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Name\RequestOptions
 */
interface PetsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function create(
        array|PetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function update(
        array|PetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PetFindByStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByStatus(
        array|PetFindByStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PetFindByTagsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByTags(
        array|PetFindByTagsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID ID of pet that needs to be updated
     * @param array<string,mixed>|PetUpdateByIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID Path param: ID of pet to update
     * @param string|FileParam $image Body param
     * @param array<string,mixed>|PetUploadImageParams $params
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
    ): BaseResponse;
}
