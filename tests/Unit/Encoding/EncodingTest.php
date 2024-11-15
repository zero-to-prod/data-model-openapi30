<?php

namespace Tests\Unit\Encoding;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Encoding;

class EncodingTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0 */
    #[Test] public function nullable(): void
    {
        $Encoding = Encoding::from();

        self::assertNull(
            actual: $Encoding->contentType,
            message: 'The Content-Type for encoding a specific property. The value is a comma-separated list, each element of which is either a specific media type (e.g. image/png) or a wildcard media type (e.g. image/*). Default value depends on the property type as shown in the table below.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0 */
    #[Test] public function string(): void
    {
        $Encoding = Encoding::from([
            Encoding::contentType => 'contentType',
        ]);

        self::assertEquals(
            expected: 'contentType',
            actual: $Encoding->contentType,
            message: 'The Content-Type for encoding a specific property. The value is a comma-separated list, each element of which is either a specific media type (e.g. image/png) or a wildcard media type (e.g. image/*). Default value depends on the property type as shown in the table below.'
        );
    }
}