<?php

namespace Tests\Unit\Encoding;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Encoding;
use Zerotoprod\DataModelOpenapi30\Header;
use Zerotoprod\DataModelOpenapi30\Reference;

class HeadersTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0 */
    #[Test] public function default_value(): void
    {
        $Encoding = Encoding::from();

        self::assertNull(
            actual: $Encoding->headers,
            message: 'The headers defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0 */
    #[Test] public function reference(): void
    {
        $Encoding = Encoding::from([
            Encoding::headers => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Encoding->headers,
            message: 'The headers defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Encoding->headers->ref,
            message: 'The headers defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0 */
    #[Test] public function headers(): void
    {
        $Encoding = Encoding::from([
            Encoding::headers => [
                Header::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Header::class,
            actual: $Encoding->headers,
            message: 'The headers defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Encoding->headers->example,
            message: 'The headers defining the type used for the parameter.'
        );
    }

}