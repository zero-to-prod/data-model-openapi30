<?php

namespace Acceptance;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\License;

class _4742Test extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#license-object-example */
    #[Test] public function test(): void
    {
        $json = <<<JSON
        {
          "name": "Apache 2.0",
          "url": "https://www.apache.org/licenses/LICENSE-2.0.html"
        }
        JSON;

        $License = License::from(json_decode($json, true));

        self::assertEquals(
            expected: 'Apache 2.0',
            actual: $License->name,
        );
        self::assertEquals(
            expected: 'https://www.apache.org/licenses/LICENSE-2.0.html',
            actual: $License->url,
        );
    }
}