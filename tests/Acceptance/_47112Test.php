<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class _47112Test extends TestCase
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
          "paths": {},
          "externalDocs":{
              "description": "Find more info here",
              "url": "https://example.com"
            }
        }
        JSON;

        $OpenApi = OpenApi::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Find more info here',
            actual: $OpenApi->externalDocs->description,
        );
        self::assertEquals(
            expected: 'https://example.com',
            actual: $OpenApi->externalDocs->url,
        );
    }
}