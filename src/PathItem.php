<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes the operations available on a single path. A Path Item ***MAY***
 * be empty, due to ACL constraints. The path itself is still exposed
 * to the documentation viewer but they will not know which
 * operations and parameters are available.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#path-item-object
 */
class PathItem
{
    use DataModel;

    /**
     * Allows for a referenced definition of this path item. The value
     * MUST be in the form of a URL, and the referenced structure MUST
     * be in the form of a Path Item Object. In case a Path Item
     * Object field appears both in the defined object and the
     * referenced object, the behavior is undefined. See the
     * rules for resolving Relative References.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  https://spec.openapis.org/oas/v3.0.4.html#path-item-object
     * @see  https://spec.openapis.org/oas/v3.0.4.html#relative-references-in-urls
     */
    public const ref = 'ref';

    /**
     * An optional string summary, intended to apply to all operations
     * in this path.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     */
    public const summary = 'summary';

    /**
     * An optional string description, intended to apply to all operations
     * in this path. [CommonMark] syntax ***MAY*** be used for rich text
     * representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * Allows for a referenced definition of this path item. The value
     * MUST be in the form of a URL, and the referenced structure MUST
     * be in the form of a Path Item Object. In case a Path Item
     * Object field appears both in the defined object and the
     * referenced object, the behavior is undefined. See the
     * rules for resolving Relative References.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see  https://spec.openapis.org/oas/v3.0.4.html#path-item-object
     * @see  https://spec.openapis.org/oas/v3.0.4.html#relative-references-in-urls
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
    ])]
    public ?string $ref;

    /**
     * An optional string summary, intended to apply to all operations
     * in this path.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     */
    #[Describe(['missing_as_null'])]
    public ?string $summary;

    /**
     * An optional string description, intended to apply to all operations
     * in this path. [CommonMark] syntax ***MAY*** be used for rich text
     * representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6
     * @see https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

}
