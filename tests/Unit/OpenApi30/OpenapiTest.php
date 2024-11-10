<?php

namespace Tests\Unit\OpenApi30;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidOpenAPIVersionException;
use Zerotoprod\DataModelOpenapi30\OpenApi30;

class OpenapiTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function invalid_type_openapi(): void
    {
        /**
         * **REQUIRED**. This string ***MUST*** be the version number of the OpenAPI
         * Specification that the OpenAPI Document uses. The openapi field
         * ***SHOULD*** be used by tooling to interpret the OpenAPI Document.
         * This is not related to the API info.version string
         */
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => [3.0],
            OpenApi30::info => InfoFactory::factory()->make()
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function invalid_type_version_openapi(): void
    {
        /**
         * **REQUIRED**. This string ***MUST*** be the version number of the OpenAPI
         * Specification that the OpenAPI Document uses. The openapi field
         * ***SHOULD*** be used by tooling to interpret the OpenAPI Document.
         * This is not related to the API info.version string
         */
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => 3.0,
            OpenApi30::info => InfoFactory::factory()->make()
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function required_openapi(): void
    {
        /**
         * **REQUIRED**. This string ***MUST*** be the version number of the OpenAPI
         * Specification that the OpenAPI Document uses. The openapi field
         * ***SHOULD*** be used by tooling to interpret the OpenAPI Document.
         * This is not related to the API info.version string
         */
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$openapi` is required.');

        OpenApi30::from([
            OpenApi30::info => InfoFactory::factory()->make()
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function openapi(): void
    {
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make()
        ]);

        self::assertEquals(
            expected: '3.0.4',
            actual: $OpenApi30->openapi,
            message: 'This string MUST be the version number of the OpenAPI Specification that the OpenAPI Document uses.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function incorrect_minor_version_validation(): void
    {
        /**
         * This string ***MUST*** be the version number of the OpenAPI
         * Specification that the OpenAPI Document uses.
         */
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => '3.1.0'
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function incorrect_major_version_validation(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => '3.1.0'
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function required_info(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$info` is required.');

        OpenApi30::from([
            OpenApi30::openapi => '3.0.4'
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function no_servers(): void
    {
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make()
        ]);

        self::assertEquals('/', $OpenApi30->servers->url);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function servers(): void
    {
        $Server = ServerFactory::factory()->make();
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make(),
            OpenApi30::servers => [$Server]
        ]);

        self::assertEquals($Server->url, $OpenApi30->servers[0]->url);
    }
}