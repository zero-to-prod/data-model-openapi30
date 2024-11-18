<?php

namespace Tests\Unit\MediaType;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\MediaType;

class ExampleTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function default_example(): void
    {
        $Media = MediaType::from();

        self::assertNull(
            actual: $Media->example,
            message: 'Example of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function string_example(): void
    {
        $Media = MediaType::from([
            MediaType::example => 'example',
        ]);

        self::assertEquals(
            expected: 'example',
            actual: $Media->example,
            message: 'Example of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function bool_example(): void
    {
        $Media = MediaType::from([
            MediaType::example => true,
        ]);

        self::assertIsBool(
            actual: $Media->example,
            message: 'Example of the parameter’s potential value; see Working With Examples.'
        );
    }
}