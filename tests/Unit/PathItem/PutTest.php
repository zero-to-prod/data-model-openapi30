<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;

class PutTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->put,
            message: 'A definition of a PUT operation on this path.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function put(): void
    {
        $PathItem = PathItem::from([
            PathItem::put => [Operation::responses => ['example1' => [Reference::ref => 'ref']]]
        ]);

        self::assertEquals(
            expected: 'ref',
            actual: $PathItem->put->responses['example1']->ref,
            message: 'A definition of a PUT operation on this path.'
        );
    }
}