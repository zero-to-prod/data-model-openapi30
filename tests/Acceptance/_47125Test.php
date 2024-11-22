<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _47125Test extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#parameter-object-examples */
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
                      "name": "username",
                      "in": "path",
                      "description": "username to fetch",
                      "required": true,
                      "schema": {
                        "type": "string"
                      }
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
            expected: 'username',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'path',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'username to fetch',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->description,
        );
        self::assertTrue(
            condition: $OpenApi->paths['/pets']->get->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->type,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#parameter-object-examples */
    #[Test] public function path_parameter(): void
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

    /** @link https://spec.openapis.org/oas/v3.0.4.html#parameter-object-examples */
    #[Test] public function optional_path_parameter(): void
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
                      "name": "id",
                      "in": "query",
                      "description": "ID of the object to fetch",
                      "required": false,
                      "schema": {
                        "type": "array",
                        "items": {
                          "type": "string"
                        }
                      },
                      "style": "form",
                      "explode": true
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
            expected: 'id',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'query',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'ID of the object to fetch',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->description,
        );
        self::assertFalse(
            condition: $OpenApi->paths['/pets']->get->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'array',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->type,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->items->type,
        );
        self::assertEquals(
            expected: 'form',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->style,
        );
        self::assertTrue(
            condition: $OpenApi->paths['/pets']->get->parameters[0]->explode,
        );
    }


    /** @link https://spec.openapis.org/oas/v3.0.4.html#parameter-object-examples */
    #[Test] public function free_form_query_parameter(): void
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
                      "in": "query",
                      "name": "freeForm",
                      "schema": {
                        "type": "object",
                        "additionalProperties": {
                          "type": "integer"
                        }
                      },
                      "style": "form"
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
            expected: 'freeForm',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'query',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'object',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->type,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->additionalProperties->type,
        );
        self::assertEquals(
            expected: 'form',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->style,
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#parameter-object-examples */
    #[Test] public function complex(): void
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
                      "in": "query",
                      "name": "coordinates",
                      "content": {
                        "application/json": {
                          "schema": {
                            "type": "object",
                            "required": ["lat", "long"],
                            "properties": {
                              "lat": {
                                "type": "number"
                              },
                              "long": {
                                "type": "number"
                              }
                            }
                          }
                        }
                      }
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
            expected: 'coordinates',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'query',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'object',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->content['application/json']->schema->type,
        );
        self::assertEquals(
            expected: 'lat',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->content['application/json']->schema->required[0],
        );
        self::assertEquals(
            expected: 'long',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->content['application/json']->schema->required[1],
        );
        self::assertEquals(
            expected: 'number',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->content['application/json']->schema->properties['lat']->type,
        );
        self::assertEquals(
            expected: 'number',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->content['application/json']->schema->properties['long']->type,
        );
    }
}