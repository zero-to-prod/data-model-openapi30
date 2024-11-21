<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeInException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeTypeException;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class SchemeTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$scheme` is required.');

        SecurityScheme::from([
            SecurityScheme::name => 'name',
            SecurityScheme::type => 'apiKey',
            SecurityScheme::in => 'query',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
        ]);
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function schema(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
        ]);

        $this->assertEquals(
            expected: 'scheme',
            actual: $SecurityScheme->scheme,
            message: 'The name of the HTTP Authentication scheme to be used in the Authorization header as defined in [RFC7235] Section 5.1. The values used SHOULD be registered in the IANA Authentication Scheme registry. The value is case-insensitive, as defined in [RFC7235] Section 2.1.'
        );
    }
}