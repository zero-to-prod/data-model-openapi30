<?php

namespace Tests\Unit\Component;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\Component;
use Zerotoprod\DataModelOpenapi30\Reference;

class ExamplesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function nullable(): void
    {
        $Component = Component::from();

        self::assertNull(
            actual: $Component->schemas,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function ref(): void
    {
        $Component = Component::from([
            Component::schemas => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->schemas['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->schemas['example1']->ref,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function example(): void
    {
        $Component = Component::from([
            Component::schemas => [
                'example1' => [
                    Example::value => 'value'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Example::class,
            actual: $Component->schemas['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'value',
            actual: $Component->schemas['example1']->value,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }
}