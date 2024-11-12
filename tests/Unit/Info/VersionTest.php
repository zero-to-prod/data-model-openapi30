<?php

namespace Tests\Unit\Info;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Info;

class VersionTest extends TestCase
{
    /**
     * REQUIRED. The version of the OpenAPI Document (which is distinct
     * from the OpenAPI Specification version or the version of the API
     * being described or the version of the OpenAPI Description).
     *
     * link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0
     */
    #[Test] public function missing_version(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$version` is required.');

        Info::from([
            Info::title => 'title',
        ]);
    }

    /**link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0 */
    #[Test] public function version(): void
    {
        $Info = Info::from([
            Info::title => 'title',
            Info::version => '1.0.0',
        ]);

        self::assertEquals(
            expected: '1.0.0',
            actual: $Info->version,
            message: 'REQUIRED. The version of the OpenAPI Document (which is distinct from the OpenAPI Specification version or the version of the API being described or the version of the OpenAPI Description).'
        );
    }
}