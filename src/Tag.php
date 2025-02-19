<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Adds metadata to a single tag that is used by the Operation Object.
 * It is not mandatory to have a Tag Object per tag defined in the
 * Operation Object instances.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#tag-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Tag
{
    use DataModel;

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A description for the tag. [CommonMark] syntax _MAY_ be used for
     * rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * A description for the tag. [CommonMark] syntax _MAY_ be used for
     * rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Additional external documentation for this tag.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     * @see  $externalDocs
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this tag.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?ExternalDocumentation $externalDocs;
}
