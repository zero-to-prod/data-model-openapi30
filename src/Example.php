<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * An object grouping an internal or external example value with basic
 * `summary` and `description` metadata. This object is typically used
 * in fields named `examples` (plural), and is a referenceable
 * alternative to older `example` (singular) fields that do
 * not support referencing or metadata.
 *
 * Examples allow demonstration of the usage of properties, parameters
 * and objects within OpenAPI.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#example-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Example
{
    use DataModel;

    /**
     * Short description for the example.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @see  $summary
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const summary = 'summary';

    /**
     * Short description for the example.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $summary;

    /**
     * Long description for the example. [CommonMark] syntax _MAY_ be
     * used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * Long description for the example. [CommonMark] syntax _MAY_ be
     *  used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Embedded literal example. The `value` field and `externalValue` field
     * are mutually exclusive. To represent examples of media types that
     * cannot naturally represented in JSON or YAML, use a string value
     * to contain the example, escaping where necessary.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @see  $value
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const value = 'value';

    /**
     * Embedded literal example. The `value` field and `externalValue` field
     * are mutually exclusive. To represent examples of media types that
     * cannot naturally represented in JSON or YAML, use a string value
     * to contain the example, escaping where necessary.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public mixed $value;

    /**
     * A URL that points to the literal example. This provides the capability
     * to reference examples that cannot easily be included in JSON or YAML
     * documents. The `value` field and `externalValue` field are mutually
     * exclusive. See the rules for resolving Relative References.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @see  $externalValue
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const externalValue = 'externalValue';

    /**
     * A URL that points to the literal example. This provides the capability
     * to reference examples that cannot easily be included in JSON or YAML
     * documents. The `value` field and `externalValue` field are mutually
     * exclusive. See the rules for resolving Relative References.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $externalValue;
}
