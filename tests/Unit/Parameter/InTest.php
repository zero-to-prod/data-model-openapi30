<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Parameter;

class InTest extends TestCase
{

    /**
     *  **REQUIRED**. The location of the parameter.
     * Possible values are "query", "header", "path" or "cookie".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Test] public function missing_in(): void
    {
        $this->expectException(PropertyRequiredException::class, '');
        $this->expectExceptionMessage('Property `$in` is required.');

        Parameter::from([
            Parameter::name => 'name'
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function name_field(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'query',
            actual: $Parameter->in,
            message: 'The location of the parameter. Possible values are "query", "header", "path" or "cookie"'
        );
    }
}