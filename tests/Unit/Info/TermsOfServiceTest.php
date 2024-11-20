<?php

namespace Tests\Unit\Info;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Info;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class TermsOfServiceTest extends TestCase
{
    /**
     * A URL for the Terms of Service for the API. This _MUST_ be in the form of a URL.
     *
     * link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    #[Test] public function invalid_termsOfService(): void
    {
        $this->expectException(InvalidUrlException::class);

        Info::from([
            Info::title => 'title',
            Info::termsOfService => 'termsOfService',
            Info::version => 'version',
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0 */
    #[Test] public function termsOfService(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::termsOfService => 'https://example.com/',
            Info::version => 'version',
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $Info->termsOfService,
            message: 'A URL for the Terms of Service for the API. This _MUST_ be in the form of a URL.'
        );
    }

    #[Test] public function missing_version(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$version` is required.');

        Info::from([
            Info::title => 'title',
        ]);
    }
}