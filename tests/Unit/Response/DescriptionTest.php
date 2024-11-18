<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Response;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function nullable(): void
    {
        $Response = Response::from();

        self::assertNull(
            actual: $Response->description,
            message: 'REQUIRED. A description of the response. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function string(): void
    {
        $Response = Response::from([
            Response::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Response->description,
            message: 'REQUIRED. A description of the response. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}