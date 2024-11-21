<?php

namespace Tests\Unit\OpenApi;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class ServersTest extends TestCase
{
    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is
     * an empty array, the default value would be a Server Object with
     * an url value of `/`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function no_servers(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::paths => []
        ]);

        self::assertEquals(
            expected: '/',
            actual: $OpenApi->servers->url,
            message: 'If the servers field is not provided, or is an empty array, the default value would be a Server Object with a url value of /'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function servers(): void
    {
        $Server = ServerFactory::factory()->make();
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::servers => [$Server],
            OpenApi::paths => []
        ]);

        self::assertEquals(
            expected: $Server->url,
            actual: $OpenApi->servers[0]->url,
            message: 'An array of Server Objects, which provide connectivity information to a target server.'
        );
    }
}