<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Holds a set of reusable objects for different aspects of the OAS.
 * All objects defined within the Components Object will have no
 * effect on the API unless they are explicitly referenced from
 * outside the Components Object.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#components-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Components
{
    use DataModel;

    /**
     * An object to hold reusable Schema Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $schemas
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const schemas = 'schemas';

    /**
     * An object to hold reusable Schema Objects.
     *
     * @var ?array<string, Schema|Reference> $schemas
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'schemas']])]
    public array $schemas;

    /**
     * An object to hold reusable Schema Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $schemas
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function schemas($value, array $context): array
    {
        return isset($context[self::schemas])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Schema::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Response Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $responses
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const responses = 'responses';

    /**
     * An object to hold reusable Response Objects.
     *
     * @var ?array<string, Response|Reference> $responses
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'responses']])]
    public array $responses;

    /**
     * An object to hold reusable Response Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $responses
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function responses($value, array $context): array
    {
        return isset($context[self::responses])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Response::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $parameters
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const parameters = 'parameters';

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @var ?array<string, Parameter|Reference> $parameters
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'parameters']])]
    public array $parameters;

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
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

    /**
     * An object to hold reusable Example Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $examples
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const examples = 'examples';

    /**
     * An object to hold reusable Example Objects.
     *
     * @var array<string, Example|Reference> $examples
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'examples']])]
    public array $examples;

    /**
     * An object to hold reusable Example Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $examples
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function examples($value, array $context): array
    {
        return isset($context[self::examples])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Example::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $requestBodies
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const requestBodies = 'requestBodies';

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @var ?array<string, RequestBody|Reference> $requestBodies
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'requestBodies']])]
    public array $requestBodies;

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $requestBodies
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function requestBodies($value, array $context): array
    {
        return isset($context[self::requestBodies])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : RequestBody::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Header Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $headers
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const headers = 'headers';

    /**
     * An object to hold reusable Header Objects.
     *
     * @var array<string, Header|Reference> $headers
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'headers']])]
    public array $headers;

    /**
     * An object to hold reusable Header Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $headers
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function headers($value, array $context): array
    {
        return isset($context[self::headers])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Header::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $securitySchemes
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const securitySchemes = 'securitySchemes';

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @var ?array<string, SecurityScheme|Reference> $securitySchemes
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'securitySchemes']])]
    public array $securitySchemes;

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $securitySchemes
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function securitySchemes($value, array $context): array
    {
        return isset($context[self::securitySchemes])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : SecurityScheme::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Link Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $links
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const links = 'links';

    /**
     * An object to hold reusable Link Objects.
     *
     * @var array<string, Link|Reference> $links
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'links']])]
    public array $links;

    /**
     * An object to hold reusable Link Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $links
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function links($value, array $context): array
    {
        return isset($context[self::links])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Link::from($value),
                $value
            )
            : [];
    }

    /**
     * An object to hold reusable Callback Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $callbacks
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const callbacks = 'callbacks';

    /**
     * An object to hold reusable Callback Objects.
     *
     * @var array<string, array<string, PathItem>> $callbacks
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'callbacks']])]
    public array $callbacks;

    /**
     * An object to hold reusable Callback Objects.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     * @see  $callbacks
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function callbacks($value, array $context): array
    {
        return isset($context[self::callbacks])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : array_map(static fn($item) => PathItem::from($item), $value),
                $value
            )
            : [];
    }
}
