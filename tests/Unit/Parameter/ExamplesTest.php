<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\Parameter;
use Zerotoprod\DataModelOpenapi30\Reference;

class ExamplesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
        ]);

        self::assertEmpty(
            actual: $Parameter->examples,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function ref(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
            Parameter::examples => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Parameter->examples['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Parameter->examples['example1']->ref,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function example(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
            Parameter::examples => [
                'example1' => [
                    Example::value => 'value'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Example::class,
            actual: $Parameter->examples['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'value',
            actual: $Parameter->examples['example1']->value,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }
}