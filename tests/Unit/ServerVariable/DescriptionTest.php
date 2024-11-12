<?php

namespace Tests\Unit\ServerVariable;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class DescriptionTest extends TestCase
{
    /** https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4 */
    #[Test] public function missing_description(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['443'],
            ServerVariable::default => '443',
        ]);

        self::assertNull(
            actual: $ServerVariable->description,
            message: 'An optional description for the server variable. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4 */
    #[Test] public function description(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['443'],
            ServerVariable::default => '443',
            ServerVariable::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $ServerVariable->description,
            message: 'An optional description for the server variable. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}