<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidMultipleException;
use Zerotoprod\DataModelOpenapi30\Schema;

class MultipleOfTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->multipleOf,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function int(): void
    {
        $Schema = Schema::from([
            Schema::multipleOf => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Schema->multipleOf,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function float(): void
    {
        $Schema = Schema::from([
            Schema::multipleOf => 1.0,
        ]);

        self::assertEquals(
            expected: 1.0,
            actual: $Schema->multipleOf,
        );
    }


    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function zero(): void
    {
        $this->expectException(InvalidMultipleException::class);

        Schema::from([
            Schema::multipleOf => 0,
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function non_zero(): void
    {
        $this->expectException(InvalidMultipleException::class);

        Schema::from([
            Schema::multipleOf => -1,
        ]);
    }
}