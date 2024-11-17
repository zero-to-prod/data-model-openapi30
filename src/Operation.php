<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Describes a single API operation on a path.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#operation-object
 */
class Operation
{
    use DataModel;

    /**
     * A list of tags for API documentation control. Tags can be used
     * for logical grouping of operations by resources or any other
     * qualifier.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const tags = 'tags';

    /**
     * A short summary of what the operation does.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const summary = 'summary';

    /**
     * A verbose explanation of the operation behavior. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     * @see  https://spec.commonmark.org/
     */
    public const description = 'description';

    /**
     * Additional external documentation for this operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const externalDocs = 'externalDocs';

    /**
     * Unique string used to identify the operation. The id _MUST_ be unique
     * among all operations described in the API. The `operationId` value is
     * **case-sensitive**. Tools and libraries _MAY_ use the `operationId`
     * to uniquely identify an operation, therefore, it is _RECOMMENDED_
     * to follow common programming naming conventions.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    public const operationId = 'operationId';

    /**
     * A list of tags for API documentation control. Tags can be used
     * for logical grouping of operations by resources or any other
     * qualifier.
     *
     * @var string[] $tags
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?array $tags;

    /**
     * A short summary of what the operation does.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?string $summary;

    /**
     * A verbose explanation of the operation behavior. [CommonMark]
     * syntax _MAY_ be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     * @see  https://spec.commonmark.org/
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

    /**
     * Additional external documentation for this operation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?ExternalDocumentation $externalDocs;

    /**
     * Unique string used to identify the operation. The id _MUST_ be unique
     * among all operations described in the API. The `operationId` value is
     * **case-sensitive**. Tools and libraries _MAY_ use the `operationId`
     * to uniquely identify an operation, therefore, it is _RECOMMENDED_
     * to follow common programming naming conventions.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7
     */
    #[Describe(['missing_as_null'])]
    public ?string $operationId;
}
