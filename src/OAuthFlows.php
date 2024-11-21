<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Allows configuration of the supported OAuth Flows.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#oauth-flows-object
 */
class OAuthFlows
{
    use DataModel;

    /**
     * **REQUIRED**. The reference string.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19
     */
    public const ref = '$ref';

    /**
     * **REQUIRED**. The reference string.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19
     */
    #[Describe(['cast' => [self::class, 'ref']])]
    public string $ref;

    public static function ref($value, $context){
        if(isset($context['$ref'])){
            return $context['$ref'];
        }
        throw new PropertyRequiredException('Property `$ref` is required.');
    }
}
