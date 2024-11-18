<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\Response;

class ContentTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function media(): void
    {
        $Response = Response::from([
            Response::content => [
                'content1' => [
                    MediaType::example => 'example'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $Response->content['content1'],
            message: 'A map containing the representations for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Response->content['content1']->example,
            message: 'A map containing the representations for the parameter.'
        );
    }
}