<?php

namespace Tests\Unit\ExternalDocumentation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class UrlTest extends TestCase
{

    /**
     * **REQUIRED*. The URL for the target documentation.
     * This **MUST** be in the form of a URL.
     *
     * @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     */
    #[Test] public function missing_url(): void
    {
        /** REQUIRED. */
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$url` is required.');

        ExternalDocumentation::from();
    }

    /**
     * **REQUIRED*. The URL for the target documentation.
     * This **MUST** be in the form of a URL.
     *
     * @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     */
    #[Test] public function invalid_url(): void
    {
        $this->expectException(InvalidUrlException::class);

        ExternalDocumentation::from([
            ExternalDocumentation::url => 'invalid_url',
        ]);
    }

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function url(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $ExternalDocumentation->url,
            message: 'REQUIRED. The URL for the target documentation. This MUST be in the form of a URL.'
        );
    }
}