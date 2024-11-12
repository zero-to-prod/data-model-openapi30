<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * License information for the exposed API.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#license-object
 */
class License
{
    use DataModel;

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#license-object
     */
    public const name = 'name';

    /**
     * A URL for the license used for the API. This MUST be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#license-object
     */
    public const url = 'url';

    /**
     * **REQUIRED**. The license name used for the API.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#license-object
     */
    #[Describe(['required'])]
    public string $name;

    /**
     * A URL for the license used for the API. This MUST be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#license-object
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
    ])]
    public ?string $url;
}
