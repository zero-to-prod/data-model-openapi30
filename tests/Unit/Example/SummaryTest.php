<?php

namespace Tests\Unit\Example;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;

class SummaryTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15 */
    #[Test] public function nullable(): void
    {
        $Example = Example::from();

        self::assertNull(
            actual: $Example->summary,
            message: 'Short description for the example.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15 */
    #[Test] public function string(): void
    {
        $Example = Example::from([
            Example::summary => 'summary',
        ]);

        self::assertEquals(
            expected: 'summary',
            actual: $Example->summary,
            message: 'Short description for the example.'
        );
    }
}