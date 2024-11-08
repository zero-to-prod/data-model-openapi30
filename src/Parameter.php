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
 * Parameter Objects **MUST** include either a `content` field or a `schema` field, but
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
     * - If `in` is `"path"`, the name field MUST correspond to a template expression
     * occurring within the path field in the Paths Object. See Path Templating
     * for further information.
     * - If `in` is `"header"` and the name field is `"Accept"`, `"Content-Type"` or
     * `"Authorization"`, the parameter definition ***SHALL*** be ignored.
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
     * [CommonMark] syntax ***MAY*** be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * Determines whether this parameter is mandatory. If the parameter
     * location is `"path"`, this field is **REQUIRED** and its value **MUST**
     * be `true`. Otherwise, the field ***MAY*** be included and its default
     * value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     */
    public const required = 'required';

    /**
     * Specifies that a parameter is deprecated and ***SHOULD*** be transitioned
     * out of usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    public const deprecated = 'deprecated';

    /**
     * **REQUIRED**. The name of the parameter. Parameter names are case sensitive.
     *
     * - If `in` is `"path"`, the name field MUST correspond to a template expression
     * occurring within the path field in the Paths Object. See Path Templating
     * for further information.
     * - If `in` is `"header"` and the name field is `"Accept"`, `"Content-Type"` or
     * `"Authorization"`, the parameter definition ***SHALL*** be ignored.
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
     * [CommonMark] syntax ***MAY*** be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * Determines whether this parameter is mandatory. If the parameter
     * location is `"path"`, this field is **REQUIRED** and its value **MUST**
     * be `true`. Otherwise, the field ***MAY*** be included and its default
     * value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see  https://spec.openapis.org/oas/v3.0.4.html#parameter-in
     */
    #[Describe(['default' => false])]
    public bool $required;

    /**
     * Specifies that a parameter is deprecated and ***SHOULD*** be transitioned
     * out of usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * If `true`, clients ***MAY*** pass a zero-length string value in place
     * of parameters that would otherwise be omitted entirely, which the
     * server ***SHOULD*** interpret as the parameter being unused.
     * Default value is `false`. If `style` is used, and if behavior
     * is n/a (cannot be serialized), the value of `allowEmptyValue`
     * ***SHALL*** be ignored. Interactions between this field
     * and the parameter’s Schema Object are implementation-defined.
     * This field is valid only for query parameters. Use of
     * this field is ***NOT RECOMMENDED***, and it is likely
     * to be removed in a later revision.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     * @see https://spec.openapis.org/oas/v3.0.4.html#parameter-style
     * @see https://spec.openapis.org/oas/v3.0.4.html#style-examples
     */
    #[Describe(['default' => false])]
    public bool $allowEmptyValue;
}
