<?php

namespace Tests\Unit\Discriminator;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Discriminator;

class MappingTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-21 */
    #[Test] public function missing_mapping(): void
    {
        $Discriminator = Discriminator::from([
            Discriminator::propertyName => 'propertyName'
        ]);

        self::assertEmpty(
            actual: $Discriminator->mapping,
            message: 'An object to hold mappings between payload values and schema names or URI references.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-21 */
    #[Test] public function mapping(): void
    {
        $Discriminator = Discriminator::from([
            Discriminator::propertyName => 'propertyName',
            Discriminator::mapping => ['key' => 'value']
        ]);

        self::assertEquals(
            expected: ['key' => 'value'],
            actual: $Discriminator->mapping,
            message: 'An object to hold mappings between payload values and schema names or URI references.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-21 */
    #[Test] public function mappings(): void
    {
        $Discriminator = Discriminator::from([
            Discriminator::propertyName => 'propertyName',
            Discriminator::mapping => [['key' => 'value']]
        ]);

        self::assertEquals(
            expected: [['key' => 'value']],
            actual: $Discriminator->mapping,
            message: 'An object to hold mappings between payload values and schema names or URI references.'
        );
    }
}