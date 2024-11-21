<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeTypeException;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class OpenIdConnectUrlTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::name => 'name',
        ]);

        $this->assertNull(
            actual: $SecurityScheme->openIdConnectUrl,
            message: 'REQUIRED. Well-known URL to discover the [OpenID-Connect-Discovery] provider metadata.'
        );
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function openIdConnectUrl(): void
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
            expected: 'openIdConnectUrl',
            actual: $SecurityScheme->openIdConnectUrl,
            message: 'REQUIRED. Well-known URL to discover the [OpenID-Connect-Discovery] provider metadata.'
        );
    }
}