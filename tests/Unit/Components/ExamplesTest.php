<?php

namespace Tests\Unit\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Components;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\Reference;

class ExamplesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function nullable(): void
    {
        $Component = Components::from();

        self::assertNull(
            actual: $Component->examples,
            message: 'An object to hold reusable Example Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Components::from([
            Components::examples => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->examples['example1'],
            message: 'An object to hold reusable Example Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->examples['example1']->ref,
            message: 'An object to hold reusable Example Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function example(): void
    {
        $Component = Components::from([
            Components::examples => [
                'example1' => [
                    Example::value => 'value'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Example::class,
            actual: $Component->examples['example1'],
            message: 'An object to hold reusable Example Objects.'
        );

        self::assertEquals(
            expected: 'value',
            actual: $Component->examples['example1']->value,
            message: 'An object to hold reusable Example Objects.'
        );
    }
}