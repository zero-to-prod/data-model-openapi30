<?php

namespace Tests\Unit\ExternalDocumentation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;

class DescriptionTest extends TestCase
{

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function missing_description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertNull(
            $ExternalDocumentation->description,
            'A description of the target documentation. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
            ExternalDocumentation::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $ExternalDocumentation->description,
            message: 'A description of the target documentation. [CommonMark] syntax _MAY_ be used for rich text representation.'
        );
    }
}