<?php

namespace Tests\Unit\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Components;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;

class CallbacksTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function nullable(): void
    {
        $Component = Components::from();

        self::assertEmpty(
            actual: $Component->callbacks,
            message: 'An object to hold reusable Callback Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function ref(): void
    {
        $Component = Components::from([
            Components::callbacks => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->callbacks['example1'],
            message: 'An object to hold reusable Callback Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->callbacks['example1']->ref,
            message: 'An object to hold reusable Callback Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function callbacks(): void
    {
        $Component = Components::from([
            Components::callbacks => [
                '200' => [
                    'callback' => [
                        PathItem::description => 'description',
                    ]
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: PathItem::class,
            actual: $Component->callbacks['200']['callback'],
            message: 'An object to hold reusable Callback Objects.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Component->callbacks['200']['callback']->description,
            message: 'An object to hold reusable Callback Objects.'
        );
    }
}