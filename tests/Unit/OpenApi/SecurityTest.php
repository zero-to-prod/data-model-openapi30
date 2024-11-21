<?php

namespace Tests\Unit\OpenApi;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Info;
use Zerotoprod\DataModelOpenapi30\OpenApi;

class SecurityTest extends TestCase
{

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata
     * _MAY_ be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function default(): void
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
            expected: [],
            actual: $OpenApi->security,
            message: 'A declaration of which security mechanisms can be used across the API. The list of values includes alternative Security Requirement Objects that can be used. Only one of the Security Requirement Objects need to be satisfied to authorize a request. Individual operations can override this definition. The list can be incomplete, up to being empty or absent. To make security explicitly optional, an empty security requirement ({}) can be included in the array.'
        );
    }

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata
     * _MAY_ be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function security(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => [
                Info::title => 'title',
                Info::version => '1.0.0'
            ],
            OpenApi::paths => [],
            OpenApi::security => [
                [],
                [
                    'user' => ['write:pets', 'read:pets'],
                ]
            ],
        ]);

        self::assertEquals(
            expected: 'read:pets',
            actual: $OpenApi->security[1]['user'][1],
            message: 'A declaration of which security mechanisms can be used across the API. The list of values includes alternative Security Requirement Objects that can be used. Only one of the Security Requirement Objects need to be satisfied to authorize a request. Individual operations can override this definition. The list can be incomplete, up to being empty or absent. To make security explicitly optional, an empty security requirement ({}) can be included in the array.'
        );
    }
}