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
     * options are from a limited set. The array _SHOULD_ NOT be empty.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  $enum
     */
    public const enum = 'enum';

    /**
     * An enumeration of string values to be used if the substitution
     * options are from a limited set. The array _SHOULD_ NOT be empty.
     *
     * @var string[]
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    #[Describe(['default' => []])]
    public array $enum;

    /**
     * **REQUIRED**. The default value to use for substitution, which _SHALL_
     * be sent if an alternate value is not supplied. If the enum is
     * defined, the value _SHOULD_ exist in the enum’s values. Note
     * that this behavior is different from the Schema Object’s
     * default keyword, which documents the receiver’s behavior
     * rather than inserting the value into the data.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  $default
     */
    public const default = 'default';

    /**
     * **REQUIRED**. The default value to use for substitution, which _SHALL_
     * be sent if an alternate value is not supplied. If the enum is
     * defined, the value _SHOULD_ exist in the enum’s values. Note
     * that this behavior is different from the Schema Object’s
     * default keyword, which documents the receiver’s behavior
     * rather than inserting the value into the data.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     */
    #[Describe(['nullable'])]
    public ?string $default;

    /**
     * An optional description for the server variable. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  https://spec.commonmark.org/
     * @see  $description
     */
    public const description = 'description';

    /**
     * An optional description for the server variable. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['nullable'])]
    public ?string $description;
}
