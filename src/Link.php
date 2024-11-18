<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * The Link Object represents a possible design-time link for a response. The
 * presence of a link does not guarantee the caller’s ability to successfully
 * invoke it, rather it provides a known relationship and traversal mechanism
 * between responses and other operations.
 *
 * Unlike _dynamic_ links (i.e. links provided in the response payload), the OAS
 * linking mechanism does not require link information in the runtime response.
 *
 * For computing links and providing instructions to execute them, a runtime
 * expression is used for accessing values in an operation and using them
 * as parameters while invoking the linked operation.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#link-object
 */
class Link
{
    use DataModel;

    /**
     * A URI reference to an OAS operation. This field is mutually exclusive
     * of the `operationId `field, and _MUST_ point to an Operation Object.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const operationRef = 'operationRef';

    /**
     * The name of an existing, resolvable OAS operation, as defined with a unique
     * `operationId`. This field is mutually exclusive of the operationRef field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const operationId = 'operationId';

    /**
     * A URI reference to an OAS operation. This field is mutually exclusive
     * of the `operationId` field, and _MUST_ point to an Operation Object.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['missing_as_null'])]
    public ?string $operationRef;

    /**
     * The name of an existing, resolvable OAS operation, as defined with a unique
     * `operationId`. This field is mutually exclusive of the operationRef field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['missing_as_null'])]
    public ?string $operationId;
}
