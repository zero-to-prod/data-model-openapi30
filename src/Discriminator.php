<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * When request bodies or response payloads may be one of a number of different
 * schemas, a Discriminator Object gives a hint about the expected schema of
 * the document. This hint can be used to aid in serialization,
 * deserialization, and validation. The Discriminator Object
 * does this by implicitly or explicitly associating the
 * possible values of a named property with alternative
 * schemas.
 *
 * Note that `discriminator` _MUST NOT_ change the validation outcome of the schema.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#discriminator-object
 */
class Discriminator
{
    use DataModel;

    /**
     * **REQUIRED**. The name of the property in the payload that will hold
     * the discriminating value. This property _SHOULD_ be required in the
     * payload schema, as the behavior when the property is absent is
     * undefined.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#discriminator-object
     */
    public const propertyName = 'propertyName';

    /**
     * An object to hold mappings between payload values and schema names or
     * URI references.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#discriminator-object
     */
    public const mapping = 'mapping';

    /**
     * **REQUIRED**. The name of the property in the payload that will hold
     * the discriminating value. This property _SHOULD_ be required in the
     * payload schema, as the behavior when the property is absent is
     * undefined.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#discriminator-object
     */
    #[Describe(['required'])]
    public string $propertyName;

    /**
     * An object to hold mappings between payload values and schema names or
     * URI references.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#discriminator-object
     */
    #[Describe(['missing_as_null'])]
    public ?array $mapping;
}
