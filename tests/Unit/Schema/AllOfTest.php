<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;
use Zerotoprod\DataModelOpenapi30\Reference;

class AllOfTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function default_value(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->allOf,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function reference(): void
    {
        $Schema = Schema::from([
            Schema::allOf => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Schema->allOf,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Schema->allOf->ref,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function schema(): void
    {
        $Schema = Schema::from([
            Schema::allOf => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Schema->allOf,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Schema->allOf->example,
            message: 'Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.'
        );
    }

}