<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class ExternalDocumentationTest extends TestCase
{

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function missing_url(): void
    {
        /** REQUIRED. */
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$url` is required.');

        ExternalDocumentation::from();
    }

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function invalid_url(): void
    {
        /** This MUST be in the form of a URL. */
        $this->expectException(InvalidUrlException::class);

        ExternalDocumentation::from([
            ExternalDocumentation::url => 'invalid_url',
        ]);
    }

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function url(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertEquals(
            'https://example.com/',
            $ExternalDocumentation->url,
            'REQUIRED. The URL for the target documentation. This MUST be in the form of a URL.'
        );
    }

    /** @link  https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8 */
    #[Test] public function missing_description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertNull(
            $ExternalDocumentation->description,
            'A description of the target documentation. [CommonMark] syntax MAY be used for rich text representation.'
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
            'description',
            $ExternalDocumentation->description,
            'A description of the target documentation. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}