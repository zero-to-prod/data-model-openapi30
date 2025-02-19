<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * The request body applicable for this operation. The `requestBody` is only
 * supported in HTTP methods where the HTTP 1.1 specification [RFC7231]
 * Section 4.3.1 has explicitly defined semantics for request bodies.
 * In other cases where the HTTP spec is vague (such as GET, HEAD and
 * DELETE), `requestBody` _SHALL_ be ignored by consumers.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#request-body-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class RequestBody
{
    use DataModel;

    /**
     * A brief description of the request body. This could contain examples
     * of use. [CommonMark] syntax MAY be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     * @see  $description
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const description = 'description';

    /**
     * A brief description of the request body. This could contain examples
     * of use. [CommonMark] syntax MAY be used for rich text representation.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * **REQUIRED**. The content of the request body. The key is a media type or
     * media type range, see [RFC7231] Appendix D, and the value describes it.
     * For requests that match multiple keys, only the most specific key is
     * applicable. e.g. `"text/plain"` overrides `"text/*"`
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     * @see  $content
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const content = 'content';

    /**
     * **REQUIRED**. The content of the request body. The key is a media type or
     * media type range, see [RFC7231] Appendix D, and the value describes it.
     * For requests that match multiple keys, only the most specific key is
     * applicable. e.g. `"text/plain"` overrides `"text/*"`
     *
     * @var array<string, MediaType> $content
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => MediaType::class,
        'default' => []
    ])]
    public array $content;

    /**
     * Determines if the request body is required in the request. Defaults to `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     * @see  $required
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const required = 'required';

    /**
     * Determines if the request body is required in the request. Defaults to `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => false])]
    public bool $required;
}
