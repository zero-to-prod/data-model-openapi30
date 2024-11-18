<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\PathItem;

class SummaryTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->summary,
            message: 'An optional string summary, intended to apply to all operations in this path.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function summary(): void
    {
        $PathItem = PathItem::from([
            PathItem::summary => '#/components/schemas/Pet'
        ]);

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $PathItem->summary,
            message: 'An optional string summary, intended to apply to all operations in this path.'
        );
    }
}