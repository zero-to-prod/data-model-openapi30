<?php

namespace Tests\Unit\OAuthFlows;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;
use Zerotoprod\DataModelOpenapi30\OAuthFlows;

class ClientCredentialsTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24 */
    #[Test] public function nullable(): void
    {
        $OAuthFlow = OAuthFlows::from();

        self::assertNull(
            actual: $OAuthFlow->clientCredentials,
            message: 'Configuration for the OAuth Client Credentials flow. Previously called application in OpenAPI 2.0.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24 */
    #[Test] public function oauth(): void
    {
        $OAuthFlows = OAuthFlows::from([
            OAuthFlows::clientCredentials => [
                OAuthFlow::authorizationUrl => 'authorizationUrl',
                OAuthFlow::tokenUrl => 'tokenUrl',
                OAuthFlow::scopes => []
            ]
        ]);

        self::assertEquals(
            expected: 'authorizationUrl',
            actual: $OAuthFlows->clientCredentials->authorizationUrl,
            message: 'Configuration for the OAuth Client Credentials flow. Previously called application in OpenAPI 2.0.'
        );
    }
}