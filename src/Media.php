<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Each Media Type Object provides schema and examples for the media type
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
 * @link https://spec.openapis.org/oas/v3.0.4.html#media-type-object
 */
class Media
{
    use DataModel;

    /**
     * The schema defining the content of the request, response, parameter, or header.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     */
    public const schema = 'schema';

    /**
     * The schema defining the content of the request, response, parameter, or header.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11
     */
    #[Describe(['cast' => [self::class, 'schema']])]
    public null|Schema|Reference $schema;

    public static function schema($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::schema])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : Schema::from($value);
    }
}
