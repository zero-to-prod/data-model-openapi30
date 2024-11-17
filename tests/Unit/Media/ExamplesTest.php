<?php

namespace Tests\Unit\Media;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\Media;
use Zerotoprod\DataModelOpenapi30\Reference;

class ExamplesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function nullable(): void
    {
        $Media = Media::from();

        self::assertNull(
            actual: $Media->examples,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function ref(): void
    {
        $Media = Media::from([
            Media::examples => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Media->examples['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Media->examples['example1']->ref,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function example(): void
    {
        $Media = Media::from([
            Media::examples => [
                'example1' => [
                    Example::value => 'value'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Example::class,
            actual: $Media->examples['example1'],
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );

        self::assertEquals(
            expected: 'value',
            actual: $Media->examples['example1']->value,
            message: 'Examples of the parameter’s potential value; see Working With Examples.'
        );
    }
}