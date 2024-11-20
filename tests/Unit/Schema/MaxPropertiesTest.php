<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidMaxItemsException;
use Zerotoprod\DataModelOpenapi30\InvalidMaxPropertiesException;
use Zerotoprod\DataModelOpenapi30\Schema;

class MaxPropertiesTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->maxProperties,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::maxProperties => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maxProperties,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::maxProperties => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->maxProperties,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::maxProperties => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->maxProperties,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function non_zero(): void
    {
        $this->expectException(InvalidMaxPropertiesException::class);

        Schema::from([
            Schema::maxProperties => -1,
        ]);
    }
}