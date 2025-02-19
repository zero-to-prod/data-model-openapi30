<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * The object provides metadata about the API. The metadata _MAY_
 * be used by the clients if needed, and _MAY_ be presented in
 * editing or documentation generation tools for convenience.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#info-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Info
{
    use DataModel;

    /**
     * The title of the API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  $title
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const title = 'title';

    /**
     * The title of the API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public string $title;

    /**
     * A description of the API.
     *
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  https://spec.commonmark.org/
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * A description of the API.
     *
     * [CommonMark] syntax _MAY_ be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  https://spec.commonmark.org
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable' => true])]
    public ?string $description;

    /**
     * A URL for the Terms of Service for the API.
     * This _MUST_ be in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  $termsOfService
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const termsOfService = 'termsOfService';

    /**
     * A URL for the Terms of Service for the API.
     * This _MUST_ be in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $termsOfService;

    /**
     * **REQUIRED**. The version of the OpenAPI Document (which is distinct from the
     * OpenAPI Specification version or the version of the API being described
     * or the version of the OpenAPI Description).
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  $version
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const version = 'version';

    /**
     * **REQUIRED**. The version of the OpenAPI Document (which is distinct from the
     * OpenAPI Specification version or the version of the API being described
     * or the version of the OpenAPI Description).
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['required'])]
    public string $version;

    /**
     * The contact information for the exposed API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  $contact
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const contact = 'contact';

    /**
     * The contact information for the exposed API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?Contact $contact;

    /**
     * The license information for the exposed API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @see  $licence
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const licence = 'licence';

    /**
     * The license information for the exposed API.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?License $license;
}
