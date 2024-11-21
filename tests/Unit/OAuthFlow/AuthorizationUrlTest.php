<?php

namespace Tests\Unit\OAuthFlow;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;

class AuthorizationUrlTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25 */
    #[Test] public function default_value(): void
    {
        $OAuthFlow = OAuthFlow::from([
            OAuthFlow::authorizationUrl => 'authorizationUrl',
            OAuthFlow::scopes => []
        ]);

        $this->assertNull(
            actual: $OAuthFlow->tokenUrl,
            message: 'REQUIRED. The token URL to be used for this flow. This MUST be in the form of a URL. The OAuth2 standard requires the use of TLS.'
        );
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25 */
    #[Test] public function authorizationUrl(): void
    {
        $OAuthFlow = OAuthFlow::from([
            OAuthFlow::authorizationUrl => 'authorizationUrl',
            OAuthFlow::tokenUrl => 'tokenUrl',
            OAuthFlow::scopes => []
        ]);

        $this->assertEquals(
            expected: 'tokenUrl',
            actual: $OAuthFlow->tokenUrl,
            message: 'REQUIRED. The token URL to be used for this flow. This MUST be in the form of a URL. The OAuth2 standard requires the use of TLS.'
        );
    }
}