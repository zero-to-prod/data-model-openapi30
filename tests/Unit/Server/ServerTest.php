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
          "url": "https://{username}.gigantic-server.com:{port}/{basePath}",
          "description": "The production API server",
          "variables": {
            "username": {
              "default": "demo",
              "description": "A user-specific subdomain. Use `demo` for a free sandbox environment."
            },
            "port": {
              "enum": ["8443", "443"],
              "default": "8443"
            },
            "basePath": {
              "default": "v2"
            }
          }
        }
        JSON;

        $Server = Server::from(json_decode($json, true));

        self::assertEquals(
            expected: 'https://{username}.gigantic-server.com:{port}/{basePath}',
            actual: $Server->url,
        );
        self::assertEquals(
            expected: 'The production API server',
            actual: $Server->description,
        );
        self::assertEquals(
            expected: 'demo',
            actual: $Server->variables['username']->default,
        );
        self::assertEquals(
            expected: 'A user-specific subdomain. Use `demo` for a free sandbox environment.',
            actual: $Server->variables['username']->description,
        );
        self::assertEquals(
            expected: ["8443", "443"],
            actual: $Server->variables['port']->enum,
        );
        self::assertEquals(
            expected: '8443',
            actual: $Server->variables['port']->default,
        );
        self::assertEquals(
            expected: 'v2',
            actual: $Server->variables['basePath']->default,
        );
    }
}