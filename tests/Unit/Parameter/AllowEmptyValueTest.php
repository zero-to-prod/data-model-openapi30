<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Parameter;

class AllowEmptyValueTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function default(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
        ]);

        self::assertFalse(
            condition: $Parameter->allowEmptyValue,
            message: 'Allows empty value',
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::allowEmptyValue => false
        ]);

        self::assertFalse(
            condition: $Parameter->allowEmptyValue,
            message: 'Allows empty value'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::allowEmptyValue => true
        ]);

        self::assertTrue(
            condition: $Parameter->allowEmptyValue,
            message: 'Allows empty value'
        );
    }
}