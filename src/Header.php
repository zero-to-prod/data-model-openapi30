<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes a single header for HTTP responses and for individual parts in
 * `multipart` representations; see the relevant Response Object and
 * Encoding Object documentation for restrictions on which headers
 * can be described.
 *
 * The Header Object follows the structure of the Parameter Object, including
 * determining its serialization strategy based on whether `schema` or
 * `content` is present, with the following changes:
 *
 * 1. `name` **MUST NOT** be specified, it is given in the corresponding `headers` map.
 * 2. `in` **MUST NOT** be specified, it is implicitly in `header`.
 * 3. All traits that are affected by the location **MUST** be applicable to a location
 * of `header` (for example, `style`). This means that `allowEmptyValue` and
 * `allowReserved` MUST NOT be used, and style, if used, **MUST** be limited
 * to "simple".
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#reference-object
 */
class Header
{
    use DataModel;

    /**
     * A brief description of the header. This could contain examples of use.
     * [CommonMark] syntax MAY be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const description = 'description';

    /**
     * Determines whether this header is mandatory. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const required = 'required';

    /**
     * Specifies that the header is deprecated and SHOULD be transitioned out of
     * usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const deprecated = 'deprecated';

    /**
     * Describes how the header value will be serialized. The default (and only
     * legal value for headers) is "`simple`".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const style = 'style';

    /**
     * When this is true, header values of type `array` or `object` generate a single
     * header whose value is a comma-separated list of the array items or
     * key-value pairs of the map, see Style Examples. For other data
     * types this field has no effect. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const explode = 'explode';

    /**
     * The schema defining the type used for the parameter.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const schema = 'schema';

    /**
     * Example of the parameter’s potential value; see Working With Examples.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const example = 'example';

    /**
     * Examples of the parameter’s potential value; see Working With Examples.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const examples = 'examples';

    /**
     * A brief description of the header. This could contain examples of use.
     * [CommonMark] syntax MAY be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * Determines whether this header is mandatory. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['default' => false])]
    public bool $required;

    /**
     * Determines whether this header is mandatory. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * Describes how the header value will be serialized. The default (and only
     * legal value for headers) is "`simple`".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['missing_as_null'])]
    public ?string $style;

    /**
     * When this is true, header values of type `array` or `object` generate a single
     * header whose value is a comma-separated list of the array items or
     * key-value pairs of the map, see Style Examples. For other data
     * types this field has no effect. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['default' => false])]
    public bool $explode;

    /**
     * The schema defining the type used for the parameter.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    #[Describe(['cast' => [self::class, 'schema']])]
    public null|Schema|Reference $schema;

    public static function schema($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::schema])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : Schema::from($value);
    }

    /**
     * Example of the parameter’s potential value; see Working With Examples.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['missing_as_null'])]
    public mixed $example;

    /**
     * Example of the parameter’s potential value; see Working With Examples.
     *
     * @var array<string, Example|Reference> $examples
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
     */
    #[Describe(['cast' => [self::class, 'examples']])]
    public ?array $examples;

    /**
     * Examples of the parameter’s potential value; see Working With Examples.
     *
     * @return ?array<string, Example|Reference>
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
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
}