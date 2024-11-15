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
 * @link https://spec.openapis.org/oas/v3.0.4.html#example-object
 */
class Example
{
    use DataModel;

    /**
     * Short description for the example.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    public const summary = 'summary';

    /**
     * Long description for the example. [CommonMark] syntax **MAY** be
     * used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    public const description = 'description';

    /**
     * Embedded literal example. The `value` field and `externalValue` field
     * are mutually exclusive. To represent examples of media types that
     * cannot naturally represented in JSON or YAML, use a string value
     * to contain the example, escaping where necessary.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    public const value = 'value';

    /**
     * A URL that points to the literal example. This provides the capability
     * to reference examples that cannot easily be included in JSON or YAML
     * documents. The `value` field and `externalValue` field are mutually
     * exclusive. See the rules for resolving Relative References.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    public const externalValue = 'externalValue';

    /**
     * Short description for the example.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    #[Describe(['missing_as_null'])]
    public ?string $summary;

    /**
     * Long description for the example. [CommonMark] syntax **MAY** be
     *  used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * Embedded literal example. The `value` field and `externalValue` field
     * are mutually exclusive. To represent examples of media types that
     * cannot naturally represented in JSON or YAML, use a string value
     * to contain the example, escaping where necessary.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    #[Describe(['cast' => [self::class, 'value']])]
    public mixed $value;

    public static function value($value, array $context)
    {
        if (isset($context[self::value], $context[self::externalValue])) {
            throw new MustBeExclusiveException('$value and $externalValue must be mutually exclusive.');
        }

        return $context[self::value] ?? null;
    }

    /**
     * A URL that points to the literal example. This provides the capability
     * to reference examples that cannot easily be included in JSON or YAML
     * documents. The `value` field and `externalValue` field are mutually
     * exclusive. See the rules for resolving Relative References.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15
     */
    #[Describe(['cast' => [self::class, 'externalValue']])]
    public ?string $externalValue;

    public static function externalValue($value, array $context)
    {
        if (isset($context[self::value], $context[self::externalValue])) {
            throw new MustBeExclusiveException('$value and $externalValue must be mutually exclusive.');
        }

        return $context[self::externalValue] ?? null;
    }
}
