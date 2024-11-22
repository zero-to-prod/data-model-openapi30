<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _47132Test extends TestCase
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
                "requestBody": {
                  "description": "user to add to the system",
                  "content": {
                    "application/json": {
                      "schema": {
                        "\$ref": "#/components/schemas/User"
                      },
                      "examples": {
                        "user": {
                          "summary": "User Example",
                          "externalValue": "https://foo.bar/examples/user-example.json"
                        }
                      }
                    },
                    "application/xml": {
                      "schema": {
                        "\$ref": "#/components/schemas/User"
                      },
                      "examples": {
                        "user": {
                          "summary": "User example in XML",
                          "externalValue": "https://foo.bar/examples/user-example.xml"
                        }
                      }
                    },
                    "text/plain": {
                      "examples": {
                        "user": {
                          "summary": "User example in Plain text",
                          "externalValue": "https://foo.bar/examples/user-example.txt"
                        }
                      }
                    },
                    "*/*": {
                      "examples": {
                        "user": {
                          "summary": "User example in other format",
                          "externalValue": "https://foo.bar/examples/user-example.whatever"
                        }
                      }
                    }
                  }
                },
                "responses": {}
              }
            }
          }
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'user to add to the system',
            actual: $OpenApi->paths['/pets']->get->requestBody->description,
        );
        self::assertEquals(
            expected: '#/components/schemas/User',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->schema->ref,
        );
        self::assertEquals(
            expected: 'User Example',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['user']->summary,
        );
        self::assertEquals(
            expected: 'https://foo.bar/examples/user-example.json',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['user']->externalValue,
        );
        self::assertEquals(
            expected: '#/components/schemas/User',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/xml']->schema->ref,
        );
        self::assertEquals(
            expected: 'User example in XML',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/xml']->examples['user']->summary,
        );
        self::assertEquals(
            expected: 'https://foo.bar/examples/user-example.xml',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/xml']->examples['user']->externalValue,
        );
        self::assertEquals(
            expected: 'User example in Plain text',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['text/plain']->examples['user']->summary,
        );
        self::assertEquals(
            expected: 'https://foo.bar/examples/user-example.txt',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['text/plain']->examples['user']->externalValue,
        );
        self::assertEquals(
            expected: 'User example in other format',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['*/*']->examples['user']->summary,
        );
        self::assertEquals(
            expected: 'https://foo.bar/examples/user-example.whatever',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['*/*']->examples['user']->externalValue,
        );
    }
}