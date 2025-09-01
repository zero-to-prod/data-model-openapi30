<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * A metadata object that allows for more fine-tuned XML model definitions.
 *
 * When using arrays, XML element names are not inferred (for singular/plural
 * forms) and the name field _SHOULD_ be used to add that information.
 * See examples for expected behavior.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#xml-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 * DataModels for OpenAPI 3.0.*
 */
class Xml
{
    use DataModel;

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being `"array"` (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const name = 'name';

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being `"array"` (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @see  $namespace
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const namespace = 'namespace';

    /**
     * The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $namespace;

    /**
     * The prefix to be used for the name.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @see  $prefix
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const prefix = 'prefix';

    /**
     * The prefix to be used for the name.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $prefix;

    /**
     * Declares whether the property definition translates to an attribute
     * instead of an element. Default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @see  $attribute
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const attribute = 'attribute';

    /**
     * Declares whether the property definition translates to an attribute
     * instead of an element. Default value is `false`.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => false])]
    public bool $attribute;

    /**
     * _MAY_ be used only for an array definition. Signifies whether the
     * array is wrapped (for example, `<books><book/><book/></books>`) or
     * unwrapped (`<book/><book/>`). Default value is `false`. The
     * definition takes effect only when defined alongside `type`
     * being `"array"` (outside the `items`).
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @see  $wrapped
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const wrapped = 'wrapped';

    /**
     * _MAY_ be used only for an array definition. Signifies whether the
     * array is wrapped (for example, `<books><book/><book/></books>`) or
     * unwrapped (`<book/><book/>`). Default value is `false`. The
     * definition takes effect only when defined alongside `type`
     * being `"array"` (outside the `items`).
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['default' => false])]
    public bool $wrapped;
}
