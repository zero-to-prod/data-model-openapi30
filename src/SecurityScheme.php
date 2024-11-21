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
 * @link https://spec.openapis.org/oas/v3.0.4.html#security-scheme-object-0
 */
class SecurityScheme
{
    use DataModel;

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    public const type = 'type';

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => <<<'PHP'
            in_array(strtolower($value), array_map("strtolower", ["apiKey", "http", "oauth2", "openIdConnect"]), true)
        PHP,
        'false' => [self::class, 'throwException'],
        'exception' => InvalidSecuritySchemeTypeException::class,
        'message' => 'Valid values are "apiKey", "http", "oauth2", "openIdConnect".',
        'required'
    ])]
    public string $type;

    /**
     * A description for security scheme. [CommonMark] syntax _MAY_
     * be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    public const description = 'description';

    /**
     * A description for security scheme. [CommonMark] syntax _MAY_
     * be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * **REQUIRED**. The name of the header, query or cookie parameter to be used.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The name of the header, query or cookie parameter to be used.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    public const in = 'in';

    /**
     * **REQUIRED**. The type of the security scheme. Valid values are
     * `"apiKey"`, `"http"`, `"oauth2"`, `"openIdConnect"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => <<<'PHP'
            in_array(strtolower($value), array_map("strtolower", ["query", "header", "cookie"]), true)
        PHP,
        'false' => [self::class, 'throwException'],
        'exception' => InvalidSecuritySchemeInException::class,
        'message' => 'Valid values are "query", "header", and "cookie".',
        'required'
    ])]
    public string $in;

    /**
     * **REQUIRED**. The name of the HTTP Authentication scheme to be used
     * in the Authorization header as defined in [RFC7235] Section 5.1.
     * The values used SHOULD be registered in the IANA Authentication
     * Scheme registry. The value is case-insensitive, as defined in [
     * RFC7235] Section 2.1.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    public const scheme = 'scheme';

    /**
     * **REQUIRED**. The name of the HTTP Authentication scheme to be used
     * in the Authorization header as defined in [RFC7235] Section 5.1.
     * The values used SHOULD be registered in the IANA Authentication
     * Scheme registry. The value is case-insensitive, as defined in [
     * RFC7235] Section 2.1.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'required'
    ])]
    public string $scheme;
}
