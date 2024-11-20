<?php

namespace Tests\Unit\Link;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Link;

class OperationIdTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function nullable(): void
    {
        $Link = Link::from();

        self::assertNull(
            actual: $Link->operationId,
            message: 'A URI reference to an OAS operation. This field is mutually exclusive of the operationId field, and _MUST_ point to an Operation Object.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function string(): void
    {
        $Link = Link::from([
            Link::operationId => 'operationId',
        ]);

        self::assertEquals(
            expected: 'operationId',
            actual: $Link->operationId,
            message: 'A URI reference to an OAS operation. This field is mutually exclusive of the operationId field, and _MUST_ point to an Operation Object.'
        );
    }
}