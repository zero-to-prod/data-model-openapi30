<?php

namespace Tests\Unit\ExternalDocumentation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;

class UrlTest extends TestCase
{

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function url(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $ExternalDocumentation->url,
            message: 'REQUIRED. The URL for the target documentation. This _MUST_ be in the form of a URL.'
        );
    }
}