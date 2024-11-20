<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidEnumException;
use Zerotoprod\DataModelOpenapi30\Schema;

class EnumTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->enum,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::enum => ['1'],
        ]);

        self::assertEquals(
            expected: ['1'],
            actual: $Schema->enum,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function empty_array(): void
    {
        $this->expectException(InvalidEnumException::class);

        Schema::from([
            Schema::enum => [],
        ]);
    }
}