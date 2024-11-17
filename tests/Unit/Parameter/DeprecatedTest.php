<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Parameter;

class DeprecatedTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function default(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
        ]);

        self::assertFalse(
            condition: $Parameter->deprecated,
            message: 'Specifies that a parameter is deprecated and _SHOULD_ be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function false(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::deprecated => false
        ]);

        self::assertFalse(
            condition: $Parameter->deprecated,
            message: 'Specifies that a parameter is deprecated and _SHOULD_ be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::deprecated => true
        ]);

        self::assertTrue(
            condition: $Parameter->deprecated,
            message: 'Specifies that a parameter is deprecated and _SHOULD_ be transitioned out of usage. Default value is false.'
        );
    }
}