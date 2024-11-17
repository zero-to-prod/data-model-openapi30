<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * An object representing a Server Variable for server URL
 * template substitution.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#server-variable-object
 */
class ServerVariable
{
    use DataModel;

    /**
     * An enumeration of string values to be used if the substitution
     * options are from a limited set. The array ***SHOULD*** NOT be empty.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    public const enum = 'enum';

    /**
     * **REQUIRED**. The default value to use for substitution, which ***SHALL***
     * be sent if an alternate value is not supplied. If the enum is
     * defined, the value ***SHOULD*** exist in the enum’s values. Note
     * that this behavior is different from the Schema Object’s
     * default keyword, which documents the receiver’s behavior
     * rather than inserting the value into the data.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    public const default = 'default';

    /**
     * An optional description for the server variable. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * An enumeration of string values to be used if the substitution
     * options are from a limited set. The array ***SHOULD*** NOT be empty.
     *
     * @var string[]
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    #[Describe(['missing_as_null'])]
    public ?array $enum;

    /**
     * **REQUIRED**. The default value to use for substitution, which ***SHALL***
     * be sent if an alternate value is not supplied. If the enum is
     * defined, the value ***SHOULD*** exist in the enum’s values. Note
     * that this behavior is different from the Schema Object’s
     * default keyword, which documents the receiver’s behavior
     * rather than inserting the value into the data.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    #[Describe([
        'pre' => [self::class, 'validateDefault'],
        'required'
    ])]
    public string $default;

    /**
     * An optional description for the server variable. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    public static function validateDefault(mixed $value, array $context): void
    {
        if (!isset($context[self::enum])) {
            return;
        }
        if (!in_array($value, $context[self::enum], true)) {
            throw new DefaultMissingInEnumException();
        }
    }
}
