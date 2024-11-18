<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;

class PatchTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->patch,
            message: 'A definition of a PATCH operation on this path.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function patch(): void
    {
        $PathItem = PathItem::from([
            PathItem::patch => [Operation::responses => ['example1' => [Reference::ref => 'ref']]]
        ]);

        self::assertEquals(
            expected: 'ref',
            actual: $PathItem->patch->responses['example1']->ref,
            message: 'A definition of a PATCH operation on this path.'
        );
    }
}