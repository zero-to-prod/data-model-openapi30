<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->description,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Schema->description,
        );
    }
}