<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 *  This section describes the structure of the OpenAPI Description format.
 * This text is the only normative description of the format. A JSON Schema
 * is hosted on spec.openapis.org for informational purposes. If the JSON
 * Schema differs from this section, then this section _MUST_ be
 * considered authoritative.
 *
 * In the following description, if a field is not explicitly **REQUIRED** or
 * described with a _MUST_ or _SHALL_, it can be considered _OPTIONAL_.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#schema-0
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class OpenApi
{
    use DataModel;

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * _SHOULD_ be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $openapi
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const openapi = 'openapi';

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * _SHOULD_ be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API `info.version` string
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => ''])]
    public string $openapi;

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata _MAY_
     * be used by tooling as required.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $info
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const info = 'info';

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata _MAY_
     * be used by tooling as required.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public Info $info;

    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is an
     * empty array, the default value would be a Server Object with a
     * url value of /
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $servers
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const servers = 'servers';

    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is an
     * empty array, the default value would be a Server Object with a
     * url value of `/`
     *
     * @var Server[]|Server
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'servers'],
        'type' => Server::class
    ])]
    public array|Server $servers;

    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is an
     * empty array, the default value would be a Server Object with a
     * url value of `/`
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $servers
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function servers(mixed $value): array|Server
    {
        return empty($value)
            ? Server::from([Server::url => '/'])
            : array_map(static fn(array|Server $server) => Server::from($server), $value);
    }

    /**
     * Holds the relative paths to the individual endpoints and their
     * operations. The path is appended to the URL from the Server
     * Object in order to construct the full URL. The Paths Object
     * _MAY_ be empty, due to Access Control List (ACL) constraints.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $paths
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const paths = 'paths';

    /**
     * Holds the relative paths to the individual endpoints and their
     * operations. The path is appended to the URL from the Server
     * Object in order to construct the full URL. The Paths Object
     * _MAY_ be empty, due to Access Control List (ACL) constraints.
     *
     * @var array<string, PathItem> $paths
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PathItem::class,
        'required'
    ])]
    public array $paths;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $components
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const components = 'components';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Components $components;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $security
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const security = 'security';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => []])]
    public array $security;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $tags
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const tags = 'tags';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @var Tag[] $tags
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Tag::class,
        'default' => []
    ])]
    public array $tags;

    /**
     * Additional external documentation for this tag.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @see  $externalDocs
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this tag.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?ExternalDocumentation $externalDocs;
}