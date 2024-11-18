<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;
use Zerotoprod\DataModelOpenapi30\Xml;

class NameSpaceTest extends TestCase
{
    /**
     * **REQUIRED*. The reference string.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19
     */
    #[Test] public function nullable(): void
    {
        $Xml = Xml::from();

        self::assertNull(
            actual: $Xml->namespace,
            message: 'The URI of the namespace definition. Value MUST be in the form of a non-relative URI.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19 */
    #[Test] public function valid_url(): void
    {
        $Xml = Xml::from([
            Xml::namespace => 'https://example.com/schemas/',
        ]);

        self::assertEquals(
            expected: 'https://example.com/schemas/',
            actual: $Xml->namespace,
            message: 'The URI of the namespace definition. Value MUST be in the form of a non-relative URI.'
        );
    }

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being `"array"` (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Test] public function invalid_url(): void
    {
        $this->expectException(InvalidUrlException::class);
        Xml::from([
            Xml::namespace => './home',
        ]);
    }

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being `"array"` (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Test] public function relative_url(): void
    {
        $this->expectException(InvalidUrlException::class);
        Xml::from([
            Xml::namespace => 'home/',
        ]);
    }

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being `"array"` (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Test] public function absolute_url(): void
    {
        $this->expectException(InvalidUrlException::class);
        Xml::from([
            Xml::namespace => '/home/',
        ]);
    }
}