<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class ExclusiveMaximumTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->exclusiveMaximum,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMaximum => false,
        ]);

        self::assertFalse(
            condition: $Schema->exclusiveMaximum,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::exclusiveMaximum => true,
        ]);

        self::assertTrue(
            condition: $Schema->exclusiveMaximum,
        );
    }
}