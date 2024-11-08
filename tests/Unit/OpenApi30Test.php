<?php

namespace Tests\Unit;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidOpenAPIVersionException;
use Zerotoprod\DataModelOpenapi30\OpenApi30;

class OpenApi30Test extends TestCase
{

    #[Test] public function required_openapi(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$openapi` is required.');

        OpenApi30::from([
            OpenApi30::info => InfoFactory::factory()->make()
        ]);
    }

    #[Test] public function openapi(): void
    {
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make()
        ]);

        self::assertEquals('3.0.4', $OpenApi30->openapi);
    }

    #[Test] public function incorrect_minor_version_validation(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => '3.1.0'
        ]);
    }

    #[Test] public function incorrect_major_version_validation(): void
    {
        $this->expectException(InvalidOpenAPIVersionException::class);

        OpenApi30::from([
            OpenApi30::openapi => '3.1.0'
        ]);
    }

    #[Test] public function required_info(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$info` is required.');

        OpenApi30::from([
            OpenApi30::openapi => '3.0.4'
        ]);
    }

    #[Test] public function no_servers(): void
    {
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make()
        ]);

        self::assertEquals('/', $OpenApi30->servers->url);
    }

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