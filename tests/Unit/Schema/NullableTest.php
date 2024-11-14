<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class NullableTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->nullable,
            message: 'The default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::nullable => false,
        ]);

        self::assertFalse(
            condition: $Schema->nullable,
            message: 'The default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::nullable => true,
        ]);

        self::assertTrue(
            condition: $Schema->nullable,
            message: 'The default value is false.'
        );
    }
}