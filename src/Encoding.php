<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * A single encoding definition applied to a single schema property.
 * See Appendix B for a discussion of converting values of various
 * types to string representations.
 *
 * Properties are correlated with `multipart` parts using the name
 * parameter of `Content-Disposition: form-data`, and with
 * `application/x-www-form-urlencoded` using the query
 * string parameter names. In both cases, their order
 * is implementation-defined.
 *
 * See Appendix E for a detailed examination of percent-encoding concerns for form media types.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#encoding-object
 */
class Encoding
{
    use DataModel;

    /**
     * The `Content-Type` for encoding a specific property. The value is a
     * comma-separated list, each element of which is either a specific
     * media type (e.g. `image/png`) or a wildcard media type (e.g.
     * `image/*`). Default value depends on the property type as
     * shown in the table below.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0
     */
    public const contentType = 'contentType';

    /**
     * A map allowing additional information to be provided as headers.
     * `Content-Type` is described separately and **SHALL** be ignored
     * in this section. This field **SHALL** be ignored if the request
     * body media type is not a multipart.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0
     */
    public const headers = 'headers';

    /**
     * Describes how a specific property value will be serialized depending on its
     * type. See Parameter Object for details on the `style` field. The behavior
     * follows the same values as `query` parameters, including default values.
     * Note that the initial `?` used in query strings is not used in
     * `application/x-www-form-urlencoded` message bodies, and
     * **MUST** be removed (if using an RFC6570 implementation)
     * or simply not added (if constructing the string
     * manually). This field **SHALL** be ignored if
     * the request body media type is not
     * `application/x-www-form-urlencoded`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0
     */
    public const style = 'style';

    /**
     * When this is true, property values of type `array` or `object` generate separate
     * parameters for each value of the array, or key-value-pair of the map. For other
     * types of properties this field has no effect. When `style` is `"form"`, the
     * default value is `true`. For all other styles, the default value is `false`.
     * Note that despite `false` being the default for `deepObject`, the
     * combination of `false` with `deepObject` is undefined. This field
     * **SHALL** be ignored if the request body media type is not
     * `application/x-www-form-urlencoded`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const explode = 'explode';

    /**
     * When this is true, parameter values are serialized using reserved expansion,
     * as defined by [RFC6570] Section 3.2.3, which allows RFC3986’s reserved
     * character set, as well as percent-encoded triples, to pass through
     * unchanged, while still percent-encoding all other disallowed
     * characters (including `%` outside of percent-encoded triples).
     * Applications are still responsible for percent-encoding
     * reserved characters that are not allowed in the query
     * string (`[`, `]`, `#`), or have a special meaning in
     * `application/x-www-form-urlencoded` (`-`, `&`, `+`);
     * see Appendices C and E for details. The default
     * value is `false`. This field **SHALL** be
     * ignored if the request body media type is
     * not `application/x-www-form-urlencoded`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    public const allowReserved = 'allowReserved';

    /**
     * The `Content-Type` for encoding a specific property. The value is a
     * comma-separated list, each element of which is either a specific
     * media type (e.g. `image/png`) or a wildcard media type (e.g.
     * `image/*`). Default value depends on the property type as
     * shown in the table below.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0
     */
    #[Describe(['missing_as_null'])]
    public ?string $contentType;

    /**
     * A map allowing additional information to be provided as headers.
     * `Content-Type` is described separately and **SHALL** be ignored
     * in this section. This field **SHALL** be ignored if the request
     * body media type is not a multipart.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0
     */
    #[Describe(['cast' => [self::class, 'headers']])]
    public null|Header|Reference $headers;

    public static function headers($value, array $context): Header|Reference|null
    {
        if (!isset($context[self::headers])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : Header::from($value);
    }

    /**
     * Describes how a specific property value will be serialized depending on its
     * type. See Parameter Object for details on the `style` field. The behavior
     * follows the same values as `query` parameters, including default values.
     * Note that the initial `?` used in query strings is not used in
     * `application/x-www-form-urlencoded` message bodies, and
     * **MUST** be removed (if using an RFC6570 implementation)
     * or simply not added (if constructing the string
     * manually). This field **SHALL** be ignored if
     * the request body media type is not
     * `application/x-www-form-urlencoded`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0
     */
    #[Describe(['missing_as_null'])]
    public ?string $style;

    /**
     * When this is true, property values of type `array` or `object` generate separate
     * parameters for each value of the array, or key-value-pair of the map. For other
     * types of properties this field has no effect. When `style` is `"form"`, the
     * default value is `true`. For all other styles, the default value is `false`.
     * Note that despite `false` being the default for `deepObject`, the
     * combination of `false` with `deepObject` is undefined. This field
     * **SHALL** be ignored if the request body media type is not
     * `application/x-www-form-urlencoded`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['default' => false])]
    public bool $explode;

    /**
     * When this is true, parameter values are serialized using reserved expansion,
     * as defined by [RFC6570] Section 3.2.3, which allows RFC3986’s reserved
     * character set, as well as percent-encoded triples, to pass through
     * unchanged, while still percent-encoding all other disallowed
     * characters (including `%` outside of percent-encoded triples).
     * Applications are still responsible for percent-encoding
     * reserved characters that are not allowed in the query
     * string (`[`, `]`, `#`), or have a special meaning in
     * `application/x-www-form-urlencoded` (`-`, `&`, `+`);
     * see Appendices C and E for details. The default
     * value is `false`. This field **SHALL** be
     * ignored if the request body media type is
     * not `application/x-www-form-urlencoded`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1
     */
    #[Describe(['default' => false])]
    public bool $allowReserved;
}
