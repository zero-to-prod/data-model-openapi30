<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeTypeException;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class TypeTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$type` is required.');

        SecurityScheme::from();
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function invalid_value(): void
    {
        $this->expectException(InvalidSecuritySchemeTypeException::class);

        SecurityScheme::from([
            SecurityScheme::type => 'bogus'
        ]);
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function type(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey'
        ]);

        $this->assertEquals(
            expected: 'apiKey',
            actual: $SecurityScheme->type,
            message: 'REQUIRED. The type of the security scheme. Valid values are "apiKey", "http", "oauth2", "openIdConnect".'
        );
    }
}