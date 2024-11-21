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
 * @link https://spec.openapis.org/oas/v3.0.4.html#components-object
 */
class Components
{
    use DataModel;

    /**
     * An object to hold reusable Schema Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const schemas = 'schemas';

    /**
     * An object to hold reusable Schema Objects.
     *
     * @var null|array<string, Schema|Reference> $schemas
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'schemas']])]
    public ?array $schemas;

    /**
     * An object to hold reusable Schema Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function schemas($value, array $context): ?array
    {
        return isset($context[self::schemas])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Schema::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Response Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const responses = 'responses';

    /**
     * An object to hold reusable Response Objects.
     *
     * @var null|array<string, Response|Reference> $responses
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'responses']])]
    public ?array $responses;

    /**
     * An object to hold reusable Response Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function responses($value, array $context): ?array
    {
        return isset($context[self::responses])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Response::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const parameters = 'parameters';

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @var null|array<string, Parameter|Reference> $parameters
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'parameters']])]
    public ?array $parameters;

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
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
     * An object to hold reusable Example Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const examples = 'examples';

    /**
     * An object to hold reusable Example Objects.
     *
     * @var null|array<string, Example|Reference> $examples
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'examples']])]
    public ?array $examples;

    /**
     * An object to hold reusable Example Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function examples($value, array $context): ?array
    {
        return isset($context[self::examples])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Example::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const requestBodies = 'requestBodies';

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @var null|array<string, RequestBody|Reference> $requestBodies
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'requestBodies']])]
    public ?array $requestBodies;

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function requestBodies($value, array $context): ?array
    {
        return isset($context[self::requestBodies])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : RequestBody::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Header Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const headers = 'headers';

    /**
     * An object to hold reusable Header Objects.
     *
     * @var null|array<string, Header|Reference> $headers
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'headers']])]
    public ?array $headers;

    /**
     * An object to hold reusable Header Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function headers($value, array $context): ?array
    {
        return isset($context[self::headers])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Header::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const securitySchemes = 'securitySchemes';

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @var null|array<string, SecurityScheme|Reference> $securitySchemes
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'securitySchemes']])]
    public ?array $securitySchemes;

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function securitySchemes($value, array $context): ?array
    {
        return isset($context[self::securitySchemes])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : SecurityScheme::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Link Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const links = 'links';

    /**
     * An object to hold reusable Link Objects.
     *
     * @var null|array<string, Link|Reference> $links
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'links']])]
    public ?array $links;

    /**
     * An object to hold reusable Link Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public static function links($value, array $context): ?array
    {
        return isset($context[self::links])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Link::from($value),
                $value
            )
            : null;
    }

    /**
     * An object to hold reusable Callback Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    public const callbacks = 'callbacks';

    /**
     * An object to hold reusable Callback Objects.
     *
     * @var array<string, array<string, PathItem>> $callbacks
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
     */
    #[Describe(['cast' => [self::class, 'callbacks']])]
    public ?array $callbacks;

    /**
     * An object to hold reusable Callback Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5
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
}
