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

        self::assertNull(
            actual: $Schema->properties,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::properties => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Schema->properties,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Schema->properties->ref,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::properties => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->properties,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->properties->example,
            message: 'Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).'
        );
    }

}