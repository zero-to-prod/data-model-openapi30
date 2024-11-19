<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class ExclusiveMinimumTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->exclusiveMinimum,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMinimum => false,
        ]);

        self::assertFalse(
            condition: $Schema->exclusiveMinimum,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMinimum => true,
        ]);

        self::assertTrue(
            condition: $Schema->exclusiveMinimum,
        );
    }
}