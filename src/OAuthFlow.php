<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Configuration details for a supported OAuth Flow
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#oauth-flow-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class OAuthFlow
{
    use DataModel;

    /**
     * **REQUIRED**. The authorization URL to be used for this flow. This
     * _MUST_ be in the form of a URL. The OAuth2 standard requires the
     * use of TLS.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @see  $authorizationUrl
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const authorizationUrl = 'authorizationUrl';

    /**
     * **REQUIRED**. The authorization URL to be used for this flow. This
     * _MUST_ be in the form of a URL. The OAuth2 standard requires the
     * use of TLS.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public string $authorizationUrl;

    /**
     * **REQUIRED**. The token URL to be used for this flow. This _MUST_ be
     * in the form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @see  $tokenUrl
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const tokenUrl = 'tokenUrl';

    /**
     * **REQUIRED**. The token URL to be used for this flow. This _MUST_ be
     * in the form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $tokenUrl;

    /**
     * The URL to be used for obtaining refresh tokens. This _MUST_ be in the
     * form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @see  $refreshUrl
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const refreshUrl = 'refreshUrl';

    /**
     * The URL to be used for obtaining refresh tokens. This _MUST_ be in the
     * form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public ?string $refreshUrl = null;

    /**
     * **REQUIRED**. The available scopes for the OAuth2 security scheme.
     * A map between the scope name and a short description for it.
     * The map _MAY_ be empty.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @see  $scopes
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const scopes = 'scopes';

    /**
     * **REQUIRED**. The available scopes for the OAuth2 security scheme.
     * A map between the scope name and a short description for it.
     * The map _MAY_ be empty.
     *
     * @var array<string, string> $scopes
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public array $scopes;
}
