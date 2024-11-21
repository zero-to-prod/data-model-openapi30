<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Info;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _4772Test extends TestCase
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
            "components": {
              "schemas": {
                "GeneralError": {
                  "type": "object",
                  "properties": {
                    "code": {
                      "type": "integer",
                      "format": "int32"
                    },
                    "message": {
                      "type": "string"
                    }
                  }
                },
                "Category": {
                  "type": "object",
                  "properties": {
                    "id": {
                      "type": "integer",
                      "format": "int64"
                    },
                    "name": {
                      "type": "string"
                    }
                  }
                },
                "Tag": {
                  "type": "object",
                  "properties": {
                    "id": {
                      "type": "integer",
                      "format": "int64"
                    },
                    "name": {
                      "type": "string"
                    }
                  }
                }
              },
              "parameters": {
                "skipParam": {
                  "name": "skip",
                  "in": "query",
                  "description": "number of items to skip",
                  "required": true,
                  "schema": {
                    "type": "integer",
                    "format": "int32"
                  }
                },
                "limitParam": {
                  "name": "limit",
                  "in": "query",
                  "description": "max records to return",
                  "required": true,
                  "schema" : {
                    "type": "integer",
                    "format": "int32"
                  }
                }
              },
              "responses": {
                "NotFound": {
                  "description": "Entity not found."
                },
                "IllegalInput": {
                  "description": "Illegal input for operation."
                },
                "GeneralError": {
                  "description": "General Error",
                  "content": {
                    "application/json": {
                      "schema": {
                        "\$ref": "#/components/schemas/GeneralError"
                      }
                    }
                  }
                }
              },
              "securitySchemes": {
                "api_key": {
                  "type": "apiKey",
                  "name": "api-key",
                  "in": "header"
                },
                "petstore_auth": {
                  "type": "oauth2",
                  "flows": {
                    "implicit": {
                      "authorizationUrl": "https://example.org/api/oauth/dialog",
                      "scopes": {
                        "write:pets": "modify pets in your account",
                        "read:pets": "read your pets"
                      }
                    }
                  }
                }
              }
            },
            "paths": {}
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'object',
            actual: $OpenApi->components->schemas['GeneralError']->type,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->components->schemas['GeneralError']->properties['code']->type,
        );
        self::assertEquals(
            expected: 'int32',
            actual: $OpenApi->components->schemas['GeneralError']->properties['code']->format,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->components->schemas['GeneralError']->properties['message']->type,
        );
        self::assertEquals(
            expected: 'object',
            actual: $OpenApi->components->schemas['Category']->type,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->components->schemas['Category']->properties['id']->type,
        );
        self::assertEquals(
            expected: 'int64',
            actual: $OpenApi->components->schemas['Category']->properties['id']->format,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->components->schemas['Category']->properties['name']->type,
        );
        self::assertEquals(
            expected: 'object',
            actual: $OpenApi->components->schemas['Tag']->type,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->components->schemas['Tag']->properties['id']->type,
        );
        self::assertEquals(
            expected: 'int64',
            actual: $OpenApi->components->schemas['Tag']->properties['id']->format,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->components->schemas['Tag']->properties['name']->type,
        );
        self::assertEquals(
            expected: 'skip',
            actual: $OpenApi->components->parameters['skipParam']->name,
        );
        self::assertEquals(
            expected: 'query',
            actual: $OpenApi->components->parameters['skipParam']->in,
        );
        self::assertEquals(
            expected: 'number of items to skip',
            actual: $OpenApi->components->parameters['skipParam']->description,
        );
        self::assertTrue(
            condition: $OpenApi->components->parameters['skipParam']->required,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->components->parameters['skipParam']->schema->type,
        );
        self::assertEquals(
            expected: 'int32',
            actual: $OpenApi->components->parameters['skipParam']->schema->format,
        );
        self::assertEquals(
            expected: 'limit',
            actual: $OpenApi->components->parameters['limitParam']->name,
        );
        self::assertEquals(
            expected: 'query',
            actual: $OpenApi->components->parameters['limitParam']->in,
        );
        self::assertEquals(
            expected: 'max records to return',
            actual: $OpenApi->components->parameters['limitParam']->description,
        );
        self::assertTrue(
            condition: $OpenApi->components->parameters['limitParam']->required,
        );
        self::assertEquals(
            expected: 'integer',
            actual: $OpenApi->components->parameters['limitParam']->schema->type,
        );
        self::assertEquals(
            expected: 'int32',
            actual: $OpenApi->components->parameters['limitParam']->schema->format,
        );
        self::assertEquals(
            expected: 'Entity not found.',
            actual: $OpenApi->components->responses['NotFound']->description,
        );
        self::assertEquals(
            expected: 'Illegal input for operation.',
            actual: $OpenApi->components->responses['IllegalInput']->description,
        );
        self::assertEquals(
            expected: 'General Error',
            actual: $OpenApi->components->responses['GeneralError']->description,
        );
        self::assertEquals(
            expected: '#/components/schemas/GeneralError',
            actual: $OpenApi->components->responses['GeneralError']->content['application/json']->schema->ref,
        );
        self::assertEquals(
            expected: 'apiKey',
            actual: $OpenApi->components->securitySchemes['api_key']->type,
        );
        self::assertEquals(
            expected: 'api-key',
            actual: $OpenApi->components->securitySchemes['api_key']->name,
        );
        self::assertEquals(
            expected: 'header',
            actual: $OpenApi->components->securitySchemes['api_key']->in,
        );
        self::assertEquals(
            expected: 'oauth2',
            actual: $OpenApi->components->securitySchemes['petstore_auth']->type,
        );
        self::assertEquals(
            expected: 'https://example.org/api/oauth/dialog',
            actual: $OpenApi->components->securitySchemes['petstore_auth']->flows->implicit->authorizationUrl,
        );
        self::assertEquals(
            expected: 'modify pets in your account',
            actual: $OpenApi->components->securitySchemes['petstore_auth']->flows->implicit->scopes['write:pets'],
        );
        self::assertEquals(
            expected: 'read your pets',
            actual: $OpenApi->components->securitySchemes['petstore_auth']->flows->implicit->scopes['read:pets'],
        );
    }
}