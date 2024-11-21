<?php

namespace Tests\Unit\Tag;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Tag;

class NameTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18 */
    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$name` is required.');

        Tag::from();
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18 */
    #[Test] public function name_property(): void
    {
        $Tag = Tag::from([
            Tag::name => 'name',
        ]);

        $this->assertEquals(
            expected: 'name',
            actual: $Tag->name,
            message: 'REQUIRED. The name of the tag.'
        );
    }
}