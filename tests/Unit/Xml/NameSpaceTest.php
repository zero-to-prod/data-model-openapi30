<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
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
            message: 'The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.'
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
            message: 'The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.'
        );
    }
}