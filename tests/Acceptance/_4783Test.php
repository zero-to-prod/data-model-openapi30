<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _4783Test extends TestCase
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
                  "description": "Returns all pets from the system that the user has access to",
                  "responses": {
                    "200": {
                      "description": "A list of pets.",
                      "content": {
                        "application/json": {
                          "schema": {
                            "type": "array",
                            "items": {
                              "\$ref": "#/components/schemas/pet"
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Returns all pets from the system that the user has access to',
            actual: $OpenApi->paths['/pets']->get->description,
        );
        self::assertEquals(
            expected: 'A list of pets.',
            actual: $OpenApi->paths['/pets']->get->responses['200']->description,
        );
        self::assertEquals(
            expected: 'array',
            actual: $OpenApi->paths['/pets']->get->responses['200']->content['application/json']->schema->type,
        );
        self::assertEquals(
            expected: '#/components/schemas/pet',
            actual: $OpenApi->paths['/pets']->get->responses['200']->content['application/json']->schema->items->ref,
        );
    }
}