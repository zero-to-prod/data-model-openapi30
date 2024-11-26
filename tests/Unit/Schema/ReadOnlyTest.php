<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class ReadOnlyTest extends TestCase
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
            Schema::readOnly => false,
            Schema::writeOnly => false,
        ]);

        self::assertFalse(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::readOnly => true,
            Schema::writeOnly => false,
        ]);

        self::assertTrue(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }
}