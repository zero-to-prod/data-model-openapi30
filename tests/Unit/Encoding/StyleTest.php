<?php

namespace Tests\Unit\Encoding;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Encoding;

class StyleTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-rfc6570-style-serialization */
    #[Test] public function nullable(): void
    {
        $Encoding = Encoding::from();

        self::assertNull(
            actual: $Encoding->style,
            message: 'Describes how a specific property value will be serialized depending on its type. See Parameter Object for details on the style field. The behavior follows the same values as query parameters, including default values. Note that the initial ? used in query strings is not used in application/x-www-form-urlencoded message bodies, and MUST be removed (if using an RFC6570 implementation) or simply not added (if constructing the string manually). This field _SHALL_ be ignored if the request body media type is not application/x-www-form-urlencoded.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-rfc6570-style-serialization */
    #[Test] public function string(): void
    {
        $Encoding = Encoding::from([
            Encoding::style => 'simple',
        ]);

        self::assertEquals(
            expected: 'simple',
            actual: $Encoding->style,
            message: 'Describes how a specific property value will be serialized depending on its type. See Parameter Object for details on the style field. The behavior follows the same values as query parameters, including default values. Note that the initial ? used in query strings is not used in application/x-www-form-urlencoded message bodies, and MUST be removed (if using an RFC6570 implementation) or simply not added (if constructing the string manually). This field _SHALL_ be ignored if the request body media type is not application/x-www-form-urlencoded.'
        );
    }
}