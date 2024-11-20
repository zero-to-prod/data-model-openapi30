<?php

namespace Tests\Unit\Component;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Component;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\RequestBody;

class RequestBodiesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function nullable(): void
    {
        $Component = Component::from();

        self::assertNull(
            actual: $Component->requestBodies,
            message: 'An object to hold reusable Request Body Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Component::from([
            Component::requestBodies => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->requestBodies['example1'],
            message: 'An object to hold reusable Request Body Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->requestBodies['example1']->ref,
            message: 'An object to hold reusable Request Body Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function example(): void
    {
        $Component = Component::from([
            Component::requestBodies => [
                'example1' => [
                    RequestBody::content => [
                        'content1' => [
                            MediaType::example => 'example'
                        ]
                    ],
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: RequestBody::class,
            actual: $Component->requestBodies['example1'],
            message: 'An object to hold reusable Request Body Objects.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Component->requestBodies['example1']->content['content1']->example,
            message: 'An object to hold reusable Request Body Objects.'
        );
    }
}