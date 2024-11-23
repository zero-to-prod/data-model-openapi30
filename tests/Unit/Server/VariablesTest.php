<?php

namespace Tests\Unit\Server;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Server;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class VariablesTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3 */
    #[Test] public function variables(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
            Server::description => 'description',
            Server::variables => [
                'username' => [
                    ServerVariable::default => 'default',
                    ServerVariable::description => 'description',
                ]
            ]
        ]);

        self::assertEquals(
            expected: 'default',
            actual: $Server->variables['username']->default,
            message: 'A map between a variable name and its value. The value is used for substitution in the server’s URL template.'
        );
        self::assertEquals(
            expected: 'description',
            actual: $Server->variables['username']->description,
            message: 'A map between a variable name and its value. The value is used for substitution in the server’s URL template.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3 */
    #[Test] public function missing_variables(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
            Server::description => 'description',
        ]);

        self::assertEmpty(
            actual: $Server->variables,
            message: 'A map between a variable name and its value. The value is used for substitution in the server’s URL template.'
        );
    }
}