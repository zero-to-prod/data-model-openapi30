<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes a single response from an API operation, including design-time,
 * static links to operations based on the response.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#response-object
 */
class Response
{
    use DataModel;

    /**
     * **REQUIRED**. A description of the response. [CommonMark] syntax
     * _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     * @see  $description
     */
    public const description = 'description';

    /**
     * **REQUIRED**. A description of the response. [CommonMark] syntax
     * _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * Maps a header name to its definition. [RFC7230] Section 3.2 states
     * header names are case-insensitive. If a response header is defined
     * with the name `"Content-Type"`, it _SHALL_ be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     * @see  $headers
     */
    public const headers = 'headers';

    /**
     * Maps a header name to its definition. [RFC7230] Section 3.2 states
     * header names are case-insensitive. If a response header is defined
     * with the name `"Content-Type"`, it _SHALL_ be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     */
    #[Describe(['cast' => [self::class, 'headers']])]
    public null|Header|Reference $headers;

    /**
     * Maps a header name to its definition. [RFC7230] Section 3.2 states
     * header names are case insensitive. If a response header is defined
     * with the name `"Content-Type"`, it _SHALL_ be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     * @see  $headers
     */
    public static function headers($value, array $context): Header|Reference|null
    {
        if (!isset($context[self::headers])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : Header::from($value);
    }

    /**
     * A map containing descriptions of potential response payloads. The key
     * is a media type or media type range, see [RFC7231] Appendix D, and
     * the value describes it. For responses that match multiple keys,
     * only the most specific key is applicable. e.g. `"text/plain"`
     * overrides `"text/*"`
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     * @see  $content
     */
    public const content = 'content';

    /**
     * A map containing descriptions of potential response payloads. The key
     * is a media type or media type range, see [RFC7231] Appendix D, and
     * the value describes it. For responses that match multiple keys,
     * only the most specific key is applicable. e.g. `"text/plain"`
     * overrides `"text/*"`
     *
     * @var array<string, MediaType> $content
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => MediaType::class,
        'default' => []
    ])]
    public array $content;

    /**
     * A map of operations links that can be followed from the response.
     * The key of the map is a short name for the link, following the
     * naming constraints of the names for Component Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     * @see  $links
     */
    public const links = 'links';

    /**
     * A map of operations links that can be followed from the response.
     * The key of the map is a short name for the link, following the
     * naming constraints of the names for Component Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     */
    #[Describe(['cast' => [self::class, 'links']])]
    public null|Link|Reference $links;

    /**
     * A map of operations links that can be followed from the response.
     * The key of the map is a short name for the link, following the
     * naming constraints of the names for Component Objects.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14
     * @see  $links
     */
    public static function links($value, array $context): Link|Reference|null
    {
        if (!isset($context[self::links])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : Link::from($value);
    }
}
