<?php

namespace Tests\Unit\Xml;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Xml;

class WrappedTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22 */
    #[Test] public function default(): void
    {
        $Xml = Xml::from();

        self::assertFalse(
            condition: $Xml->wrapped,
            message: 'Declares whether the property definition translates to an attribute instead of an element. Default value is false.',
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22 */
    #[Test] public function false(): void
    {
        $Xml = Xml::from([
            Xml::wrapped => false,
        ]);

        self::assertFalse(
            condition: $Xml->wrapped,
            message: 'Declares whether the property definition translates to an attribute instead of an element. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22 */
    #[Test] public function true(): void
    {
        $Xml = Xml::from([
            Xml::wrapped => true,
        ]);

        self::assertTrue(
            condition: $Xml->wrapped,
            message: 'Declares whether the property definition translates to an attribute instead of an element. Default value is false.'
        );
    }
}