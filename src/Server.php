<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * An object representing a Server.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#server-object
 */
class Server
{
    use DataModel;

    /**
     * **REQUIRED**. A URL to the target host. This URL supports Server Variables
     * and ***MAY*** be relative, to indicate that the host location is relative
     * to the location where the document containing the Server Object is
     * being served. Variable substitutions will be made when a variable
     * is named in {braces}.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     */
    public const url = 'url';

    /**
     * An optional string describing the host designated by the URL.
     * [CommonMark] syntax ***MAY*** be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @link https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * A map between a variable name and its value. The value is used
     * for substitution in the server’s URL template.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     */
    public const variables = 'variables';

    /**
     * **REQUIRED**. A URL to the target host. This URL supports Server Variables
     * and ***MAY*** be relative, to indicate that the host location is relative
     * to the location where the document containing the Server Object is
     * being served. Variable substitutions will be made when a variable
     * is named in {braces}.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     */
    #[Describe(['required'])]
    public string $url;

    /**
     * An optional string describing the host designated by the URL.
     * [CommonMark] syntax ***MAY*** be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @link https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * A map between a variable name and its value. The value is used
     * for substitution in the server’s URL template.
     *
     * @var ServerVariable[]
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ServerVariable::class
    ])]
    public ?array $variables;

}
