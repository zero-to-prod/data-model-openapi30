<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;

class StyleTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0 */
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->style,
            message: 'Describes how the header value will be serialized. The default (and only legal value for headers) is "simple".'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0 */
    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::style => 'simple',
        ]);

        self::assertEquals(
            expected: 'simple',
            actual: $Header->style,
            message: 'Describes how the header value will be serialized. The default (and only legal value for headers) is "simple".'
        );
    }
}