<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;
use Zerotoprod\DataModelOpenapi30\Xml;

class XmlTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function discriminator_null(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->xml,
            message: 'This _MAY_ be used only on property schemas. It has no effect on root schemas. Adds additional metadata to describe the XML representation of this property.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function discriminator(): void
    {
        $Schema = Schema::from([
            Schema::xml => [
                Xml::attribute => 'attribute',
            ],
        ]);

        self::assertEquals(
            expected: 'attribute',
            actual: $Schema->xml->attribute,
            message: 'This _MAY_ be used only on property schemas. It has no effect on root schemas. Adds additional metadata to describe the XML representation of this property.'
        );
    }
}