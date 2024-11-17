<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes a single operation parameter.
 *
 * A unique parameter is defined by a combination of a name and location.
 *
 * See Appendix E for a detailed examination of percent-encoding concerns,
 * including interactions with the `application/x-www-form-urlencoded` query string format.
 *
 * The rules for serialization of the parameter are specified in one of two ways.
 * Parameter Objects ***_MUST_*** include either a `content` field or a `schema` field, but
 * not both. See Appendix B for a discussion of converting values of various
 * types to string representations.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#parameter-object
 * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-name
 * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
 * @see  https://spec.openapis.org/oas/v3.0.4.html#appendix-e-percent-encoding-and-form-media-types
 *
 */
class Parameter
{
    use DataModel;

    /**
     * **REQUIRED**. The name of the parameter. Parameter names are case sensitive.
     *
     * - If `in` is `"path"`, the name field _MUST_ correspond to a template expression
     * occurring within the path field in the Paths Object. See Path Templating
     * for further information.
     * - If `in` is `"header"` and the name field is `"Accept"`, `"Content-Type"` or
     * `"Authorization"`, the parameter definition _SHALL_ be ignored.
     * - For all other cases, the `name` corresponds to the parameter name used
     * by the `in` field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     * @see  https://spec.openapis.org/oas/v3.0.4.html#paths-path
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields:~:text=field%20in%20the-,Paths%20Object,-.%20See%20Path%20Templating
     * @see  https://spec.openapis.org/oas/v3.0.4.html#path-templating
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The location of the parameter. Possible values are `"query"`,
     * `"header"`, `"path"` or `"cookie"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    public const in = 'in';

    /**
     * A brief description of the parameter. This could contain examples of use.
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * Determines whether this parameter is mandatory. If the parameter
     * location is `"path"`, this field is **REQUIRED** and its value ***_MUST_***
     * be `true`. Otherwise, the field _MAY_ be included and its default
     * value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     */
    public const required = 'required';

    /**
     * Specifies that a parameter is deprecated and ***_SHOULD_*** be transitioned
     * out of usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    public const deprecated = 'deprecated';

    /**
     * If `true`, clients _MAY_ pass a zero-length string value in place
     * of parameters that would otherwise be omitted entirely, which the
     * server ***_SHOULD_*** interpret as the parameter being unused.
     * Default value is `false`. If `style` is used, and if behavior
     * is n/a (cannot be serialized), the value of `allowEmptyValue`
     * _SHALL_ be ignored. Interactions between this field
     * and the parameter’s Schema Object are implementation-defined.
     * This field is valid only for query parameters. Use of
     * this field is ***NOT _RECOMMENDED_***, and it is likely
     * to be removed in a later revision.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-style
     * @see  https://spec.openapis.org/oas/v3.0.4.html#style-examples
     */
    public const allowEmptyValue = 'allowEmptyValue';

    /**
     * Describes how the parameter value will be serialized depending on the
     * type of the parameter value. Default values (based on value of `in`):
     * for `"query"` - `"form"`; for `"path"` - `"simple"`; for `"header"`
     * - `"simple"`; for `"cookie"` - `"form"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const style = 'style';

    /**
     * When this is `true`, parameter values of type `array` or `object` generate separate
     * parameters for each value of the array or key-value pair of the map. For other
     * types of parameters this field has no effect. When `style` is `"form"`, the
     * default value is `true`. For all other styles, the default value is `false`.
     * Note that despite `false` being the default for `deepObject`, the
     * combination of false with `deepObject` is undefined.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const explode = 'explode';

    /**
     * When this is `true`, parameter values are serialized using reserved expansion, as
     * defined by [RFC6570] Section 3.2.3, which allows RFC3986’s reserved character set,
     * as well as percent-encoded triples, to pass through unchanged, while still
     * percent-encoding all other disallowed characters (including `%` outside of
     * percent-encoded triples). Applications are still responsible for
     * percent-encoding reserved characters that are not allowed in the
     * query string (`[`, `]`, `#`), or have a special meaning in
     * `application/x-www-form-urlencoded` (`-`, `&`, `+`); see
     * Appendices C and E for details. This field only applies
     * to parameters with an `in` value of `query`. The
     * default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const allowReserved = 'allowReserved';

    /**
     * The schema defining the type used for the parameter.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public const schema = 'schema';

    /**
     * Example of the parameter’s potential value; see Working With Examples.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
     */
    public const example = 'example';

