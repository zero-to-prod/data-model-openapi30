<?php

namespace Tests\Unit\Contact;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Contact;

class NameTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object */
    #[Test] public function missing_name(): void
    {
        $Contact = Contact::from();

        self::assertNull(
            actual: $Contact->name,
            message: 'The identifying name of the contact person/organization.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object */
    #[Test] public function name_field(): void
    {
        $Contact = Contact::from([
            Contact::name => 'name'
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $Contact->name,
            message: 'The identifying name of the contact person/organization.'
        );
    }
}