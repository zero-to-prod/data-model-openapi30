<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * An object representing a Server.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#server-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Server
{
    use DataModel;

    /**
     * **REQUIRED**. A URL to the target host. This URL supports Server Variables
     * and _MAY_ be relative, to indicate that the host location is relative
     * to the location where the document containing the Server Object is
     * being served. Variable substitutions will be made when a variable
     * is named in {braces}.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const url = 'url';

    /**
     * **REQUIRED**. A URL to the target host. This URL supports Server Variables
     * and _MAY_ be relative, to indicate that the host location is relative
     * to the location where the document containing the Server Object is
     * being served. Variable substitutions will be made when a variable
     * is named in {braces}.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public string $url;

    /**
     * An optional string describing the host designated by the URL.
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @see  https://spec.commonmark.org/
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * An optional string describing the host designated by the URL.
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @see  https://spec.commonmark.org
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * A map between a variable name and its value. The value is used
     * for substitution in the server’s URL template.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @see  $variables
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const variables = 'variables';

    /**
     * A map between a variable name and its value. The value is used
     * for substitution in the server’s URL template.
     *
     * @var ServerVariable[]
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ServerVariable::class,
        'default' => []
    ])]
    public array $variables;

}
