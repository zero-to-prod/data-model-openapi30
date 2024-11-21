<?php

namespace Tests\Unit\SecurityScheme;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeInException;
use Zerotoprod\DataModelOpenapi30\InvalidSecuritySchemeTypeException;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;
use Zerotoprod\DataModelOpenapi30\OAuthFlows;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class FlowsTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$flows` is required.');

        SecurityScheme::from([
            SecurityScheme::name => 'name',
            SecurityScheme::type => 'apiKey',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
            SecurityScheme::in => 'query',
        ]);
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23 */
    #[Test] public function flows(): void
    {
        $SecurityScheme = SecurityScheme::from([
            SecurityScheme::type => 'apiKey',
            SecurityScheme::name => 'name',
            SecurityScheme::in => 'query',
            SecurityScheme::scheme => 'scheme',
            SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
            SecurityScheme::flows => [
                OAuthFlows::authorizationCode => [
                    OAuthFlow::authorizationUrl => 'authorizationUrl',
                    OAuthFlow::tokenUrl => 'tokenUrl',
                    OAuthFlow::scopes => []
                ]
            ],
        ]);

        $this->assertEquals(
            expected: 'tokenUrl',
            actual: $SecurityScheme->flows->authorizationCode->tokenUrl,
            message: 'REQUIRED. An object containing configuration information for the flow types supported.'
        );
    }
}