<?php

namespace Tests\Unit\OpenApi;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class ExternalDocumentationTest extends TestCase
{
    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is
     * an empty array, the default value would be a Server Object with
     * an url value of `/`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function nullable(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::paths => []
        ]);

        self::assertNull(
            actual: $OpenApi->externalDocs,
            message: 'Additional external documentation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function externalDocs(): void
    {
        $Server = ServerFactory::factory()->make();
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::servers => [$Server],
            OpenApi::paths => [],
            OpenApi::externalDocs => [
                ExternalDocumentation::url => 'http://example.com/',
            ]
        ]);

        self::assertEquals(
            expected: 'http://example.com/',
            actual: $OpenApi->externalDocs->url,
            message: 'Additional external documentation.'
        );
    }
}