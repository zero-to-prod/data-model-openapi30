<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#external-documentation-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class ExternalDocumentation
{
    use DataModel;

    /**
     * A description of the target documentation. [CommonMark] syntax
     * _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     * @see  https://spec.commonmark.org/
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * A description of the target documentation. [CommonMark] syntax
     * _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     * @see  https://spec.commonmark.org
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const url = 'url';

    /**
     * **REQUIRED**. The URL for the target documentation. This _MUST_ be
     * in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $url;
}
