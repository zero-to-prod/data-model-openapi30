<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidInValueException;
use Zerotoprod\DataModelOpenapi30\Parameter;

class RequiredTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function default(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name'
        ]);

        self::assertFalse(
            condition: $Parameter->required,
            message: 'Determines whether this parameter is mandatory. If the parameter location is "path", this field is REQUIRED and its value _MUST_ be true. Otherwise, the field _MAY_ be included and its default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::required => false
        ]);

        self::assertFalse(
            condition: $Parameter->required,
            message: 'Determines whether this parameter is mandatory. If the parameter location is "path", this field is REQUIRED and its value _MUST_ be true. Otherwise, the field _MAY_ be included and its default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::required => true
        ]);

        self::assertTrue(
            condition: $Parameter->required,
            message: 'Determines whether this parameter is mandatory. If the parameter location is "path", this field is REQUIRED and its value _MUST_ be true. Otherwise, the field _MAY_ be included and its default value is false.'
        );
    }

    /**
     * Determines whether this parameter is mandatory. If the parameter
     * location is "path", this field is REQUIRED and its value MUST
     * be true. Otherwise, the field _MAY_ be included and its default
     * value is false.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Test] public function name_field(): void
    {
        $this->expectException(InvalidInValueException::class);

        Parameter::from([
            Parameter::in => 'path',
            Parameter::name => 'name',
            Parameter::required => false
        ]);
    }
}