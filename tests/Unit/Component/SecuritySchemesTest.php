<?php

namespace Tests\Unit\Component;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Component;
use Zerotoprod\DataModelOpenapi30\OAuthFlow;
use Zerotoprod\DataModelOpenapi30\OAuthFlows;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\SecurityScheme;

class SecuritySchemesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function nullable(): void
    {
        $Component = Component::from();

        self::assertNull(
            actual: $Component->securitySchemes,
            message: 'An object to hold reusable Security Scheme Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function ref(): void
    {
        $Component = Component::from([
            Component::securitySchemes => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Component->securitySchemes['example1'],
            message: 'An object to hold reusable Security Scheme Objects.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Component->securitySchemes['example1']->ref,
            message: 'An object to hold reusable Security Scheme Objects.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function securitySchemes(): void
    {
        $Component = Component::from([
            Component::securitySchemes => [
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
            ],
        ]);

        self::assertInstanceOf(
            expected: SecurityScheme::class,
            actual: $Component->securitySchemes['200'],
            message: 'An object to hold reusable Security Scheme Objects.'
        );

        self::assertEquals(
            expected: 'authorizationUrl',
            actual: $Component->securitySchemes['200']->flows->authorizationCode->authorizationUrl,
            message: 'An object to hold reusable Security Scheme Objects.'
        );
    }
}