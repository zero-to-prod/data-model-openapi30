<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class WriteOnlyTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::writeOnly => false,
            Schema::readOnly => false,
        ]);

        self::assertFalse(
            condition: $Schema->writeOnly,
            message: 'Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::writeOnly => true,
            Schema::readOnly => false,
        ]);

        self::assertTrue(
            condition: $Schema->writeOnly,
            message: 'Default value is false.'
        );
    }
}