<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
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
     * A URI reference to an OAS operation. This field is mutually exclusive
     * of the `operationId` field, and _MUST_ point to an Operation Object.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['nullable'])]
    public ?string $operationRef;

    /**
     * The name of an existing, resolvable OAS operation, as defined with a unique
     * `operationId`. This field is mutually exclusive of the operationRef field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const operationId = 'operationId';

    /**
     * The name of an existing, resolvable OAS operation, as defined with a unique
     * `operationId`. This field is mutually exclusive of the operationRef field.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['nullable'])]
    public ?string $operationId;

    /**
     * A map representing parameters to pass to an operation as specified with
     * `operationId` or identified via `operationRef`. The key is the
     * parameter name to be used (optionally qualified with the
     * parameter location, e.g. `path.id` for an `id` parameter
     * in the path), whereas the value can be a constant or an
     * expression to be evaluated and passed to the linked
     * operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const parameters = 'parameters';

    /**
     * A map representing parameters to pass to an operation as specified with
     * `operationId` or identified via `operationRef`. The key is the
     * parameter name to be used (optionally qualified with the
     * parameter location, e.g. `path.id` for an `id` parameter
     * in the path), whereas the value can be a constant or an
     * expression to be evaluated and passed to the linked
     * operation.
     *
     * @var array<string, mixed> $parameters
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['nullable'])]
    public ?array $parameters;

    /**
     * A literal value or {expression} to use as a request body when calling
     * the target operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const requestBody = 'requestBody';

    /**
     * A literal value or {expression} to use as a request body when calling
     * the target operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['nullable'])]
    public mixed $requestBody;

    /**
     * A description of the link. [CommonMark] syntax MAY be used for rich
     * text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const description = 'description';

    /**
     * A description of the link. [CommonMark] syntax MAY be used for rich
     * text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['nullable'])]
    public ?string $description;

    /**
     * A server object to be used by the target operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    public const server = 'server';

    /**
     * A server object to be used by the target operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16
     */
    #[Describe(['nullable'])]
    public ?Server $server;
}
