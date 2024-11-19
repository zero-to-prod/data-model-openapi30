<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#external-documentation-object
 */
class ExternalDocumentation
{
    use DataModel;

    /**
     * A description of the target documentation. [CommonMark] syntax
     * _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * A description of the target documentation. [CommonMark] syntax
     * _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     */
    public const url = 'url';

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
        'required'
    ])]
    public string $url;
}
