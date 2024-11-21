<?php

namespace Tests\Unit\OpenApi;

use Factories\InfoFactory;
use Factories\ServerFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Components;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;
use Zerotoprod\DataModelOpenapi30\OAuthFlows;
use Zerotoprod\DataModelOpenapi30\OpenApi;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class ComponentsTest extends TestCase
{
    /**
     * An array of Server Objects, which provide connectivity information
     * to a target server. If the servers field is not provided, or is
     * an empty array, the default value would be a Server Object with
     * an url value of `/`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function nullable(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::paths => []
        ]);

        self::assertNull(
            actual: $OpenApi->components,
            message: 'An element to hold various Objects for the OpenAPI Description.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields */
    #[Test] public function components(): void
    {
        $Server = ServerFactory::factory()->make();
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => InfoFactory::factory()->make(),
            OpenApi::servers => [$Server],
            OpenApi::paths => [],
            OpenApi::components => [
                Components::securitySchemes => [
                    '200' => [
                        SecurityScheme::type => 'apiKey',
                        SecurityScheme::name => 'name',
                        SecurityScheme::in => 'query',
                        SecurityScheme::scheme => 'scheme',
                        SecurityScheme::openIdConnectUrl => 'openIdConnectUrl',
                        SecurityScheme::flows => [
                            OAuthFlows::authorizationCode => [
                                OAuthFlow::authorizationUrl => 'authorizationUrl',
                                OAuthFlow::tokenUrl => 'tokenUrl',
                                OAuthFlow::scopes => []
                            ]
                        ],
                    ]
                ]
            ]
        ]);

        self::assertEquals(
            expected: 'authorizationUrl',
            actual: $OpenApi->components->securitySchemes['200']->flows->authorizationCode->authorizationUrl,
            message: 'An element to hold various Objects for the OpenAPI Description.'
        );
    }
}