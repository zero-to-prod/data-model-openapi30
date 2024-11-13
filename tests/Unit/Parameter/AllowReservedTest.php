<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Parameter;

class AllowReservedTest extends TestCase
{

    /**
     * When this is `true`, parameter values are serialized using reserved expansion, as
     * defined by [RFC6570] Section 3.2.3, which allows RFC3986’s reserved character set,
     * as well as percent-encoded triples, to pass through unchanged, while still
     * percent-encoding all other disallowed characters (including `%` outside of
     * percent-encoded triples). Applications are still responsible for
     * percent-encoding reserved characters that are not allowed in the
     * query string (`[`, `]`, `#`), or have a special meaning in
     * `application/x-www-form-urlencoded` (`-`, `&`, `+`); see
     * Appendices C and E for details. This field only applies
     * to parameters with an `in` value of `query`. The
     * default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    #[Test] public function missing_allowReserved(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'in',
            Parameter::name => 'name'
        ]);

        self::assertFalse(
            condition: $Parameter->allowReserved,
            message: 'The default value is false.'
        );
    }

    #[Test] public function name_field(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'in',
            Parameter::name => 'name',
            Parameter::allowReserved => true
        ]);

        self::assertTrue(
            condition: $Parameter->allowReserved,
            message: 'The default value is false.'
        );
    }
}