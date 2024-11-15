<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;

class ExampleTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default_example(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->example,
            message: 'Example of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function string_example(): void
    {
        $Header = Header::from([
            Header::example => 'example',
        ]);

        self::assertEquals(
            expected: 'example',
            actual: $Header->example,
            message: 'Example of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function bool_example(): void
    {
        $Header = Header::from([
            Header::example => true,
        ]);

        self::assertIsBool(
            actual: $Header->example,
            message: 'Example of the parameter’s potential value; see Working With Examples.'
        );
    }
}