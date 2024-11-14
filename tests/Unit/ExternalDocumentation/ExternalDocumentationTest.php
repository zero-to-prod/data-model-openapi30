<?php

namespace Tests\Unit\ExternalDocumentation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;

class ExternalDocumentationTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object-example */
    #[Test] public function missing_description(): void
    {
        $json = <<<JSON
        {
          "description": "Find more info here",
          "url": "https://example.com"
        }
        JSON;

        $ExternalDocumentation = ExternalDocumentation::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Find more info here',
            actual: $ExternalDocumentation->description,
        );
        self::assertEquals(
            expected: 'https://example.com',
            actual: $ExternalDocumentation->url,
        );
    }
}