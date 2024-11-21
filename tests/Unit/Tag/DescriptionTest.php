<?php

namespace Tests\Unit\Tag;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Tag;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18 */
    #[Test] public function nullable(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
        ]);

        self::assertNull(
            actual: $Tag->description,
            message: 'A description for the tag. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18 */
    #[Test] public function string(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
            Tag::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Tag->description,
            message: 'A description for the tag. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}