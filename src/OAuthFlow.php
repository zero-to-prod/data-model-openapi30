<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Configuration details for a supported OAuth Flow
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#oauth-flow-object
 */
class OAuthFlow
{
    use DataModel;

    /**
     * **REQUIRED**. The authorization URL to be used for this flow. This
     * _MUST_ be in the form of a URL. The OAuth2 standard requires the
     * use of TLS.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    public const authorizationUrl = 'authorizationUrl';

    /**
     * **REQUIRED**. The authorization URL to be used for this flow. This
     * _MUST_ be in the form of a URL. The OAuth2 standard requires the
     * use of TLS.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    #[Describe(['required'])]
    public string $authorizationUrl;

    /**
     * **REQUIRED**. The token URL to be used for this flow. This _MUST_ be
     * in the form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    public const tokenUrl = 'tokenUrl';

    /**
     * **REQUIRED**. The token URL to be used for this flow. This _MUST_ be
     * in the form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    #[Describe(['nullable'])]
    public ?string $tokenUrl;

    /**
     * The URL to be used for obtaining refresh tokens. This _MUST_ be in the
     * form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    public const refreshUrl = 'refreshUrl';

    /**
     * The URL to be used for obtaining refresh tokens. This _MUST_ be in the
     * form of a URL. The OAuth2 standard requires the use of TLS.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    #[Describe(['nullable'])]
    public ?string $refreshUrl;

    /**
     * **REQUIRED**. The available scopes for the OAuth2 security scheme.
     * A map between the scope name and a short description for it.
     * The map _MAY_ be empty.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    public const scopes = 'scopes';

    /**
     * **REQUIRED**. The available scopes for the OAuth2 security scheme.
     * A map between the scope name and a short description for it.
     * The map _MAY_ be empty.
     *
     * @var array<string, string> $scopes
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25
     */
    #[Describe(['required'])]
    public array $scopes;
}
