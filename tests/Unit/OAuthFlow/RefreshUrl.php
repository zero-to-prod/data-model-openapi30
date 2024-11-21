<?php

namespace Tests\Unit\OAuthFlow;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;

class RefreshUrl extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25 */
    #[Test] public function default_value(): void
    {
        $OAuthFlow = OAuthFlow::from([
            OAuthFlow::authorizationUrl => 'authorizationUrl',
            OAuthFlow::tokenUrl => 'tokenUrl',
            OAuthFlow::scopes => []
        ]);

        self::assertNull(
            actual: $OAuthFlow->refreshUrl,
            message: 'The URL to be used for obtaining refresh tokens. This MUST be in the form of a URL. The OAuth2 standard requires the use of TLS.'
        );
    }

    /** @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25 */
    #[Test] public function tokenUrl(): void
    {
        $OAuthFlow = OAuthFlow::from([
            OAuthFlow::authorizationUrl => 'authorizationUrl',
            OAuthFlow::tokenUrl => 'tokenUrl',
            OAuthFlow::refreshUrl => 'refreshUrl',
            OAuthFlow::scopes => []
        ]);

        $this->assertEquals(
            expected: 'refreshUrl',
            actual: $OAuthFlow->refreshUrl,
            message: 'The URL to be used for obtaining refresh tokens. This MUST be in the form of a URL. The OAuth2 standard requires the use of TLS.'
        );
    }
}