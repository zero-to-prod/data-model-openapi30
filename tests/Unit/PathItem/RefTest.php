<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\PathItem;

class RefTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertNull(
            actual: $PathItem->ref,
            message: 'Allows for a referenced definition of this path item.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6 */
    #[Test] public function ref(): void
    {
        $PathItem = PathItem::from([
            PathItem::ref => '#/components/schemas/Pet'
        ]);

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $PathItem->ref,
            message: 'Allows for a referenced definition of this path item.'
        );
    }
}