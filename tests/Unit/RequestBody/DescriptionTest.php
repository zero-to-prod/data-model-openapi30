<?php

namespace Tests\Unit\RequestBody;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\RequestBody;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function nullable(): void
    {
        $RequestBody = RequestBody::from([
            RequestBody::content => []
        ]);

        self::assertNull(
            actual: $RequestBody->description,
            message: 'A brief description of the request body. This could contain examples of use. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function string(): void
    {
        $RequestBody = RequestBody::from([
            RequestBody::content => [],
            RequestBody::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $RequestBody->description,
            message: 'A brief description of the request body. This could contain examples of use. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}