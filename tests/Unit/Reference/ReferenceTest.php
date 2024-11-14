<?php

namespace Tests\Unit\Reference;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Reference;


class ReferenceTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#contact-object-example */
    #[Test] public function missing_ref(): void
    {
        $json = '{"$ref": "#/components/schemas/Pet"}';

        $Reference = Reference::from(json_decode($json, true));

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $Reference->ref,
        );
    }
}