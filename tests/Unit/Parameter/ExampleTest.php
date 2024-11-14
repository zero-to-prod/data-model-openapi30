<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Parameter;

class ExampleTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default_example(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
        ]);

        self::assertNull(
            actual: $Parameter->example,
            message: 'A free-form field to include an example of an instance for this schema.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function string_example(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
            Parameter::example => 'example',
        ]);

        self::assertEquals(
            expected: 'example',
            actual: $Parameter->example,
            message: 'A free-form field to include an example of an instance for this schema.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function bool_example(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
            Parameter::example => true,
        ]);

        self::assertIsBool(
            actual: $Parameter->example,
            message: 'A free-form field to include an example of an instance for this schema.'
        );
    }
}