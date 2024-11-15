<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * The Schema Object allows the definition of input and output data types.
 * These types can be objects, but also primitives and arrays. This object
 * is an extended subset of the JSON Schema Specification Draft Wright-00.
 *
 * For more information about the keywords, see JSON Schema Core and JSON
 * Schema Validation. Unless stated otherwise, the keyword definitions
 * follow those of JSON Schema and do not add any additional semantics.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#schema-object
 * @see  https://spec.openapis.org/oas/v3.0.4.html#bib-json-schema-05
 * @see  https://spec.openapis.org/oas/v3.0.4.html#bib-json-schema-validation-05
 */
class Schema
{
    use DataModel;

    /**
     * This keyword only takes effect if `type` is explicitly defined within the
     * same Schema Object. A `true` value indicates that both `null` values and
     * values of the type specified by `type` are allowed. Other Schema Object
     * constraints retain their defined behavior, and therefore may disallow
     * the use of `null` as a value. A `false` value leaves the specified or
     * default `type` unmodified. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const nullable = 'nullable';

    /**
     * Adds support for polymorphism. The discriminator is used to determine
     * which of a set of schemas a payload is expected to satisfy. See
     * Composition and Inheritance for more details.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const discriminator = 'discriminator';

    /**
     * This keyword only takes effect if `type` is explicitly defined within the
     * same Schema Object. A `true` value indicates that both `null` values and
     * values of the type specified by `type` are allowed. Other Schema Object
     * constraints retain their defined behavior, and therefore may disallow
     * the use of `null` as a value. A `false` value leaves the specified or
     * default `type` unmodified. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['default' => false])]
    public bool $nullable;

    /**
     * Adds support for polymorphism. The discriminator is used to determine
     * which of a set of schemas a payload is expected to satisfy. See
     * Composition and Inheritance for more details.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['missing_as_null'])]
    public ?Discriminator $discriminator;
}
