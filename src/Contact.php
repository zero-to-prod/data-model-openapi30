<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Contact information for the exposed API.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
 */
class Contact
{
    use DataModel;

    /**
     * The identifying name of the contact person/organization.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    public const name = 'name';

    /**
     * The URL for the contact information.
     * This ***MUST*** be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    public const url = 'url';

    /**
     * The identifying name of the contact person/organization.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    #[Describe(['missing_as_null'])]
    public ?string $name;

    /**
     * The URL for the contact information.
     * This ***MUST*** be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
    ])]
    public ?string $url;
}
