<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class TypeTest extends TestCase
{

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function type(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
            SecurityScheme::flows => []
        ]);

        $this->assertEquals(
            expected: 'apiKey',
            actual: $SecurityScheme->type,
            message: 'REQUIRED. The type of the security scheme. Valid values are "apiKey", "http", "oauth2", "openIdConnect".'
        );
    }
}