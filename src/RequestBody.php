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
 * @link https://spec.openapis.org/oas/v3.0.4.html#request-body-object
 */
class RequestBody
{
    use DataModel;

    /**
     * A brief description of the request body. This could contain examples
     * of use. [CommonMark] syntax MAY be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     */
    public const description = 'description';

    /**
     * A brief description of the request body. This could contain examples
     * of use. [CommonMark] syntax MAY be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * **REQUIRED**. The content of the request body. The key is a media type or
     * media type range, see [RFC7231] Appendix D, and the value describes it.
     * For requests that match multiple keys, only the most specific key is
     * applicable. e.g. `"text/plain"` overrides `"text/*"`
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
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
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => MediaType::class,
        'required'
    ])]
    public ?array $content;

    /**
     * Determines if the request body is required in the request. Defaults to `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     */
    public const required = 'required';

    /**
     * Determines if the request body is required in the request. Defaults to `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10
     */
    #[Describe(['default' => false])]
    public bool $required;
}
