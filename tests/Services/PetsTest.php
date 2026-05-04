<?php

namespace Tests\Services;

use Name\Client;
use Name\Core\FileParam;
use Name\Core\Util;
use Name\Pets\Pet;
use Name\Pets\PetUploadImageResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PetsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->create(
            name: 'doggie',
            photoURLs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pet::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->create(
            name: 'doggie',
            photoURLs: ['string'],
            id: 10,
            category: ['id' => 1, 'name' => 'Dogs'],
            status: 'available',
            tags: [['id' => 0, 'name' => 'name']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pet::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->retrieve(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pet::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->update(
            name: 'doggie',
            photoURLs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pet::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->update(
            name: 'doggie',
            photoURLs: ['string'],
            id: 10,
            category: ['id' => 1, 'name' => 'Dogs'],
            status: 'available',
            tags: [['id' => 0, 'name' => 'name']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pet::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testFindByStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->findByStatus();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testFindByTags(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->findByTags();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testUpdateByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->updateByID(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUploadImage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pets->uploadImage(
            0,
            FileParam::fromString('Example data', filename: uniqid('file-upload-', true)),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PetUploadImageResponse::class, $result);
    }
}
