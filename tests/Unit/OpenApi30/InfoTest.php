<?php

namespace Tests\Unit\OpenApi30;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\OpenApi30;

class InfoTest extends TestCase
{

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata
     * _MAY_ be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function required_info(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$info` is required.');

        OpenApi30::from([
            OpenApi30::openapi => '3.0.4'
        ]);
    }
}