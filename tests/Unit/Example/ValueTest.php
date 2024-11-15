<?php

namespace Tests\Unit\Example;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\MustBeExclusiveException;

class ValueTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15 */
    #[Test] public function nullable(): void
    {
        $Example = Example::from();

        self::assertNull(
            actual: $Example->value,
            message: 'Embedded literal example. The value field and externalValue field are mutually exclusive. To represent examples of media types that cannot naturally represented in JSON or YAML, use a string value to contain the example, escaping where necessary.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15 */
    #[Test] public function string(): void
    {
        $Example = Example::from([
            Example::value => 'value',
        ]);

        self::assertEquals(
            expected: 'value',
            actual: $Example->value,
            message: 'Embedded literal example. The value field and externalValue field are mutually exclusive. To represent examples of media types that cannot naturally represented in JSON or YAML, use a string value to contain the example, escaping where necessary.'
        );
    }

    /**
     * Embedded literal example. The `value` field and `externalValue` field
     * are mutually exclusive. To represent examples of media types that
     * cannot naturally represented in JSON or YAML, use a string value
     * to contain the example, escaping where necessary.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    #[Test] public function must_be_exclusive(): void
    {
        $this->expectException(MustBeExclusiveException::class);
        Example::from([
            Example::value => 'value',
            Example::externalValue => 'externalValue',
        ]);
    }
}