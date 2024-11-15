<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidInValueException;
use Zerotoprod\DataModelOpenapi30\Header;

class RequiredTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1 */
    #[Test] public function default(): void
    {
        $Header = Header::from();

        self::assertFalse(
            condition: $Header->required,
            message: 'Determines whether this header is mandatory. The default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1 */
    #[Test] public function false(): void
    {
        $Header = Header::from([
            Header::required => false
        ]);

        self::assertFalse(
            condition: $Header->required,
            message: 'Determines whether this header is mandatory. The default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Header = Header::from([
            Header::required => true
        ]);

        self::assertTrue(
            condition: $Header->required,
            message: 'Determines whether this header is mandatory. The default value is false.'
        );
    }
}