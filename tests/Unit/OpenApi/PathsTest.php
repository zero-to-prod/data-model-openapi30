<?php

namespace Tests\Unit\OpenApi;

use Factories\InfoFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\OpenApi;
use Zerotoprod\DataModelOpenapi30\PathItem;

class PathsTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function missing(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$paths` is required.');
        OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function paths(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::paths => ['/home' => [PathItem::description => 'description']]
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $OpenApi->paths['/home']->description,
            message: 'REQUIRED. The available paths and operations for the API.'
        );
    }
}