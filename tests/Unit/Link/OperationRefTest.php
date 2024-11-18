<?php

namespace Tests\Unit\Link;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Link;

class OperationRefTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function nullable(): void
    {
        $Link = Link::from();

        self::assertNull(
            actual: $Link->operationRef,
            message: 'A URI reference to an OAS operation. This field is mutually exclusive of the operationId field, and MUST point to an Operation Object.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function string(): void
    {
        $Link = Link::from([
            Link::operationRef => 'operationRef',
        ]);

        self::assertEquals(
            expected: 'operationRef',
            actual: $Link->operationRef,
            message: 'A URI reference to an OAS operation. This field is mutually exclusive of the operationId field, and MUST point to an Operation Object.'
        );
    }
}