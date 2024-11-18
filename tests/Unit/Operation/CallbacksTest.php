<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;

class CallbacksTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from([
            Operation::responses => ['example1' => [Reference::ref => 'ref']],
        ]);

        self::assertNull(
            actual: $Operation->callbacks,
            message: 'A map of possible out-of band callbacks related to the parent operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function ref(): void
    {
        $Operation = Operation::from([
            Operation::responses => ['example1' => [Reference::ref => 'ref']],
            Operation::callbacks => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Operation->responses['example1'],
            message: 'A map of possible out-of band callbacks related to the parent operation.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Operation->responses['example1']->ref,
            message: 'A map of possible out-of band callbacks related to the parent operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function callbacks(): void
    {
        $Operation = Operation::from([
            Operation::responses => ['example1' => [Reference::ref => 'ref']],
            Operation::callbacks => [
                '200' => [
                    'callback' => [
                        PathItem::description => 'description',
                    ]
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: PathItem::class,
            actual: $Operation->callbacks['200']['callback'],
            message: 'A map of possible out-of band callbacks related to the parent operation.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Operation->callbacks['200']['callback']->description,
            message: 'A map of possible out-of band callbacks related to the parent operation.'
        );
    }
}