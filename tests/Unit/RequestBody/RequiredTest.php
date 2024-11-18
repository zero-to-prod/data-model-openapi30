<?php

namespace Tests\Unit\RequestBody;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\RequestBody;

class RequiredTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function default(): void
    {
        $RequestBody = RequestBody::from([
            RequestBody::content => [],
        ]);

        self::assertFalse(
            condition: $RequestBody->required,
            message: 'Determines if the request body is required in the request. Defaults to false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function false(): void
    {
        $RequestBody = RequestBody::from([
            RequestBody::content => [],
            RequestBody::required => false
        ]);

        self::assertFalse(
            condition: $RequestBody->required,
            message: 'Determines if the request body is required in the request. Defaults to false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function true(): void
    {
        $RequestBody = RequestBody::from([
            RequestBody::content => [],
            RequestBody::required => true
        ]);

        self::assertTrue(
            condition: $RequestBody->required,
            message: 'Determines if the request body is required in the request. Defaults to false.'
        );
    }
}