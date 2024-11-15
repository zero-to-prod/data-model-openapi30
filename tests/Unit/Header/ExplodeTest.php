<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;

class ExplodeTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1 */
    #[Test] public function default(): void
    {
        $Header = Header::from();

        self::assertFalse(
            condition: $Header->explode,
            message: 'Specifies that the header is explode and SHOULD be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1 */
    #[Test] public function false(): void
    {
        $Header = Header::from([
            Header::explode => false
        ]);

        self::assertFalse(
            condition: $Header->explode,
            message: 'Specifies that the header is explode and SHOULD be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Header = Header::from([
            Header::explode => true
        ]);

        self::assertTrue(
            condition: $Header->explode,
            message: 'Specifies that the header is explode and SHOULD be transitioned out of usage. Default value is false.'
        );
    }
}