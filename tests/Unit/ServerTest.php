<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Server;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class ServerTest extends TestCase
{

    #[Test] public function missing_url(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$url` is required.');

        Server::from([]);
    }

    #[Test] public function url(): void
    {
        $Server = Server::from([
            Server::url => '/relative'
        ]);

        self::assertEquals('/relative', $Server->url);
    }

    #[Test] public function missing_description(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
        ]);

        self::assertNull($Server->description);
    }

    #[Test] public function description(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
            Server::description => 'description',
        ]);

        self::assertEquals('description', $Server->description);
    }

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

        self::assertEquals('default', $Server->variables['username']->default);
        self::assertEquals('description', $Server->variables['username']->description);
    }

    #[Test] public function missing_variables(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
            Server::description => 'description',
        ]);

        self::assertNull($Server->variables);
    }
}