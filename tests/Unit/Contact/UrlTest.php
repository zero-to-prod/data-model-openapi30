<?php

namespace Tests\Unit\Contact;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Contact;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class UrlTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object */
    #[Test] public function missing_url(): void
    {
        $Contact = Contact::from();

        self::assertNull(
            actual: $Contact->url,
            message: 'The URL for the contact information. This _MUST_ be in the form of a URL.'
        );
    }

    /**
     * The URL for the contact information. This _MUST_ be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    #[Test] public function invalid_url(): void
    {
        $this->expectException(InvalidUrlException::class);

        Contact::from([
            Contact::url => 'invalid url'
        ]);
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object */
    #[Test] public function url(): void
    {
        $Contact = Contact::from([
            Contact::url => 'https://example.com/'
        ]);

        self::assertEquals(
            expected: 'https://example.com/',
            actual: $Contact->url,
            message: 'The URL for the contact information. This _MUST_ be in the form of a URL.'
        );
    }
}