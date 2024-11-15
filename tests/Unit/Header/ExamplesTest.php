<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\Header;
use Zerotoprod\DataModelOpenapi30\Reference;

class ExamplesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function nullable(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->examples,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function ref(): void
    {
        $Header = Header::from([
            Header::examples => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Header->examples['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Header->examples['example1']->ref,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function example(): void
    {
        $Header = Header::from([
            Header::examples => [
                'example1' => [
                    Example::value => 'value'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Example::class,
            actual: $Header->examples['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'value',
            actual: $Header->examples['example1']->value,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }
}