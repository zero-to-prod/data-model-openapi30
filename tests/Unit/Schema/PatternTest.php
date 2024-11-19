<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidPatternException;
use Zerotoprod\DataModelOpenapi30\Schema;

class PatternTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->pattern,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function invalid_pattern(): void
    {
        $this->expectException(InvalidPatternException::class);

        Schema::from([
            Schema::pattern => '////',
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::pattern => '/(?<=a)b/',
        ]);

        self::assertEquals(
            expected: '/(?<=a)b/',
            actual: $Schema->pattern,
        );
    }
}