<?php

namespace Tests\Unit\Link;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Link;

class RequestBodyTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function nullable(): void
    {
        $Link = Link::from();

        self::assertNull(
            actual: $Link->requestBody,
            message: 'A literal value or {expression} to use as a request body when calling the target operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function string(): void
    {
        $Link = Link::from([
            Link::requestBody => 1,
        ]);

        self::assertEquals(
            expected: 1,
            actual: $Link->requestBody,
            message: 'A literal value or {expression} to use as a request body when calling the target operation.'
        );
    }
}