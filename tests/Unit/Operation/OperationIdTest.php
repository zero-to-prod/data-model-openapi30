<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;

class OperationIdTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from();

        self::assertNull(
            actual: $Operation->operationId,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::operationId => 'operationId',
        ]);

        self::assertEquals(
            expected: 'operationId',
            actual: $Operation->operationId,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}