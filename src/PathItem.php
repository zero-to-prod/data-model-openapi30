<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes the operations available on a single path. A Path Item _MAY_
 * be empty, due to ACL constraints. The path itself is still exposed
 * to the documentation viewer, but they will not know which
 * operations and parameters are available.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#path-item-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class PathItem
{
    use DataModel;

    /**
     * Allows for a referenced definition of this path item. The value
     * _MUST_ be in the form of a URL, and the referenced structure _MUST_
     * be in the form of a Path Item Object. In case a Path Item
     * Object field appears both in the defined object and the
     * referenced object, the behavior is undefined. See the
     * rules for resolving Relative References.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  https://spec.openapis.org/oas/v3.0.4.html#path-item-object
     * @see  https://spec.openapis.org/oas/v3.0.4.html#relative-references-in-urls
     * @see  $ref
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const ref = '$ref';

    /**
     * Allows for a referenced definition of this path item. The value
     * _MUST_ be in the form of a URL, and the referenced structure _MUST_
     * be in the form of a Path Item Object. In case a Path Item
     * Object field appears both in the defined object and the
     * referenced object, the behavior is undefined. See the
     * rules for resolving Relative References.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  https://spec.openapis.org/oas/v3.0.4.html#path-item-object
     * @see  https://spec.openapis.org/oas/v3.0.4.html#relative-references-in-urls
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['from' => self::ref])]
    public ?string $ref = null;

    /**
     * An optional string summary, intended to apply to all operations
     * in this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $summary
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const summary = 'summary';

    /**
     * An optional string summary, intended to apply to all operations
     * in this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $summary;

    /**
     * An optional string description, intended to apply to all operations
     * in this path. [CommonMark] syntax _MAY_ be used for rich text
     * representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  https://spec.commonmark.org/
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * An optional string description, intended to apply to all operations
     * in this path. [CommonMark] syntax _MAY_ be used for rich text
     * representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  https://spec.commonmark.org
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * A definition of a GET operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $get
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const get = 'get';

    /**
     * A definition of a GET operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $get;

    /**
     * A definition of a PUT operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $put
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const put = 'put';

    /**
     * A definition of a PUT operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $put;

    /**
     * A definition of a POST operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $post
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const post = 'post';

    /**
     * A definition of a POST operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $post;

    /**
     * A definition of a DELETE operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $delete
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const delete = 'delete';

    /**
     * A definition of a DELETE operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $delete;

    /**
     * A definition of a OPTIONS operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $options
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const options = 'options';

    /**
     * A definition of a OPTIONS operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $options;

    /**
     * A definition of a HEAD operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $head
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const head = 'head';

    /**
     * A definition of a HEAD operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $head;

    /**
     * A definition of a PATCH operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $patch
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const patch = 'patch';

    /**
     * A definition of a PATCH operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $patch;

    /**
     * A definition of a TRACE operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $trace
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const trace = 'trace';

    /**
     * A definition of a TRACE operation on this path.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Operation $trace;

    /**
     * An alternative `servers` array to service this operation. If a `servers`
     * array is specified at the Path Item Object or OpenAPI Object level,
     * it will be overridden by this value.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $servers
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const servers = 'servers';

    /**
     * An alternative `servers` array to service this operation. If a `servers`
     * array is specified at the Path Item Object or OpenAPI Object level,
     * it will be overridden by this value.
     *
     * @var Server[]
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Server::class,
        'default' => [],
    ])]
    public array $servers;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined in the Path Item, the new definition will override it
     * but can never remove it. The list _MUST NOT_ include duplicated
     * parameters. A unique parameter is defined by a combination of a
     * name and location. The list can use the Reference Object to link
     * to parameters that are defined in the OpenAPI Object’s
     * `components.parameters`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const parameters = 'parameters';

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined in the Path Item, the new definition will override it
     * but can never remove it. The list _MUST NOT_ include duplicated
     * parameters. A unique parameter is defined by a combination of a
     * name and location. The list can use the Reference Object to link
     * to parameters that are defined in the OpenAPI Object’s
     * `components.parameters`.
     *
     * @var array<string, Parameter|Reference> $parameters
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'parameters'],
        'default' => []
    ])]
    public array $parameters;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined in the Path Item, the new definition will override it
     * but can never remove it. The list _MUST NOT_ include duplicated
     * parameters. A unique parameter is defined by a combination of a
     * name and location. The list can use the Reference Object to link
     * to parameters that are defined in the OpenAPI Object’s
     * `components.parameters`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function parameters($value, array $context): array
    {
        return isset($context[self::parameters])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Parameter::from($value),
                $value
            )
            : [];
    }

}
