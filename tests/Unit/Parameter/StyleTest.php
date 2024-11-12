<?php

namespace Tests\Unit\Parameter;

use PhpParser\Node\Param;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Parameter;

class StyleTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function default_query(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'form',
            actual: $Parameter->style,
            message: 'Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for "query" - "form"; for "path" - "simple"; for "header" - "simple"; for "cookie" - "form".'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function default_path(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'path',
            Parameter::name => 'name',
            Parameter::required => true
        ]);

        self::assertEquals(
            expected: 'simple',
            actual: $Parameter->style,
            message: 'Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for "query" - "form"; for "path" - "simple"; for "header" - "simple"; for "cookie" - "form".'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function default_header(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'header',
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'simple',
            actual: $Parameter->style,
            message: 'Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for "query" - "form"; for "path" - "simple"; for "header" - "simple"; for "cookie" - "form".'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function default_cookie(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'cookie',
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'form',
            actual: $Parameter->style,
            message: 'Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for "query" - "form"; for "path" - "simple"; for "header" - "simple"; for "cookie" - "form".'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function overrides_default(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'cookie',
            Parameter::name => 'name',
            Parameter::style => 'override'
        ]);

        self::assertEquals(
            expected: 'override',
            actual: $Parameter->style,
            message: 'Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for "query" - "form"; for "path" - "simple"; for "header" - "simple"; for "cookie" - "form".'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function style(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'bogus',
            Parameter::name => 'name',
            Parameter::style => 'style'
        ]);

        self::assertEquals(
            expected: 'style',
            actual: $Parameter->style,
            message: 'Describes how the parameter value will be serialized depending on the type of the parameter value. Default values (based on value of in): for "query" - "form"; for "path" - "simple"; for "header" - "simple"; for "cookie" - "form".'
        );
    }
}