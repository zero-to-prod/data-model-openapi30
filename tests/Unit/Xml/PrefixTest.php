<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Xml;

class PrefixTest extends TestCase
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
            actual: $Xml->prefix,
            message: 'The prefix to be used for the name.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19 */
    #[Test] public function name_field(): void
    {
        $Xml = Xml::from([
            Xml::prefix => 'prefix'
        ]);

        self::assertEquals(
            expected: 'prefix',
            actual: $Xml->prefix,
            message: 'The prefix to be used for the name.'
        );
    }
}