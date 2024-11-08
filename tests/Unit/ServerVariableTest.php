<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\DefaultMissingInEnumException;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class ServerVariableTest extends TestCase
{

    #[Test] public function enum(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['default'],
            ServerVariable::default => 'default',
        ]);

        self::assertEquals('default', $ServerVariable->enum[0]);
    }

    #[Test] public function missing_enum(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::default => 'default',
        ]);

        self::assertNull($ServerVariable->enum);
    }

    #[Test] public function invalid_default(): void
    {
        $this->expectException(DefaultMissingInEnumException::class);

        ServerVariable::from([
            ServerVariable::enum => ['80'],
            ServerVariable::default => '443',
        ]);
    }

    #[Test] public function default(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['80', '443'],
            ServerVariable::default => '443',
        ]);

        self::assertEquals('443', $ServerVariable->default);
    }

    #[Test] public function missing_description(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['443'],
            ServerVariable::default => '443',
        ]);

        self::assertNull($ServerVariable->description);
    }

    #[Test] public function description(): void
    {
        $ServerVariable = ServerVariable::from([
            ServerVariable::enum => ['443'],
            ServerVariable::default => '443',
            ServerVariable::description => 'description',
        ]);

        self::assertEquals('description', $ServerVariable->description);
    }
}