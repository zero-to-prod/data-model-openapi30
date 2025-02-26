<?php

namespace Tests\Unit\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Components;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Schema;

class SchemasTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function nullable(): void
    {
        $Component = Components::from();

        self::assertEmpty(
            actual: $Component->schemas,
            message: 'An object to hold reusable Schema Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function ref(): void
    {
        $Component = Components::from([
            Components::schemas => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->schemas['example1'],
            message: 'An object to hold reusable Schema Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->schemas['example1']->ref,
            message: 'An object to hold reusable Schema Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5 */
    #[Test] public function example(): void
    {
        $Component = Components::from([
            Components::schemas => [
                'example1' => [
                    Schema::type => 'type'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Component->schemas['example1'],
            message: 'An object to hold reusable Schema Objects.'
        );

        self::assertEquals(
            expected: 'type',
            actual: $Component->schemas['example1']->type,
            message: 'An object to hold reusable Schema Objects.'
        );
    }
}