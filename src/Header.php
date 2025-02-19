<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
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
 * 1. `name` _MUST NOT_ be specified, it is given in the corresponding `headers` map.
 * 2. `in` _MUST NOT_ be specified, it is implicitly in `header`.
 * 3. All traits that are affected by the location _MUST_ be applicable to a location
 * of `header` (for example, `style`). This means that `allowEmptyValue` and
 * `allowReserved` _MUST NOT_ be used, and style, if used, _MUST_ be limited
 * to "simple".
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#reference-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Header
{
    use DataModel;

    /**
     * A brief description of the header. This could contain examples of use.
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * A brief description of the header. This could contain examples of use.
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Determines whether this header is mandatory. The default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @see  $required
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const required = 'required';

    /**
     * Determines whether this header is mandatory. The default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => false])]
    public bool $required;

    /**
     * Specifies that the header is deprecated and _SHOULD_ be transitioned out of
     * usage. Default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @see  $deprecated
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const deprecated = 'deprecated';

    /**
     * Determines whether this header is mandatory. The default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * Describes how the header value will be serialized. The default (and only
     * legal value for headers) is `"simple`".
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @see  $style
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const style = 'style';

    /**
     * Describes how the header value will be serialized. The default (and only
     * legal value for headers) is `"simple`".
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $style;

    /**
     * When this is true, header values of type `array` or `object` generate a single
     * header whose value is a comma-separated list of the array items or
     * key-value pairs of the map, see Style Examples. For other data
     * types this field has no effect. The default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @see  $explode
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const explode = 'explode';

    /**
     * When this is true, header values of type `array` or `object` generate a single
     * header whose value is a comma-separated list of the array items or
     * key-value pairs of the map, see Style Examples. For other data
     * types this field has no effect. The default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => false])]
    public bool $explode;

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const schema = 'schema';

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'schema']])]
    public null|Schema|Reference $schema;

    /**
     * The schema defining the type used for the parameter.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
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
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     * @see  $example
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const example = 'example';

    /**
     * Example of the parameter’s potential value; see Working With Examples.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public mixed $example;

    /**
     * Examples of the parameter’s potential value; see Working With Examples.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
     * @see  $examples
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const examples = 'examples';

    /**
     * Example of the parameter’s potential value; see Working With Examples.
     *
     * @var array<string, Example|Reference> $examples
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'examples']])]
    public array $examples;

    /**
     * Examples of the parameter’s potential value; see Working With Examples.
     *
     * @return array<string, Example|Reference>
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
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
     * A map containing the representations for the header. The key is the
     * media type and the value describes it. The map _MUST_ only contain
     * one entry.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-content-0
     * @see  $content
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const content = 'content';

    /**
     * A map containing the representations for the header. The key is the
     * media type and the value describes it. The map _MUST_ only contain
     * one entry.
     *
     * @var array<string, MediaType> $content
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-content-0
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => MediaType::class,
        'default' => []
    ])]
    public array $content;
}
