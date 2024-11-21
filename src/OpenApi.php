<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;
use Zerotoprod\DataModelSemver\Semver;
use Zerotoprod\ValidateSemVer\ValidateSemVer;

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
 * @link https://spec.openapis.org/oas/v3.0.4.html#schema-0
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const openapi = 'openapi';

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * _SHOULD_ be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API `info.version` string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe([
        'required',
        'cast' => [self::class, 'openapi']
    ])]
    public string $openapi;

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * _SHOULD_ be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API `info.version` string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public static function openapi($value): string
    {
        if (!$value) {
            throw new PropertyRequiredException('Property `$openapi` is required.');
        }

        if (!ValidateSemVer::isValid($value)) {
            throw new InvalidOpenAPIVersionException('`$openapi` is an invalid version.');
        }

        $Semver = Semver::from($value);

        if ($Semver->major !== 3 || $Semver->minor !== 0 || $Semver->patch < 0) {
            throw new InvalidOpenAPIVersionException('Version should be 3.0.*');
        }

        return $value;
    }

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata _MAY_
     * be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const info = 'info';

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata _MAY_
     * be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe(['required'])]
    public Info $info;

    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is an
     * empty array, the default value would be a Server Object with a
     * url value of /
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const servers = 'servers';

    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is an
     * empty array, the default value would be a Server Object with a
     * url value of `/`
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const components = 'components';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe(['missing_as_null'])]
    public ?Components $components;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const security = 'security';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe(['default' => []])]
    public array $security;

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const tags = 'tags';

    /**
     * An element to hold various Objects for the OpenAPI Description.
     *
     * @var ?Tag[] $tags
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Tag::class,
    ])]
    public ?array $tags;
}