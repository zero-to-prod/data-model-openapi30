<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Response;

class HeadersTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function default_value(): void
    {
        $Response = Response::from();

        self::assertNull(
            actual: $Response->headers,
            message: 'Maps a header name to its definition.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function reference(): void
    {
        $Response = Response::from([
            Response::headers => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Response->headers,
            message: 'Maps a header name to its definition.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Response->headers->ref,
            message: 'Maps a header name to its definition.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function headers(): void
    {
        $Response = Response::from([
            Response::headers => [
                Header::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Header::class,
            actual: $Response->headers,
            message: 'Maps a header name to its definition.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Response->headers->example,
            message: 'Maps a header name to its definition.'
        );
    }

}