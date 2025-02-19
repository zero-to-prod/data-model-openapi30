<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * A simple object to allow referencing other components in the OpenAPI Description, internally and externally.
 *
 * The Reference Object is defined by JSON Reference and follows the same structure, behavior and rules.
 *
 * For this specification, reference resolution is accomplished as defined by the JSON Reference
 * specification and not by the JSON Schema specification.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#reference-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Reference
{
    use DataModel;

    /**
     * **REQUIRED**. The reference string.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19
     * @see  $ref
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const ref = '$ref';

    /**
     * **REQUIRED**. The reference string.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['from' => self::ref, 'required'])]
    public string $ref;
}
