<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Info;

class _4722Test extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#info-object-example */
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "title": "Example Pet Store App",
          "description": "This is an example server for a pet store.",
          "termsOfService": "https://example.com/terms/",
          "contact": {
            "name": "API Support",
            "url": "https://www.example.com/support",
            "email": "support@example.com"
          },
          "license": {
            "name": "Apache 2.0",
            "url": "https://www.apache.org/licenses/LICENSE-2.0.html"
          },
          "version": "1.0.1"
        }
        JSON;

        $Info = Info::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Example Pet Store App',
            actual: $Info->title,
        );
        self::assertEquals(
            expected: 'This is an example server for a pet store.',
            actual: $Info->description,
        );
        self::assertEquals(
            expected: 'https://example.com/terms/',
            actual: $Info->termsOfService,
        );
        self::assertEquals(
            expected: 'API Support',
            actual: $Info->contact->name,
        );
        self::assertEquals(
            expected: 'https://www.example.com/support',
            actual: $Info->contact->url,
        );
        self::assertEquals(
            expected: 'support@example.com',
            actual: $Info->contact->email,
        );
        self::assertEquals(
            expected: 'Apache 2.0',
            actual: $Info->license->name,
        );
        self::assertEquals(
            expected: 'https://www.apache.org/licenses/LICENSE-2.0.html',
            actual: $Info->license->url,
        );
        self::assertEquals(
            expected: '1.0.1',
            actual: $Info->version,
        );
    }
}