<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _47142Test extends TestCase
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
                        "\$ref": "#/components/schemas/Pet"
                      },
                      "examples": {
                        "cat": {
                          "summary": "An example of a cat",
                          "value": {
                            "name": "Fluffy",
                            "petType": "Cat",
                            "color": "White",
                            "gender": "male",
                            "breed": "Persian"
                          }
                        },
                        "dog": {
                          "summary": "An example of a dog with a cat's name",
                          "value": {
                            "name": "Puma",
                            "petType": "Dog",
                            "color": "Black",
                            "gender": "Female",
                            "breed": "Mixed"
                          }
                        },
                        "frog": {
                          "\$ref": "#/components/examples/frog-example"
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
            expected: '#/components/schemas/Pet',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->schema->ref,
        );
        self::assertEquals(
            expected: 'An example of a cat',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['cat']->summary,
        );
        self::assertEquals(
            expected: 'Fluffy',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['cat']->value['name'],
        );
        self::assertEquals(
            expected: 'Cat',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['cat']->value['petType'],
        );
        self::assertEquals(
            expected: 'White',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['cat']->value['color'],
        );
        self::assertEquals(
            expected: 'male',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['cat']->value['gender'],
        );
        self::assertEquals(
            expected: 'Persian',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['cat']->value['breed'],
        );
        self::assertEquals(
            expected: 'An example of a dog with a cat\'s name',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['dog']->summary,
        );
        self::assertEquals(
            expected: 'Puma',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['dog']->value['name'],
        );
        self::assertEquals(
            expected: 'Dog',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['dog']->value['petType'],
        );
        self::assertEquals(
            expected: 'Black',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['dog']->value['color'],
        );
        self::assertEquals(
            expected: 'Female',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['dog']->value['gender'],
        );
        self::assertEquals(
            expected: 'Mixed',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['dog']->value['breed'],
        );
        self::assertEquals(
            expected: '#/components/examples/frog-example',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/json']->examples['frog']->ref,
        );
    }
}