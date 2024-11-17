<?php

namespace Tests\Unit\ServerVariable;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class EnumTest extends TestCase
{

    /** https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4 */
    #[Test] public function enum(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['default'],
            ServerVariable::default => 'default',
        ]);

        self::assertEquals(
            expected: 'default',
            actual: $ServerVariable->enum[0],
            message: 'An enumeration of string values to be used if the substitution options are from a limited set. The array _SHOULD_ NOT be empty.'
        );
    }

    /** https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4 */
    #[Test] public function missing_enum(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::default => 'default',
        ]);

        self::assertNull(
            actual: $ServerVariable->enum,
            message: 'An enumeration of string values to be used if the substitution options are from a limited set. The array _SHOULD_ NOT be empty.'
        );
    }
}