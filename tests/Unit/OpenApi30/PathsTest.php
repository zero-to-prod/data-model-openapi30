<?php

namespace Tests\Unit\OpenApi30;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi30;
use Zerotoprod\DataModelOpenapi30\PathItem;

class PathsTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function paths(): void
    {
        $OpenApi30 = OpenApi30::from([
            OpenApi30::openapi => '3.0.4',
            OpenApi30::info => InfoFactory::factory()->make(),
            OpenApi30::paths => ['/home' => [PathItem::description => 'description']]
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $OpenApi30->paths['/home']->description,
            message: 'REQUIRED. The available paths and operations for the API.'
        );
    }
}