<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes a single API operation on a path.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#operation-object
 */
class Operation
{
    use DataModel;

    /**
     * A list of tags for API documentation control. Tags can be used
     * for logical grouping of operations by resources or any other
     * qualifier.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const tags = 'tags';

    /**
     * A list of tags for API documentation control. Tags can be used
     * for logical grouping of operations by resources or any other
     * qualifier.
     *
     * @var string[] $tags
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?array $tags;

    /**
     * A short summary of what the operation does.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const summary = 'summary';

    /**
     * A short summary of what the operation does.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?string $summary;

    /**
     * A verbose explanation of the operation behavior. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * A verbose explanation of the operation behavior. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * Additional external documentation for this operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?ExternalDocumentation $externalDocs;

    /**
     * Unique string used to identify the operation. The id _MUST_ be unique
     * among all operations described in the API. The `operationId` value is
     * **case-sensitive**. Tools and libraries _MAY_ use the `operationId`
     * to uniquely identify an operation, therefore, it is _RECOMMENDED_
     * to follow common programming naming conventions.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const operationId = 'operationId';

    /**
     * Unique string used to identify the operation. The id _MUST_ be unique
     * among all operations described in the API. The `operationId` value is
     * **case-sensitive**. Tools and libraries _MAY_ use the `operationId`
     * to uniquely identify an operation, therefore, it is _RECOMMENDED_
     * to follow common programming naming conventions.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?string $operationId;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined in the Path Item, the new definition will override it
     * but can never remove it. The list _MUST NOT_ include duplicated
     * parameters. A unique parameter is defined by a combination of a
     * name and location. The list can use the Reference Object to link
     * to parameters that are defined in the OpenAPI Object’s
     * `components.parameters`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['cast' => [self::class, 'parameters']])]
    public ?array $parameters;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined in the Path Item, the new definition will override it
     * but can never remove it. The list _MUST NOT_ include duplicated
     * parameters. A unique parameter is defined by a combination of a
     * name and location. The list can use the Reference Object to link
     * to parameters that are defined in the OpenAPI Object’s
     * `components.parameters`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public static function parameters($value, array $context): ?array
    {
        return isset($context[self::parameters])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Parameter::from($value),
                $value
            )
            : null;
    }

    /**
     * The request body applicable for this operation. The `requestBody` is only supported
     * in HTTP methods where the HTTP 1.1 specification [RFC7231] Section 4.3.1 has
     * explicitly defined semantics for request bodies. In other cases where the
     * HTTP spec is vague (such as GET, HEAD and DELETE), `requestBody` _SHALL_ be
     * ignored by consumers.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const requestBody = 'requestBody';

    /**
     * The request body applicable for this operation. The `requestBody` is only supported
     * in HTTP methods where the HTTP 1.1 specification [RFC7231] Section 4.3.1 has
     * explicitly defined semantics for request bodies. In other cases where the
     * HTTP spec is vague (such as GET, HEAD and DELETE), `requestBody` _SHALL_ be
     * ignored by consumers.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['cast' => [self::class, 'requestBody']])]
    public null|RequestBody|Reference $requestBody;

    /**
     * A list of parameters that are applicable for this operation. If a parameter
     * is already defined in the Path Item, the new definition will override it
     * but can never remove it. The list _MUST NOT_ include duplicated
     * parameters. A unique parameter is defined by a combination of a
     * name and location. The list can use the Reference Object to link
     * to parameters that are defined in the OpenAPI Object’s
     * `components.parameters`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public static function requestBody($value, array $context): null|RequestBody|Reference
    {
        if (isset($context[self::requestBody])) {
            return isset($context[self::requestBody][Reference::ref])
                ? Reference::from($value)
                : RequestBody::from($value);
        }

        return null;
    }

    /**
     * **REQUIRED**. The list of possible responses as they are returned
     * from executing this operation.
     *
     * @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const responses = 'responses';

    /**
     * **REQUIRED**. The list of possible responses as they are returned
     * from executing this operation.
     *
     * @var array<string, Response|Reference> $examples
     *
     * @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['cast' => [self::class, 'responses']])]
    public array $responses;

    /**
     * **REQUIRED**. The list of possible responses as they are returned
     * from executing this operation.
     *
     * @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public static function responses($value, array $context): ?array
    {
        if (!isset($context[self::responses])) {
            throw new PropertyRequiredException('Property `$responses` is required.');
        }

        return array_map(
            static fn($value) => isset($value[Reference::ref])
                ? Reference::from($value)
                : Response::from($value),
            $value
        );
    }

    /**
     * A map of possible out-of band callbacks related to the parent operation.
     * The key is a unique identifier for the Callback Object. Each value in
     * the map is a Callback Object that describes a request that may be
     *
     * @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const callbacks = 'callbacks';

    /**
     * A map of possible out-of band callbacks related to the parent operation.
     * The key is a unique identifier for the Callback Object. Each value in
     * the map is a Callback Object that describes a request that may be
     * initiated by the API provider and the expected responses.
     *
     * @var array<string, PathItem|Reference> $examples
     *
     * @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['cast' => [self::class, 'callbacks']])]
    public ?array $callbacks;

    /**
     * A map of possible out-of band callbacks related to the parent operation.
     * The key is a unique identifier for the Callback Object. Each value in
     * the map is a Callback Object that describes a request that may be
     *
     * @link @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public static function callbacks($value, array $context): ?array
    {
        return isset($context[self::callbacks])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : array_map(static fn($item) => PathItem::from($item), $value),
                $value
            )
            : null;
    }

    /**
     * Declares this operation to be deprecated. Consumers _SHOULD_ refrain
     * from usage of the declared operation. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const deprecated = 'deprecated';

    /**
     * Declares this operation to be deprecated. Consumers _SHOULD_ refrain
     * from usage of the declared operation. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * A declaration of which security mechanisms can be used for this operation.
     * The list of values includes alternative Security Requirement Objects that
     * can be used. Only one of the Security Requirement Objects need to be
     * satisfied to authorize a request. To make security optional, an
     * empty security requirement (`{}`) can be included in the array.
     * This definition overrides any declared top-level security.
     * To remove a top-level `security` declaration, an empty
     * array can be used.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const security = 'security';

    /**
     * A declaration of which security mechanisms can be used for this operation.
     * The list of values includes alternative Security Requirement Objects that
     * can be used. Only one of the Security Requirement Objects need to be
     * satisfied to authorize a request. To make security optional, an
     * empty security requirement (`{}`) can be included in the array.
     * This definition overrides any declared top-level security.
     * To remove a top-level `security` declaration, an empty
     * array can be used.
     *
     * @var array<string, string[]> $security
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?array $security;

    /**
     * An alternative `servers` array to service this operation. If a `servers`
     * array is specified at the Path Item Object or OpenAPI Object level,
     * it will be overridden by this value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const servers = 'servers';

    /**
     * An alternative `servers` array to service this operation. If a `servers`
     * array is specified at the Path Item Object or OpenAPI Object level,
     * it will be overridden by this value.
     *
     * @var Server[]
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Server::class
    ])]
    public ?array $servers;
}
