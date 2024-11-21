<?php

namespace Tests\Unit\OAuthFlow;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;

class TokenUrl extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25 */
    #[Test] public function default_value(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$authorizationUrl` is required.');

        OAuthFlow::from([
            OAuthFlow::tokenUrl => 'tokenUrl',
            OAuthFlow::scopes => []
        ]);
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
            expected: 'authorizationUrl',
            actual: $OAuthFlow->authorizationUrl,
            message: 'REQUIRED. The authorization URL to be used for this flow. This MUST be in the form of a URL. The OAuth2 standard requires the use of TLS.'
        );
    }
}