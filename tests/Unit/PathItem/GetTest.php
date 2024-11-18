<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;

class GetTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->get,
            message: 'A definition of a GET operation on this path.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function get(): void
    {
        $PathItem = PathItem::from([
            PathItem::get => [Operation::responses => ['example1' => [Reference::ref => 'ref']]]
        ]);

        self::assertEquals(
            expected: 'ref',
            actual: $PathItem->get->responses['example1']->ref,
            message: 'A definition of a GET operation on this path.'
        );
    }
}