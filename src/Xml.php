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
 * @link https://spec.openapis.org/oas/v3.0.4.html#xml-object
 */
class Xml
{
    use DataModel;

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being "`array`" (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    public const name = 'name';

    /**
     * The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    public const namespace = 'namespace';

    /**
     * The prefix to be used for the name.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    public const prefix = 'prefix';

    /**
     * Declares whether the property definition translates to an attribute
     * instead of an element. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    public const attribute = 'attribute';

    /**
     * _MAY_ be used only for an array definition. Signifies whether the
     * array is wrapped (for example, `<books><book/><book/></books>`) or
     * unwrapped (`<book/><book/>`). Default value is `false`. The
     * definition takes effect only when defined alongside `type`
     * being "`array`" (outside the `items`).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    public const wrapped = 'wrapped';

    /**
     * Replaces the name of the element/attribute used for the described
     * schema property. When defined within `items`, it will affect the
     * name of the individual XML elements within the list. When
     * defined alongside `type` being "`array`" (outside the
     * `items`), it will affect the wrapping element if and
     * only if `wrapped` is `true`. If `wrapped` is `false`,
     * it will be ignored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Describe(['missing_as_null'])]
    public ?string $name;

    /**
     * The URI of the namespace definition. Value _MUST_ be in the form of a non-relative URI.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
    ])]
    public ?string $namespace;

    /**
     * The prefix to be used for the name.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Describe(['missing_as_null'])]
    public ?string $prefix;

    /**
     * Declares whether the property definition translates to an attribute
     * instead of an element. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Describe(['default' => false])]
    public bool $attribute;

    /**
     * _MAY_ be used only for an array definition. Signifies whether the
     * array is wrapped (for example, `<books><book/><book/></books>`) or
     * unwrapped (`<book/><book/>`). Default value is `false`. The
     * definition takes effect only when defined alongside `type`
     * being "`array`" (outside the `items`).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22
     */
    #[Describe(['default' => false])]
    public bool $wrapped;
}
