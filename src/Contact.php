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
     * @see  $name
     */
    public const name = 'name';

    /**
     * The identifying name of the contact person/organization.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * The URL for the contact information.
     * This _MUST_ be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @see  $url
     */
    public const url = 'url';

    /**
     * The URL for the contact information.
     * This _MUST_ be in the form of a URL.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    #[Describe([
        'cast' => [self::class, 'isUrl'],
        'exception' => InvalidUrlException::class,
    ])]
    public ?string $url;

    /**
     * The email address of the contact person/organization.
     * This _MUST_ be in the form of an email address.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @see  $email
     */
    public const email = 'email';

    /**
     * The email address of the contact person/organization.
     * This _MUST_ be in the form of an email address.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#contact-object
     */
    #[Describe([
        'cast' => [self::class, 'isEmail'],
        'exception' => InvalidEmailException::class,
    ])]
    public ?string $email;
}
