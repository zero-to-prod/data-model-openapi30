<?php

namespace Tests\Unit\Server;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Server;

class ServerTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#server-object */
    #[Test] public function missing_description(): void
    {
        $json = <<<JSON
        {
          "url": "https://development.gigantic-server.com/v1",
          "description": "Development server"
        }
        JSON;

        $Server = Server::from(json_decode($json, true));

        self::assertEquals(
            expected: 'https://development.gigantic-server.com/v1',
            actual: $Server->url,
        );
        self::assertEquals(
            expected: 'Development server',
            actual: $Server->description,
        );
    }
}