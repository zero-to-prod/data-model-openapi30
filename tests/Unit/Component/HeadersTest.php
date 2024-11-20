<?php

namespace Tests\Unit\Component;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Component;
use Zerotoprod\DataModelOpenapi30\Example;
use Zerotoprod\DataModelOpenapi30\Header;
use Zerotoprod\DataModelOpenapi30\Reference;

class HeadersTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function nullable(): void
    {
        $Component = Component::from();

        self::assertNull(
            actual: $Component->headers,
            message: 'An object to hold reusable Header Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Component::from([
            Component::headers => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->headers['example1'],
            message: 'An object to hold reusable Header Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->headers['example1']->ref,
            message: 'An object to hold reusable Header Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function header(): void
    {
        $Component = Component::from([
            Component::headers => [
                'example1' => [
                    Header::description => 'description'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Header::class,
            actual: $Component->headers['example1'],
            message: 'An object to hold reusable Header Objects.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Component->headers['example1']->description,
            message: 'An object to hold reusable Header Objects.'
        );
    }
}