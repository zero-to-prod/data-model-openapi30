<?php

namespace Tests\Unit\Reference;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Reference;

class RefTest extends TestCase
{
    /**
     * **REQUIRED*. The reference string.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19
     */
    #[Test] public function missing_ref(): void
    {
        $this->expectException(PropertyRequiredException::class);
        Reference::from();
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19 */
    #[Test] public function ref(): void
    {
        $Reference = Reference::from([
            Reference::ref => '#/components/schemas/Pet'
        ]);

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $Reference->ref,
            message: 'The reference string.'
        );
    }
}