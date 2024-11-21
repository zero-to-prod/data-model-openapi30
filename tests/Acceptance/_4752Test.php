<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;
use Zerotoprod\DataModelOpenapi30\Server;

class _4752Test extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#server-object-example */
    #[Test] public function single_server(): void
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

    /** @link https://spec.openapis.org/oas/v3.0.4.html#server-object-example */
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "openapi": "3.0.3",
          "info": {
            "title": "title",
            "version": "version"
          },
          "servers": [
            {
              "url": "https://development.gigantic-server.com/v1",
              "description": "Development server"
            },
            {
              "url": "https://staging.gigantic-server.com/v1",
              "description": "Staging server"
            },
            {
              "url": "https://api.gigantic-server.com/v1",
              "description": "Production server"
            }
          ],
          "paths": []
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'https://development.gigantic-server.com/v1',
            actual: $OpenApi->servers[0]->url,
        );
        self::assertEquals(
            expected: 'Development server',
            actual: $OpenApi->servers[0]->description,
        );

        self::assertEquals(
            expected: 'https://staging.gigantic-server.com/v1',
            actual: $OpenApi->servers[1]->url,
        );
        self::assertEquals(
            expected: 'Staging server',
            actual: $OpenApi->servers[1]->description,
        );

        self::assertEquals(
            expected: 'https://api.gigantic-server.com/v1',
            actual: $OpenApi->servers[2]->url,
        );
        self::assertEquals(
            expected: 'Production server',
            actual: $OpenApi->servers[2]->description,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#server-object-example */
    #[Test] public function variables(): void
    {
        $json = <<<JSON
        {
          "openapi": "3.0.3",
          "info": {
            "title": "title",
            "version": "version"
          },
          "servers": [
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
          ],
          "paths": {}
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'https://{username}.gigantic-server.com:{port}/{basePath}',
            actual: $OpenApi->servers[0]->url,
        );
        self::assertEquals(
            expected: 'The production API server',
            actual: $OpenApi->servers[0]->description,
        );
        self::assertEquals(
            expected: 'demo',
            actual: $OpenApi->servers[0]->variables['username']->default,
        );
        self::assertEquals(
            expected: 'A user-specific subdomain. Use `demo` for a free sandbox environment.',
            actual: $OpenApi->servers[0]->variables['username']->description,
        );
        self::assertEquals(
            expected: ["8443", "443"],
            actual: $OpenApi->servers[0]->variables['port']->enum,
        );
        self::assertEquals(
            expected: '8443',
            actual: $OpenApi->servers[0]->variables['port']->default,
        );
        self::assertEquals(
            expected: 'v2',
            actual: $OpenApi->servers[0]->variables['basePath']->default,
        );
    }
}