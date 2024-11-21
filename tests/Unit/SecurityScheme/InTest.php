<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeInException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeTypeException;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class InTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$in` is required.');

        SecurityScheme::from([
            SecurityScheme::name => 'name',
            SecurityScheme::type => 'apiKey',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
        ]);
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function invalid_value(): void
    {
        $this->expectException(InvalidSecuritySchemeInException::class);

        SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'bogus',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
        ]);
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function in(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
        ]);

        $this->assertEquals(
            expected: 'query',
            actual: $SecurityScheme->in,
            message: 'REQUIRED. The location of the API key. Valid values are "query", "header", or "cookie".'
        );
    }
}