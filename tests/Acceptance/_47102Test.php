<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _47102Test extends TestCase
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
                "tags": [
                  "pet"
                ],
                "summary": "Updates a pet in the store with form data",
                "operationId": "updatePetWithForm",
                "parameters": [
                  {
                    "name": "petId",
                    "in": "path",
                    "description": "ID of pet that needs to be updated",
                    "required": true,
                    "schema": {
                      "type": "string"
                    }
                  }
                ],
                "requestBody": {
                  "content": {
                    "application/x-www-form-urlencoded": {
                      "schema": {
                        "type": "object",
                        "properties": {
                          "name": {
                            "description": "Updated name of the pet",
                            "type": "string"
                          },
                          "status": {
                            "description": "Updated status of the pet",
                            "type": "string"
                          }
                        },
                        "required": [
                          "status"
                        ]
                      }
                    }
                  }
                },
                "responses": {
                  "200": {
                    "description": "Pet updated.",
                    "content": {
                      "application/json": {},
                      "application/xml": {}
                    }
                  },
                  "405": {
                    "description": "Method Not Allowed",
                    "content": {
                      "application/json": {},
                      "application/xml": {}
                    }
                  }
                },
                "security": [
                  {
                    "petstore_auth": [
                      "write:pets",
                      "read:pets"
                    ]
                  }
                ]
              }
            }
          }
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'pet',
            actual: $OpenApi->paths['/pets']->get->tags[0],
        );
        self::assertEquals(
            expected: 'Updates a pet in the store with form data',
            actual: $OpenApi->paths['/pets']->get->summary,
        );
        self::assertEquals(
            expected: 'updatePetWithForm',
            actual: $OpenApi->paths['/pets']->get->operationId,
        );
        self::assertEquals(
            expected: 'petId',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->name,
        );
        self::assertEquals(
            expected: 'path',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->in,
        );
        self::assertEquals(
            expected: 'ID of pet that needs to be updated',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->description,
        );
        self::assertTrue(
            condition: $OpenApi->paths['/pets']->get->parameters[0]->required,
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->paths['/pets']->get->parameters[0]->schema->type,
        );
        self::assertEquals(
            expected: 'object',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/x-www-form-urlencoded']->schema->type
        );
        self::assertEquals(
            expected: 'Updated name of the pet',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/x-www-form-urlencoded']->schema->properties['name']->description
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/x-www-form-urlencoded']->schema->properties['name']->type
        );
        self::assertEquals(
            expected: 'Updated status of the pet',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/x-www-form-urlencoded']->schema->properties['status']->description
        );
        self::assertEquals(
            expected: 'string',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/x-www-form-urlencoded']->schema->properties['status']->type
        );
        self::assertEquals(
            expected: 'status',
            actual: $OpenApi->paths['/pets']->get->requestBody->content['application/x-www-form-urlencoded']->schema->required[0]
        );
        self::assertEquals(
            expected: 'Pet updated.',
            actual: $OpenApi->paths['/pets']->get->responses['200']->description
        );
        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $OpenApi->paths['/pets']->get->responses['200']->content['application/json']
        );
        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $OpenApi->paths['/pets']->get->responses['200']->content['application/xml']
        );
        self::assertEquals(
            expected: 'Method Not Allowed',
            actual: $OpenApi->paths['/pets']->get->responses['405']->description
        );
        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $OpenApi->paths['/pets']->get->responses['405']->content['application/json']
        );
        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $OpenApi->paths['/pets']->get->responses['405']->content['application/xml']
        );
        self::assertEquals(
            expected: 'write:pets',
            actual: $OpenApi->paths['/pets']->get->security[0]['petstore_auth'][0]
        );
        self::assertEquals(
            expected: 'read:pets',
            actual: $OpenApi->paths['/pets']->get->security[0]['petstore_auth'][1]
        );
    }
}