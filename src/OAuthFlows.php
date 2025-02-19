<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Allows configuration of the supported OAuth Flows.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#oauth-flows-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class OAuthFlows
{
    use DataModel;

    /**
     * Configuration for the OAuth Implicit flow
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @see  $implicit
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const implicit = 'implicit';

    /**
     * Configuration for the OAuth Implicit flow
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?OAuthFlow $implicit;

    /**
     * Configuration for the OAuth Resource Owner Password flow
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @see  $password
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const password = 'password';

    /**
     * Configuration for the OAuth Resource Owner Password flow
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?OAuthFlow $password;

    /**
     * Configuration for the OAuth Client Credentials flow.
     * Previously called `application` in OpenAPI 2.0.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @see  $clientCredentials
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const clientCredentials = 'clientCredentials';

    /**
     * Configuration for the OAuth Client Credentials flow.
     * Previously called `application` in OpenAPI 2.0.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?OAuthFlow $clientCredentials;

    /**
     * Configuration for the OAuth Authorization Code flow.
     * Previously called `accessCode` in OpenAPI 2.0.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @see  $authorizationCode
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const authorizationCode = 'authorizationCode';

    /**
     * Configuration for the OAuth Authorization Code flow.
     * Previously called `accessCode` in OpenAPI 2.0.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?OAuthFlow $authorizationCode;
}
