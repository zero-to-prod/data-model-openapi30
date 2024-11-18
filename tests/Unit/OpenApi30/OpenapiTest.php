<?php

namespace Tests\Unit\OpenApi30;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidOpenAPIVersionException;
use Zerotoprod\DataModelOpenapi30\OpenApi30;

class OpenapiTest extends TestCase
{

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * ***_SHOULD_*** be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function invalid_type_openapi(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => [3.0],
            OpenApi30::info => InfoFactory::factory()->make()
        ]);
    }

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * ***_SHOULD_*** be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function invalid_type_version_openapi(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => 3.0,
            OpenApi30::info => InfoFactory::factory()->make()
        ]);
    }

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * ***_SHOULD_*** be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function required_openapi(): void
    {
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
            OpenApi30::info => InfoFactory::factory()->make(),
            OpenApi30::paths => []
        ]);

        self::assertEquals(
            expected: '3.0.4',
            actual: $OpenApi30->openapi,
            message: 'This string MUST be the version number of the OpenAPI Specification that the OpenAPI Document uses.'
        );
    }

    /**
     * This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function incorrect_minor_version_validation(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => '3.1.0'
        ]);
    }

    /**
     * This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function incorrect_major_version_validation(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => '2.0.0'
        ]);
    }
}