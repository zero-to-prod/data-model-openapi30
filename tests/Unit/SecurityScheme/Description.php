<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class Description extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([SecurityScheme::description => 'apiKey']);

        self::assertNull(
            actual: $SecurityScheme->description,
            message: 'A description for security scheme. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function string(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::description => 'description',
            SecurityScheme::type => 'apiKey',
        ]);

        $this->assertEquals(
            expected: 'description',
            actual: $SecurityScheme->description,
            message: 'A description for security scheme. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}