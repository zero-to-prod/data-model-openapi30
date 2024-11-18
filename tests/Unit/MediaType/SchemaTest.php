<?php

namespace Tests\Unit\MediaType;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Schema;

class SchemaTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function default_value(): void
    {
        $Media = MediaType::from();

        self::assertNull(
            actual: $Media->schema,
            message: 'The schema defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function reference(): void
    {
        $Media = MediaType::from([
            MediaType::schema => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Media->schema,
            message: 'The schema defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Media->schema->ref,
            message: 'The schema defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function schema(): void
    {
        $Media = MediaType::from([
            MediaType::schema => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Media->schema,
            message: 'The schema defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Media->schema->example,
            message: 'The schema defining the type used for the parameter.'
        );
    }

}