<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;

class DescriptionTest extends TestCase
{
    /** @link DescriptionTest.php */
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->description,
            message: 'A brief description of the header. This could contain examples of use. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link DescriptionTest.php */
    #[Test] public function string(): void
    {
        $Header = Header::from([
            Header::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Header->description,
            message: 'A brief description of the header. This could contain examples of use. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}