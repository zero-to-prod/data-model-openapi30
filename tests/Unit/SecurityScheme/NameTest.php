<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class NameTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
        ]);

        $this->assertNull(
            actual: $SecurityScheme->name,
            message: 'REQUIRED. The name of the header, query or cookie parameter to be used.'
        );
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function name_property(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
            SecurityScheme::flows => [],
        ]);

        $this->assertEquals(
            expected: 'name',
            actual: $SecurityScheme->name,
            message: 'REQUIRED. The name of the header, query or cookie parameter to be used.'
        );
    }
}