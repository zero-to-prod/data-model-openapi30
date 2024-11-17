<?php

namespace Tests\Unit\Parameter;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Media;
use Zerotoprod\DataModelOpenapi30\Parameter;

class ContentTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function nullable(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
        ]);

        self::assertNull(
            actual: $Parameter->content,
            message: 'A map containing the representations for the parameter.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function media(): void
    {
        $Parameter = Parameter::from([
            Parameter::name => 'name',
            Parameter::in => 'query',
            Parameter::content => [
                'content1' => [
                    Media::example => 'example'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Media::class,
            actual: $Parameter->content['content1'],
            message: 'A map containing the representations for the parameter.'
        );

        self::assertEquals(
            expected: 'example',
            actual: $Parameter->content['content1']->example,
            message: 'A map containing the representations for the parameter.'
        );
    }
}