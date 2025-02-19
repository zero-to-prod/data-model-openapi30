<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * An object representing a Server Variable for server URL
 * template substitution.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#server-variable-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class ServerVariable
{
    use DataModel;

    /**
     * An enumeration of string values to be used if the substitution
     * options are from a limited set. The array _SHOULD_ NOT be empty.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  $enum
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const enum = 'enum';

    /**
     * An enumeration of string values to be used if the substitution
     * options are from a limited set. The array _SHOULD_ NOT be empty.
     *
     * @var string[]
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @link https://github.com/zero-to-prod/data-model-openapi30
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
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  $default
     * @link https://github.com/zero-to-prod/data-model-openapi30
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
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $default;

    /**
     * An optional description for the server variable. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  https://spec.commonmark.org/
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * An optional description for the server variable. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4
     * @see  https://spec.commonmark.org
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;
}
