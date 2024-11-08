<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;

class ExternalDocumentationTest extends TestCase
{

    #[Test] public function missing_url(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$url` is required.');

        ExternalDocumentation::from([]);
    }

    #[Test] public function invalid_url(): void
    {
        $this->expectException(InvalidUrlException::class);

        ExternalDocumentation::from([
            ExternalDocumentation::url => 'invalid_url',
        ]);
    }

    #[Test] public function url(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertEquals('https://example.com/', $ExternalDocumentation->url);
    }

    #[Test] public function missing_description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
        ]);

        self::assertNull($ExternalDocumentation->description);
    }

    #[Test] public function description(): void
    {
        $ExternalDocumentation = ExternalDocumentation::from([
            ExternalDocumentation::url => 'https://example.com/',
            ExternalDocumentation::description => 'description',
        ]);

        self::assertEquals('description', $ExternalDocumentation->description);
    }
}