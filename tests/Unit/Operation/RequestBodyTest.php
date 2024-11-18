<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\RequestBody;

class RequestBodyTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from();

        self::assertNull(
            actual: $Operation->requestBody,
            message: 'The request body applicable for this operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function ref(): void
    {
        $Operation = Operation::from([
            Operation::requestBody => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Operation->requestBody,
            message: 'The request body applicable for this operation.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Operation->requestBody->ref,
            message: 'The request body applicable for this operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function requestBody(): void
    {
        $Operation = Operation::from([
            Operation::requestBody => [
                RequestBody::description => 'description',
                RequestBody::content => [],
            ]
        ]);

        self::assertInstanceOf(
            expected: RequestBody::class,
            actual: $Operation->requestBody,
            message: 'The request body applicable for this operation.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Operation->requestBody->description,
            message: 'The request body applicable for this operation.'
        );
    }
}