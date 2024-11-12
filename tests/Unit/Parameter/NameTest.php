<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Parameter;

class NameTest extends TestCase
{

    /**
     *  **REQUIRED**. The name of the parameter. Parameter names are case sensitive.
     *
     *  - If `in` is `"path"`, the name field ***MUST*** correspond to a template expression
     *  occurring within the path field in the Paths Object. See Path Templating
     *  for further information.
     *  - If `in` is `"header"` and the name field is `"Accept"`, `"Content-Type"` or
     *  `"Authorization"`, the parameter definition ***SHALL*** be ignored.
     *  - For all other cases, the `name` corresponds to the parameter name used
     *  by the `in` field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Test] public function missing_name(): void
    {
        $this->expectException(PropertyRequiredException::class, '');
        $this->expectExceptionMessage('Property `$name` is required.');

        Parameter::from([
            Parameter::in => 'in'
        ]);
    }

    /**
     *  **REQUIRED**. The name of the parameter. Parameter names are case sensitive.
     *
     *  - If `in` is `"path"`, the name field ***MUST*** correspond to a template expression
     *  occurring within the path field in the Paths Object. See Path Templating
     *  for further information.
     *  - If `in` is `"header"` and the name field is `"Accept"`, `"Content-Type"` or
     *  `"Authorization"`, the parameter definition ***SHALL*** be ignored.
     *  - For all other cases, the `name` corresponds to the parameter name used
     *  by the `in` field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Test] public function name_field(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'in',
            Parameter::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $Parameter->name,
            message: 'The name of the parameter.'
        );
    }
}