    /**
     * Examples of the parameter’s potential value; see Working With Examples.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    public const examples = 'examples';

    /**
     * **REQUIRED**. The name of the parameter. Parameter names are case sensitive.
     *
     * - If `in` is `"path"`, the name field _MUST_ correspond to a template expression
     * occurring within the path field in the Paths Object. See Path Templating
     * for further information.
     * - If `in` is `"header"` and the name field is `"Accept"`, `"Content-Type"` or
     * `"Authorization"`, the parameter definition _SHALL_ be ignored.
     * - For all other cases, the `name` corresponds to the parameter name used
     * by the `in` field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     * @see  https://spec.openapis.org/oas/v3.0.4.html#paths-path
     * @see  https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields:~:text=field%20in%20the-,Paths%20Object,-.%20See%20Path%20Templating
     * @see  https://spec.openapis.org/oas/v3.0.4.html#path-templating
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * **REQUIRED**. The location of the parameter. Possible values are `"query"`,
     * `"header"`, `"path"` or `"cookie"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Describe(['required'])]
    public string $in;

    /**
     * A brief description of the parameter. This could contain examples of use.
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * Determines whether this parameter is mandatory. If the parameter
     * location is `"path"`, this field is **REQUIRED** and its value ***_MUST_***
     * be `true`. Otherwise, the field _MAY_ be included and its default
     * value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     */
    #[Describe(['cast' => [self::class, 'required']])]
    public bool $required;

    /**
     * Determines whether this parameter is mandatory. If the parameter
     * location is `"path"`, this field is **REQUIRED** and its value ***_MUST_***
     * be `true`. Otherwise, the field _MAY_ be included and its default
     * value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     */
    public static function required($value, $context): bool
    {
        if (!$value && isset($context[self::in]) && $context[self::in] === 'path') {
            throw new InvalidInValueException('Property $required Should be true when $in is "path"');
        }

        return empty($value)
            ? false
            : $value;
    }

    /**
     * Specifies that a parameter is deprecated and ***_SHOULD_*** be transitioned
     * out of usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * If `true`, clients _MAY_ pass a zero-length string value in place
     * of parameters that would otherwise be omitted entirely, which the
     * server ***_SHOULD_*** interpret as the parameter being unused.
     * Default value is `false`. If `style` is used, and if behavior
     * is n/a (cannot be serialized), the value of `allowEmptyValue`
     * _SHALL_ be ignored. Interactions between this field
     * and the parameter’s Schema Object are implementation-defined.
     * This field is valid only for query parameters. Use of
     * this field is ***NOT _RECOMMENDED_***, and it is likely
     * to be removed in a later revision.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-style
     * @see  https://spec.openapis.org/oas/v3.0.4.html#style-examples
     */
    #[Describe(['default' => false])]
    public bool $allowEmptyValue;

    /**
     * Describes how the parameter value will be serialized depending on the
     * type of the parameter value. Default values (based on value of `in`):
     * for `"query"` - `"form"`; for `"path"` - `"simple"`; for `"header"`
     * - `"simple"`; for `"cookie"` - `"form"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    #[Describe(['cast' => [self::class, 'style']])]
    public ?string $style;

    /**
     * When this is `true`, parameter values of type `array` or `object` generate separate
     * parameters for each value of the array or key-value pair of the map. For other
     * types of parameters this field has no effect. When `style` is `"form"`, the
     * default value is `true`. For all other styles, the default value is `false`.
     * Note that despite `false` being the default for `deepObject`, the
     * combination of false with `deepObject` is undefined.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public static function style($value, $context): ?string
    {
        if (!$value && isset($context[self::in])) {
            return match ($context[self::in]) {
                'query', 'cookie' => 'form',
                'path', 'header' => 'simple',
                default => null,
            };
        }

        return is_string($value)
            ? $value
            : null;
    }

    /**
     * When this is `true`, parameter values of type `array` or `object` generate separate
     * parameters for each value of the array or key-value pair of the map. For other
     * types of parameters this field has no effect. When `style` is `"form"`, the
     * default value is `true`. For all other styles, the default value is `false`.
     * Note that despite `false` being the default for `deepObject`, the
     * combination of false with `deepObject` is undefined.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    #[Describe(['cast' => [self::class, 'explode']])]
    public bool $explode;

    /**
     * Describes how the parameter value will be serialized depending on the
     * type of the parameter value. Default values (based on value of `in`):
     * for `"query"` - `"form"`; for `"path"` - `"simple"`; for `"header"`
     * - `"simple"`; for `"cookie"` - `"form"`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    public static function explode($value, $context): bool
    {
        if (empty($value) && !is_bool($value) && isset($context[self::style])) {
            return $context[self::style] === 'form';
        }

        return is_bool($value)
            ? $value
            : false;
    }

    /**
     * When this is `true`, parameter values are serialized using reserved expansion, as
     * defined by [RFC6570] Section 3.2.3, which allows RFC3986’s reserved character set,
     * as well as percent-encoded triples, to pass through unchanged, while still
     * percent-encoding all other disallowed characters (including `%` outside of
     * percent-encoded triples). Applications are still responsible for
     * percent-encoding reserved characters that are not allowed in the
     * query string (`[`, `]`, `#`), or have a special meaning in
     * `application/x-www-form-urlencoded` (`-`, `&`, `+`); see
     * Appendices C and E for details. This field only applies
     * to parameters with an `in` value of `query`. The
     * default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema
     */
    #[Describe(['default' => false])]
    public bool $allowReserved;

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
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#working-with-examples
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
     * Example of the parameter’s potential value; see Working With Examples.
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
