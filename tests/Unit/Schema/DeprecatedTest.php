<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class DeprecatedTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->deprecated,
            message: 'Specifies that a schema is deprecated and _SHOULD_ be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::deprecated => false,
        ]);

        self::assertFalse(
            condition: $Schema->deprecated,
            message: 'Specifies that a schema is deprecated and _SHOULD_ be transitioned out of usage. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::deprecated => true
        ]);

        self::assertTrue(
            condition: $Schema->deprecated,
            message: 'Specifies that a schema is deprecated and _SHOULD_ be transitioned out of usage. Default value is false.'
        );
    }
}