<?php

namespace Tests\Unit\Header;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Header;
use Zerotoprod\DataModelOpenapi30\MediaType;

class ContentTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-content-0 */
    #[Test] public function media(): void
    {
        $Header = Header::from([
            Header::content => [
                'content1' => [
                    MediaType::example => 'example'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: MediaType::class,
            actual: $Header->content['content1'],
            message: 'A map containing the representations for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Header->content['content1']->example,
            message: 'A map containing the representations for the parameter.'
        );
    }
}