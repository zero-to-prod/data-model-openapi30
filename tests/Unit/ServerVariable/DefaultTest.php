<?php

namespace Tests\Unit\ServerVariable;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class DefaultTest extends TestCase
{

    /**
     * **REQUIRED**. The default value to use for substitution, which
     * _SHALL_ be sent if an alternate value is not supplied. If the
     * enum is defined, the value _SHOULD_ exist in the enum’s values.
     *
     * Note that this behavior is different from the Schema Object’s
     * default keyword, which documents the receiver’s behavior
     * rather than inserting the value into the data.
     *
     * https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    #[Test] public function invalid_default(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['80'],
        ]);

        self::assertNull(
            actual: $ServerVariable->default,
            message: 'REQUIRED. The default value to use for substitution, which _SHALL_ be sent if an alternate value is not supplied. If the enum is defined, the value _SHOULD_ exist in the enum’s values. Note that this behavior is different from the Schema Object’s default keyword, which documents the receiver’s behavior rather than inserting the value into the data.'
        );
    }

    /** https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4 */
    #[Test] public function default(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['80', '443'],
            ServerVariable::default => '443',
        ]);

        self::assertEquals(
            expected: '443',
            actual: $ServerVariable->default,
            message: 'REQUIRED. The default value to use for substitution, which _SHALL_ be sent if an alternate value is not supplied. If the enum is defined, the value _SHOULD_ exist in the enum’s values. Note that this behavior is different from the Schema Object’s default keyword, which documents the receiver’s behavior rather than inserting the value into the data.'
        );
    }
}