<?php

namespace Tests\Unit\Info;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Info;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class DescriptionTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0 */
    #[Test] public function missing_description(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::version => 'version',
        ]);

        self::assertNull(
            actual: $Info->description,
            message: 'A description of the API. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0 */
    #[Test] public function description(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::description => 'description',
            Info::version => 'version',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Info->description,
            message: 'A description of the API. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}