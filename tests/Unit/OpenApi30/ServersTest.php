<?php

namespace Tests\Unit\OpenApi30;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\OpenApi30;

class ServersTest extends TestCase
{
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