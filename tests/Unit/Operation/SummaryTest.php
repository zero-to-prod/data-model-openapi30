<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\Reference;

class SummaryTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertNull(
            actual: $Operation->summary,
            message: 'A short summary of what the operation does.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::summary => 'summary',
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertEquals(
            expected: 'summary',
            actual: $Operation->summary,
            message: 'A short summary of what the operation does.'
        );
    }
}