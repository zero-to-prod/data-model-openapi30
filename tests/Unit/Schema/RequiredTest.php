<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidRequiredException;
use Zerotoprod\DataModelOpenapi30\Schema;

class RequiredTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function nullable(): void
    {
        $Schema = Schema::from();

        self::assertEmpty(
            actual: $Schema->required,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function string(): void
    {
        $Schema = Schema::from([
            Schema::required => ['1'],
        ]);

        self::assertEquals(
            expected: ['1'],
            actual: $Schema->required,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function empty_array(): void
    {
        $this->expectException(InvalidRequiredException::class);

        Schema::from([
            Schema::required => [],
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function not_string(): void
    {
        $this->expectException(InvalidRequiredException::class);

        Schema::from([
            Schema::required => [1],
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords */
    #[Test] public function all_strings(): void
    {
        $this->expectException(InvalidRequiredException::class);

        Schema::from([
            Schema::required => ['1', 1],
        ]);
    }
}