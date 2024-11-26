<?php

namespace Tests\Unit\Contact;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Contact;

class EmailTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object */
    #[Test] public function missing_email(): void
    {
        $Contact = Contact::from();

        self::assertNull(
            actual: $Contact->email,
            message: 'The email address of the contact person/organization. '
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object */
    #[Test] public function email_field(): void
    {
        $Contact = Contact::from([
            Contact::email => 'jane@example.com',
        ]);

        self::assertEquals(
            expected: 'jane@example.com',
            actual: $Contact->email,
            message: 'The email address of the contact person/organization.'
        );
    }
}