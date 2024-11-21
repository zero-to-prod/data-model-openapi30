<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _4792Test extends TestCase
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
                "description": "Returns pets based on ID",
                "summary": "Find pets by ID",
                "operationId": "getPetsById",
                "responses": {
                  "200": {
                    "description": "pet response",
                    "content": {
                      "*/*": {
                        "schema": {
                          "type": "array",
                          "items": {
                            "\$ref": "#/components/schemas/Pet"
                          }
                        }
                      }
                    }
                  },
                  "default": {
                    "description": "error payload",
                    "content": {
                      "text/html": {
                        "schema": {
                          "\$ref": "#/components/schemas/ErrorModel"
                        }
                      }
                    }
                  }
                }
              },
              "parameters": [
                {
                  "name": "id",
                  "in": "path",
                  "description": "ID of pet to use",
                  "required": true,
                  "schema": {
                    "type": "array",
                    "items": {
                      "type": "string"
                    }
                  },
                  "style": "simple"
                }
              ]
            }
          }
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Returns pets based on ID',
            actual: $OpenApi->paths['/pets']->get->description,
        );
        self::assertEquals(
            expected: 'Find pets by ID',
            actual: $OpenApi->paths['/pets']->get->summary,
        );
        self::assertEquals(
            expected: 'getPetsById',
            actual: $OpenApi->paths['/pets']->get->operationId,
        );
        self::assertEquals(
            expected: 'pet response',
            actual: $OpenApi->paths['/pets']->get->responses['200']->description,
        );
        self::assertEquals(
            expected: 'array',
            actual: $OpenApi->paths['/pets']->get->responses['200']->content['*/*']->schema->type,
        );
        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $OpenApi->paths['/pets']->get->responses['200']->content['*/*']->schema->items->ref,
        );
        self::assertEquals(
            expected: 'error payload',
            actual: $OpenApi->paths['/pets']->get->responses['default']->description,
        );
        self::assertEquals(
            expected: '#/components/schemas/ErrorModel',
            actual: $OpenApi->paths['/pets']->get->responses['default']->content['text/html']->schema->ref,
        );
        self::assertEquals(
            expected: 'id',
            actual: $OpenApi->paths['/pets']->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'path',
            actual: $OpenApi->paths['/pets']->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'ID of pet to use',
            actual: $OpenApi->paths['/pets']->parameters[0]->description,
        );
        self::assertTrue(
            condition:  $OpenApi->paths['/pets']->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'array',
            actual: $OpenApi->paths['/pets']->parameters[0]->schema->type,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->paths['/pets']->parameters[0]->schema->items->type,
        );
        self::assertEquals(
            expected: 'simple',
            actual: $OpenApi->paths['/pets']->parameters[0]->style,
        );
    }
}