<?php

namespace Tests\Unit\Discriminator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Discriminator;

class PropertyNameTest extends TestCase
{
    /**
     * **REQUIRED**. The name of the property in the payload that will
     * hold the discriminating value. This property _SHOULD_ be
     * required in the payload schema, as the behavior when the
     * property is absent is undefined.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-21
     */
    #[Test] public function missing_propertyName(): void
    {
        $this->expectException(PropertyRequiredException::class);
        Discriminator::from();
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-21 */
    #[Test] public function propertyName(): void
    {
        $Discriminator = Discriminator::from([
            Discriminator::propertyName => 'propertyName'
        ]);

        self::assertEquals(
            expected: 'propertyName',
            actual: $Discriminator->propertyName,
            message: 'REQUIRED. The name of the property in the payload that will hold the discriminating value. This property _SHOULD_ be required in the payload schema, as the behavior when the property is absent is undefined.'
        );
    }
}