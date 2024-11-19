<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidMaxLengthException;
use Zerotoprod\DataModelOpenapi30\Schema;

class MinLengthTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->minLength,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::minLength => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minLength,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::minLength => 1.0,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->minLength,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function zero(): void
    {
        $Schema = Schema::from([
            Schema::minLength => 0,
        ]);

        self::assertEquals(
            expected: 0,
            actual: $Schema->minLength,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function non_zero(): void
    {
        $this->expectException(InvalidMaxLengthException::class);

        Schema::from([
            Schema::minLength => -1,
        ]);
    }
}