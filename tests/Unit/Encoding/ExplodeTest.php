<?php

namespace Tests\Unit\Encoding;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Encoding;

class ExplodeTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1 */
    #[Test] public function default(): void
    {
        $Encoding = Encoding::from();

        self::assertFalse(
            condition: $Encoding->explode,
            message: 'Specifies that the header is explode and SHOULD be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1 */
    #[Test] public function false(): void
    {
        $Encoding = Encoding::from([
            Encoding::explode => false
        ]);

        self::assertFalse(
            condition: $Encoding->explode,
            message: 'Specifies that the header is explode and SHOULD be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Encoding = Encoding::from([
            Encoding::explode => true
        ]);

        self::assertTrue(
            condition: $Encoding->explode,
            message: 'Specifies that the header is explode and SHOULD be transitioned out of usage. Default value is false.'
        );
    }
}