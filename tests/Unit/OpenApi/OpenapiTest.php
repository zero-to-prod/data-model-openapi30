<?php

namespace Tests\Unit\OpenApi;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class OpenapiTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function openapi(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::paths => []
        ]);

        self::assertEquals(
            expected: '3.0.4',
            actual: $OpenApi->openapi,
            message: 'This string _MUST_ be the version number of the OpenAPI Specification that the OpenAPI Document uses.'
        );
    }
}