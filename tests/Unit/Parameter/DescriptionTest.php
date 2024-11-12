<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Parameter;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function missing_description(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name'
        ]);

        self::assertNull(
            actual: $Parameter->description,
            message: 'A brief description of the parameter. This could contain examples of use. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function description(): void
    {
        $Parameter = Parameter::from([
            Parameter::in => 'query',
            Parameter::name => 'name',
            Parameter::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Parameter->description,
            message: 'A brief description of the parameter. This could contain examples of use. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}