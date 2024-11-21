<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Allows configuration of the supported OAuth Flows.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#oauth-flows-object
 */
class OAuthFlows
{
    use DataModel;

    /**
     * Configuration for the OAuth Implicit flow
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    public const implicit = 'implicit';

    /**
     * Configuration for the OAuth Implicit flow
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    #[Describe(['missing_as_null'])]
    public ?OAuthFlow $implicit;

    /**
     * Configuration for the OAuth Resource Owner Password flow
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    public const password = 'password';

    /**
     * Configuration for the OAuth Resource Owner Password flow
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    #[Describe(['missing_as_null'])]
    public ?OAuthFlow $password;

    /**
     * Configuration for the OAuth Client Credentials flow.
     * Previously called `application` in OpenAPI 2.0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    public const clientCredentials = 'clientCredentials';

    /**
     * Configuration for the OAuth Client Credentials flow.
     * Previously called `application` in OpenAPI 2.0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    #[Describe(['missing_as_null'])]
    public ?OAuthFlow $clientCredentials;

    /**
     * Configuration for the OAuth Authorization Code flow.
     * Previously called `accessCode` in OpenAPI 2.0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    public const authorizationCode = 'authorizationCode';

    /**
     * Configuration for the OAuth Authorization Code flow.
     * Previously called `accessCode` in OpenAPI 2.0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     */
    #[Describe(['missing_as_null'])]
    public ?OAuthFlow $authorizationCode;
}
