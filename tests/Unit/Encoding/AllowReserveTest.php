<?php

namespace Tests\Unit\Encoding;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Encoding;

class AllowReserveTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-rfc6570-style-serialization */
    #[Test] public function default(): void
    {
        $Encoding = Encoding::from();

        self::assertFalse(
            condition: $Encoding->allowReserved,
            message: 'The default value is false.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-rfc6570-style-serialization */
    #[Test] public function false(): void
    {
        $Encoding = Encoding::from([
            Encoding::allowReserved => false
        ]);

        self::assertFalse(
            condition: $Encoding->allowReserved,
            message: 'The default value is false.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-rfc6570-style-serialization */
    #[Test] public function true(): void
    {
        $Encoding = Encoding::from([
            Encoding::allowReserved => true
        ]);

        self::assertTrue(
            condition: $Encoding->allowReserved,
            message: 'The default value is false.'
        );
    }
}