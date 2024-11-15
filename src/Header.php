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
}
