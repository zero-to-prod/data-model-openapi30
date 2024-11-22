<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _47125Test extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#info-object-example */
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "openapi": "3.0.3",
          "info": {
            "title": "title",
            "version": "version"
          },
          "paths": {
            "/pets": {
              "get": {
                "parameters": [
                    {
                      "name": "token",
                      "in": "header",
                      "description": "token to be passed as a header",
                      "required": true,
                      "schema": {
                        "type": "array",
                        "items": {
                          "type": "integer",
                          "format": "int64"
                        }
                      },
                      "style": "simple"
                    }
                ],
                "responses": {}
              }
            }
          }
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'token',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'header',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'token to be passed as a header',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->description,
        );
        self::assertTrue(
            condition: $OpenApi->paths['/pets']->get->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'array',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->type,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->items->type,
        );
        self::assertEquals(
            expected: 'int64',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->items->format,
        );
        self::assertEquals(
            expected: 'simple',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->style,
        );
    }
}