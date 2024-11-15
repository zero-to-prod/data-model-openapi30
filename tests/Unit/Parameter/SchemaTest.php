<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Parameter;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Schema;

class SchemaTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function default_value(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::style => 'form'
        ]);

        self::assertNull(
            actual: $Parameter->schema,
            message: 'The schema defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function reference(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::style => 'form',
            Parameter::schema => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Parameter->schema,
            message: 'The schema defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Parameter->schema->ref,
            message: 'The schema defining the type used for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function schema(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::style => 'form',
            Parameter::schema => [
                Schema::example => 'example'
            ]
        ]);

        self::assertInstanceOf(
            expected: Schema::class,
            actual: $Parameter->schema,
            message: 'The schema defining the type used for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Parameter->schema->example,
            message: 'The schema defining the type used for the parameter.'
        );
    }

}