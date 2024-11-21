<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class BearerFormatTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
        ]);

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
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
        ]);

        $this->assertEquals(
            expected: 'description',
            actual: $SecurityScheme->description,
            message: 'A description for security scheme. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}