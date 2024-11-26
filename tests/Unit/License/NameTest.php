<?php

namespace Tests\Unit\License;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\License;

class NameTest extends TestCase
{
    /**
     * REQUIRED. The license name used for the API.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-2
     */
    #[Test] public function missing_name(): void
    {
        $this->expectException(PropertyRequiredException::class);
        License::from();
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-2 */
    #[Test] public function name_field(): void
    {
        $License = License::from([
            License::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $License->name,
            message: 'The license name used for the API.'
        );
    }
}