<?php

namespace Zerotoprod\DataModelOpenapi30;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * Contact information for the exposed API.
 *
 * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
class Contact
{
    use DataModel;

    /**
     * The identifying name of the contact person/organization.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @see  $name
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const name = 'name';

    /**
     * The identifying name of the contact person/organization.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $name;

    /**
     * The URL for the contact information.
     * This _MUST_ be in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @see  $url
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const url = 'url';

    /**
     * The URL for the contact information.
     * This _MUST_ be in the form of a URL.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $url;

    /**
     * The email address of the contact person/organization.
     * This _MUST_ be in the form of an email address.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @see  $email
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    public const email = 'email';

    /**
     * The email address of the contact person/organization.
     * This _MUST_ be in the form of an email address.
     *
     * @see  https://spec.openapis.org/oas/v3.0.4.html#contact-object
     * @link https://github.com/zero-to-prod/data-model-openapi30
     */
    #[Describe(['nullable'])]
    public ?string $email;
}
