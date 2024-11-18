<?php

namespace Tests\Unit\OpenApi30;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi30;

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
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make(),
            OpenApi30::paths => []
        ]);

        self::assertEquals(
            expected: '/',
            actual: $OpenApi30->servers->url,
            message: 'If the servers field is not provided, or is an empty array, the default value would be a Server Object with a url value of /'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function servers(): void
    {
        $Server = ServerFactory::factory()->make();
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make(),
            OpenApi30::servers => [$Server],
            OpenApi30::paths => []
        ]);

        self::assertEquals(
            expected: $Server->url,
            actual: $OpenApi30->servers[0]->url,
            message: 'An array of Server Objects, which provide connectivity information to a target server.'
        );
    }
}