<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;
use Zerotoprod\DataModelSemver\Semver;
use Zerotoprod\ValidateSemVer\ValidateSemVer;

class OpenApi30
{
    use DataModel;

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * ***_SHOULD_*** be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const openapi = 'openapi';

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata _MAY_
     * be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const info = 'info';

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
     * Holds the relative paths to the individual endpoints and their
     * operations. The path is appended to the URL from the Server
     * Object in order to construct the full URL. The Paths Object
     * _MAY_ be empty, due to Access Control List (ACL) constraints.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#paths-object
     */
    public const paths = 'paths';

    /**
     * **REQUIRED**. This string _MUST_ be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * ***_SHOULD_*** be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe([
        'required',
        'cast' => [self::class, 'validateVersion']
    ])]
    public string $openapi;

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
     * @var Server[]|Server
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Describe([
        'cast' => [self::class, 'servers'],
        'type' => Server::class
    ])]
    public array|Server $servers;

    /**
     * Holds the relative paths to the individual endpoints and their
     * operations. The path is appended to the URL from the Server
     * Object in order to construct the full URL. The Paths Object
     * _MAY_ be empty, due to Access Control List (ACL) constraints.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#paths-object
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PathItem::class,
        'required'
    ])]
    public ?array $paths;

    public static function servers(mixed $value): array|Server
    {
        return empty($value)
            ? Server::from([Server::url => '/'])
            : array_map(static fn(array|Server $server) => Server::from($server), $value);
    }

    public static function validateVersion($value): string
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
}