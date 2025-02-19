<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Each MediaType Type Object provides schema and examples for the media type
 * identified by its key.
 *
 * When `example` or `examples` are provided, the example _SHOULD_ match the
 * specified schema and be in the correct format as specified by the
 * media type and its encoding. The `example` and `examples` fields are
 * mutually exclusive, and if either is present it _SHALL_ override
 * any `example` in the schema. See Working With Examples for
 * further guidance regarding the different ways of
 * specifying examples, including non-JSON/YAML
 * values.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#media-type-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class MediaType
{
    use DataModel;

    /**
     * The schema defining the content of the request, response, parameter, or header.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const schema = 'schema';

    /**
     * The schema defining the content of the request, response, parameter, or header.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'schema']])]
    public null|Schema|Reference $schema;

    /**
     * The schema defining the content of the request, response, parameter, or header.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @see  $schema
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function schema($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::schema])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : Schema::from($value);
    }

    /**
     * Example of the media type; see Working With Examples.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @see  $example
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const example = 'example';

    /**
     * The schema defining the content of the request, response, parameter, or header.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public mixed $example;

    /**
     * Examples of the media type; see Working With Examples.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @see  $examples
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const examples = 'examples';

    /**
     * Examples of the media type; see Working With Examples.
     *
     * @var array<string, Example|Reference> $examples
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['cast' => [self::class, 'examples']])]
    public array $examples;

    /**
     * Examples of the media type; see Working With Examples.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @see  $examples
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public static function examples($value, array $context): array
    {
        return isset($context[self::examples])
            ? array_map(
                static fn($value) => isset($value[Reference::ref])
                    ? Reference::from($value)
                    : Example::from($value),
                $value
            )
            : [];
    }

    /**
     * A map between a property name and its encoding information. The key,
     * being the property name, _MUST_ exist in the schema as a property.
     * The `encoding` field _SHALL_ only apply to Request Body Objects,
     * and only when the media type is `multipart` or
     * `application/x-www-form-urlencoded`. If no
     * Encoding Object is provided for a property,
     * the behavior is determined by the default
     * values documented for the Encoding Object.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @see  $encoding
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const encoding = 'encoding';

    /**
     * A map between a property name and its encoding information. The key,
     * being the property name, _MUST_ exist in the schema as a property.
     * The `encoding` field _SHALL_ only apply to Request Body Objects,
     * and only when the media type is `multipart` or
     * `application/x-www-form-urlencoded`. If no
     * Encoding Object is provided for a property,
     * the behavior is determined by the default
     * values documented for the Encoding Object.
     *
     * @var array<string, Encoding> $encoding
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Encoding::class,
        'default' => []
    ])]
    public array $encoding;
}
