<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;

class HeadTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->head,
            message: 'A definition of a HEAD operation on this path.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function head(): void
    {
        $PathItem = PathItem::from([
            PathItem::head => [Operation::responses => ['example1' => [Reference::ref => 'ref']]]
        ]);

        self::assertEquals(
            expected: 'ref',
            actual: $PathItem->head->responses['example1']->ref,
            message: 'A definition of a HEAD operation on this path.'
        );
    }
}