<?php

namespace Tests\Unit\License;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\License;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class UrlTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-2 */
    #[Test] public function missing_url(): void
    {
        $License = License::from([
            License::name => 'name'
        ]);

        self::assertNull(
            actual: $License->url,
            message: 'A URL for the license used for the API. This _MUST_ be in the form of a URL.'
        );
    }

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-2
     */
    #[Test] public function invalid_url(): void
    {
        $this->expectException(InvalidUrlException::class);

        License::from([
            License::name => 'name',
            License::url => 'invalid url'
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-2 */
    #[Test] public function url(): void
    {
        $License = License::from([
            License::name => 'name',
            License::url => 'https://example.com/'
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $License->url,
            message: 'A URL for the license used for the API. This _MUST_ be in the form of a URL.'
        );
    }
}