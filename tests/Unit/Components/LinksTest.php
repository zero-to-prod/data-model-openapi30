<?php

namespace Tests\Unit\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Components;
use Zerotoprod\DataModelOpenapi30\Link;
use Zerotoprod\DataModelOpenapi30\Reference;

class LinksTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function nullable(): void
    {
        $Component = Components::from();

        self::assertEmpty(
            actual: $Component->links,
            message: 'An object to hold reusable Link Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Components::from([
            Components::links => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->links['example1'],
            message: 'An object to hold reusable Link Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->links['example1']->ref,
            message: 'An object to hold reusable Link Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function example(): void
    {
        $Component = Components::from([
            Components::links => [
                'example1' => [
                    Link::description => 'description'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Link::class,
            actual: $Component->links['example1'],
            message: 'An object to hold reusable Link Objects.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Component->links['example1']->description,
            message: 'An object to hold reusable Link Objects.'
        );
    }
}