<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\DataModel;
use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;

class OpenApi30
{
    use DataModel;

    /**
     * REQUIRED. This string MUST be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * SHOULD be used by tooling to interpret the OpenAPI Document.
     * This is not related to the API info.version string
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    public const openapi = 'openapi';

    /**
     * REQUIRED. Provides metadata about the API. The metadata MAY
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
     * REQUIRED. This string MUST be the version number of the OpenAPI
     * Specification that the OpenAPI Document uses. The openapi field
     * SHOULD be used by tooling to interpret the OpenAPI Document.
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
     * REQUIRED. Provides metadata about the API. The metadata MAY
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

        $components = explode('.', $value);

        if ($components[0] !== '3' || $components[1] !== '0') {
            throw new InvalidOpenAPIVersionException('Version should be 3.0.*');
        }

        return $value;
    }
}