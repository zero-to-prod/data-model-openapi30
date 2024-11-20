<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Holds a set of reusable objects for different aspects of the OAS.
 * All objects defined within the Components Object will have no
 * effect on the API unless they are explicitly referenced from
 * outside the Components Object.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#components-object
 */
class Component
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
                    : Example::from($value),
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
}
