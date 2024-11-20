<?php

namespace Tests\Unit\Component;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\Component;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Response;

class ResponsesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Component::from([
            Component::responses => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->responses['example1'],
            message: 'An object to hold reusable Response Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->responses['example1']->ref,
            message: 'An object to hold reusable Response Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function response(): void
    {
        $Component = Component::from([
            Component::responses => [
                '200' => [
                    Response::description => 'description',
                    Response::content => [
                        'application/json' => [
                            MediaType::schema => [
                                Reference::ref => '#/components/schemas/Pet'
                            ]
                        ]
                    ]
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Response::class,
            actual: $Component->responses['200'],
            message: 'An object to hold reusable Response Objects.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Component->responses['200']->description,
            message: 'An object to hold reusable Response Objects.'
        );

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $Component->responses['200']->content['application/json']->schema->ref,
            message: 'An object to hold reusable Response Objects.'
        );
    }
}