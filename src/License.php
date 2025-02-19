<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * License information for the exposed API.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#license-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class License
{
    use DataModel;

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#license-object
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#license-object
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#license-object
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const url = 'url';

    /**
     * A URL for the license used for the API. This _MUST_ be in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#license-object
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $url;
}
