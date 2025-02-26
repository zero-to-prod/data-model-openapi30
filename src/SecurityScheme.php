<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Defines a security scheme that can be used by the operations.
 *
 * Supported schemes are HTTP authentication, an API key (either as
 * a header, a cookie parameter, or as a query parameter), OAuth2’s
 * common flows (implicit, password, client credentials, and
 * authorization code) as defined in [RFC6749], and
 * [OpenID-Connect-Core]. Please note that as of
 * 2020, the implicit flow is about to be
 * deprecated by OAuth 2.0 Security Best
 * Current Practice. Recommended for
 * most use cases is Authorization
 * Code Grant flow with PKCE.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#security-scheme-object-0
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class SecurityScheme
{
    use DataModel;

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $type
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const type = 'type';

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $type;

    /**
     * A description for security scheme. [CommonMark] syntax _MAY_
     * be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * A description for security scheme. [CommonMark] syntax _MAY_
     * be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * **REQUIRED**. The name of the header, query or cookie parameter to be used.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The name of the header, query or cookie parameter to be used.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"query"`, `"header"`, `"cookie"`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $in
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const in = 'in';

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $in;

    /**
     * **REQUIRED**. The name of the HTTP Authentication scheme to be used
     * in the Authorization header as defined in [RFC7235] Section 5.1.
     * The values used SHOULD be registered in the IANA Authentication
     * Scheme registry. The value is case-insensitive, as defined in [
     * RFC7235] Section 2.1.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $scheme
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const scheme = 'scheme';

    /**
     * **REQUIRED**. The name of the HTTP Authentication scheme to be used
     * in the Authorization header as defined in [RFC7235] Section 5.1.
     * The values used SHOULD be registered in the IANA Authentication
     * Scheme registry. The value is case-insensitive, as defined in [
     * RFC7235] Section 2.1.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $scheme;

    /**
     * A hint to the client to identify how the bearer token is formatted.
     * Bearer tokens are usually generated by an authorization server, so
     * this information is primarily for documentation purposes.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $bearerFormat
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const bearerFormat = 'bearerFormat';

    /**
     * A hint to the client to identify how the bearer token is formatted.
     * Bearer tokens are usually generated by an authorization server, so
     * this information is primarily for documentation purposes.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $bearerFormat;

    /**
     * **REQUIRED**. Well-known URL to discover the [OpenID-Connect-Discovery]
     * provider metadata.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @see  $openIdConnectUrl
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const openIdConnectUrl = 'openIdConnectUrl';

    /**
     * A hint to the client to identify how the bearer token is formatted.
     * Bearer tokens are usually generated by an authorization server, so
     * this information is primarily for documentation purposes.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $openIdConnectUrl;

    /**
     * **REQUIRED**. An object containing configuration information for the
     * flow types supported.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @see  $flows
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const flows = 'flows';

    /**
     * **REQUIRED**. An object containing configuration information for the
     * flow types supported.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?OAuthFlows $flows;
}
