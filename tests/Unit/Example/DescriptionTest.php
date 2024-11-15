<?php

namespace Tests\Unit\Example;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15 */
    #[Test] public function nullable(): void
    {
        $Example = Example::from();

        self::assertNull(
            actual: $Example->description,
            message: 'Long description for the example. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15 */
    #[Test] public function string(): void
    {
        $Example = Example::from([
            Example::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Example->description,
            message: 'Long description for the example. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}