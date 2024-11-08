<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * The object provides metadata about the API. The metadata ***MAY***
 * be used by the clients if needed, and ***MAY*** be presented in
 * editing or documentation generation tools for convenience.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#info-object
 */
class Info
{
    use DataModel;

    /**
     * The title of the API.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    public const title = 'title';

    /**
     * A description of the API.
     *
     * [CommonMark] syntax ***MAY*** be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * A URL for the Terms of Service for the API.
     * This MUST be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    public const termsOfService = 'termsOfService';

    /**
     * **REQUIRED**. The version of the OpenAPI Document (which is distinct from the
     * OpenAPI Specification version or the version of the API being described
     * or the version of the OpenAPI Description).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    public const version = 'version';

    /**
     * The title of the API.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    #[Describe(['required'])]
    public string $title;

    /**
     * A description of the API.
     *
     * [CommonMark] syntax ***MAY*** be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null' => true])]
    public ?string $description;

    /**
     * A URL for the Terms of Service for the API.
     * This MUST be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
    ])]
    public ?string $termsOfService;

    /**
     * **REQUIRED**. The version of the OpenAPI Document (which is distinct from the
     * OpenAPI Specification version or the version of the API being described
     * or the version of the OpenAPI Description).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    #[Describe(['required'])]
    public string $version;
}
