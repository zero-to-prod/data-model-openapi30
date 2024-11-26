<?php

namespace Tests\Unit\OpenApi;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Info;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class InfoTest extends TestCase
{

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata
     * _MAY_ be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function oauth(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => [
                Info::title => 'title',
                Info::version => '1.0.0'
            ],
            OpenApi::paths => []
        ]);

        self::assertEquals(
            expected: 'title',
            actual: $OpenApi->info->title,
            message: 'REQUIRED. Provides metadata about the API. The metadata MAY be used by tooling as required.'
        );
    }
}