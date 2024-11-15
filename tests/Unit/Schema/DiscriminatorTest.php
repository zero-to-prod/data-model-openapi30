<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Discriminator;
use Zerotoprod\DataModelOpenapi30\Schema;

class DiscriminatorTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function discriminator_null(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->discriminator,
            message: 'Adds support for polymorphism. The discriminator is used to determine which of a set of schemas a payload is expected to satisfy. See Composition and Inheritance for more details.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function discriminator(): void
    {
        $Schema = Schema::from([
            Schema::discriminator => [
                Discriminator::propertyName => 'propertyName'
            ],
        ]);

        self::assertEquals(
            expected: 'propertyName',
            actual: $Schema->discriminator->propertyName,
            message: 'Adds support for polymorphism. The discriminator is used to determine which of a set of schemas a payload is expected to satisfy. See Composition and Inheritance for more details.'
        );
    }
}