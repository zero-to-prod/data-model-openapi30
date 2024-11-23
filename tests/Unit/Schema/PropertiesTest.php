<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Schema;

class PropertiesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function default_value(): void
    {
        $Schema = Schema::from();

        self::assertEmpty(
            actual: $Schema->properties,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::properties => [
                'property1' => [
                    Reference::ref => 'ref'
                ]
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Schema->properties['property1'],
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Schema->properties['property1']->ref,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::properties => [
                'property1' => [
                    Schema::example => 'example'
                ]
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->properties['property1'],
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->properties['property1']->example,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

}