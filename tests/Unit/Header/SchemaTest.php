<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Schema;

class SchemaTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function default_value(): void
    {
        $Header = Header::from();

        self::assertNull(
            actual: $Header->schema,
            message: 'The schema defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function reference(): void
    {
        $Header = Header::from([
            Header::schema => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Header->schema,
            message: 'The schema defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Header->schema->ref,
            message: 'The schema defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function schema(): void
    {
        $Header = Header::from([
            Header::style => 'form',
            Header::schema => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Header->schema,
            message: 'The schema defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Header->schema->example,
            message: 'The schema defining the type used for the parameter.'
        );
    }

}