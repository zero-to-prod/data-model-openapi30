<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Adds metadata to a single tag that is used by the Operation Object.
 * It is not mandatory to have a Tag Object per tag defined in the
 * Operation Object instances.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#tag-object
 */
class Tag
{
    use DataModel;

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     */
    public const name = 'name';

    /**
     * **REQUIRED**. The name of the tag.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18
     */
    #[Describe(['required'])]
    public string $name;
}
