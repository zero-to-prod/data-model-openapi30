<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from();

        self::assertNull(
            actual: $Operation->description,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Operation->description,
            message: 'A verbose explanation of the operation behavior. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}