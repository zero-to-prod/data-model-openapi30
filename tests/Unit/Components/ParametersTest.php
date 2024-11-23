<?php

namespace Tests\Unit\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Components;
use Zerotoprod\DataModelOpenapi30\Parameter;
use Zerotoprod\DataModelOpenapi30\Reference;

class ParametersTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function nullable(): void
    {
        $Component = Components::from();

        self::assertEmpty(
            actual: $Component->parameters,
            message: 'An object to hold reusable Parameter Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Components::from([
            Components::parameters => [
                'param' => [
                    Reference::ref => 'ref'
                ]
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->parameters['param'],
            message: 'An object to hold reusable Parameter Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->parameters['param']->ref,
            message: 'An object to hold reusable Parameter Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function parameter(): void
    {
        $Component = Components::from([
            Components::parameters => [
                'param' =>[
                    Parameter::name => 'name',
                    Parameter::in => 'in',
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Parameter::class,
            actual: $Component->parameters['param'],
            message: 'An object to hold reusable Parameter Objects.'
        );

        self::assertEquals(
            expected: 'name',
            actual: $Component->parameters['param']->name,
            message: 'An object to hold reusable Parameter Objects.'
        );
    }
}