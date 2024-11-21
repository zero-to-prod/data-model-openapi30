<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Contact;

class _4732Test extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object-example */
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "name": "API Support",
          "url": "https://www.example.com/support",
          "email": "support@example.com"
        }
        JSON;

        $Contact = Contact::from(json_decode($json, true));

        self::assertEquals(
            expected: 'API Support',
            actual: $Contact->name,
        );
        self::assertEquals(
            expected: 'https://www.example.com/support',
            actual: $Contact->url,
        );
        self::assertEquals(
            expected: 'support@example.com',
            actual: $Contact->email,
        );
    }
}