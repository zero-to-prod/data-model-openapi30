<?php

namespace Tests\Unit\Media;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Encoding;
use Zerotoprod\DataModelOpenapi30\Media;

class EncodingTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function nullable(): void
    {
        $Media = Media::from();

        self::assertNull(
            actual: $Media->encoding,
            message: 'A map between a property name and its encoding information. '
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11 */
    #[Test] public function encoding(): void
    {
        $Media = Media::from([
            Media::encoding => [
                'example1' => [
                    Encoding::contentType => 'contentType'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Encoding::class,
            actual: $Media->encoding['example1'],
            message: 'A map between a property name and its encoding information. '
        );

        self::assertEquals(
            expected: 'contentType',
            actual: $Media->encoding['example1']->contentType,
            message: 'A map between a property name and its encoding information. '
        );
    }
}