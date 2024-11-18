<?php

namespace Tests\Unit\RequestBody;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\RequestBody;

class ContentTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function nullable(): void
    {
        $this->expectException(PropertyRequiredException::class);

        RequestBody::from();
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#request-body-object */
    #[Test] public function media(): void
    {
        $RequestBody = RequestBody::from([
            RequestBody::content => [
                'content1' => [
                    MediaType::example => 'example'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $RequestBody->content['content1'],
            message: 'A map containing the representations for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $RequestBody->content['content1']->example,
            message: 'A map containing the representations for the parameter.'
        );
    }
}