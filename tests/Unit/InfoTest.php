<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelAdapterOpenapi30\Info;
use Zerotoprod\DataModelAdapterOpenapi30\InvalidTermsOfServiceException;

class InfoTest extends TestCase
{

    #[Test] public function missing_title(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$title` is required.');

        Info::from([
            Info::version => 'version',
        ]);
    }

    #[Test] public function title(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::version => 'version',
        ]);

        self::assertEquals('title', $Info->title);
    }

    #[Test] public function missing_description(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::version => 'version',
        ]);

        self::assertNull($Info->description);
    }

    #[Test] public function description(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::description => 'description',
            Info::version => 'version',
        ]);

        self::assertEquals('description', $Info->description);
    }

    #[Test] public function invalid_termsOfService(): void
    {
        $this->expectException(InvalidTermsOfServiceException::class);

        Info::from([
            Info::title => 'title',
            Info::termsOfService => 'termsOfService',
            Info::version => 'version',
        ]);
    }

    #[Test] public function termsOfService(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::termsOfService => 'https://example.com/',
            Info::version => 'version',
        ]);

        self::assertEquals('https://example.com/', $Info->termsOfService);
    }

    #[Test] public function missing_version(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$version` is required.');

        Info::from([
            Info::title => 'title',
        ]);
    }
}