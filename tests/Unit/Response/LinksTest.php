<?php

namespace Tests\Unit\Response;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Link;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Response;

class LinksTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function default_value(): void
    {
        $Response = Response::from();

        self::assertNull(
            actual: $Response->links,
            message: 'A map of operations links that can be followed from the response.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function reference(): void
    {
        $Response = Response::from([
            Response::links => [
                Reference::ref => 'ref'
            ]
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Response->links,
            message: 'A map of operations links that can be followed from the response.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Response->links->ref,
            message: 'A map of operations links that can be followed from the response.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14 */
    #[Test] public function links(): void
    {
        $Response = Response::from([
            Response::links => [
                Link::description => 'description'
            ]
        ]);

        self::assertInstanceOf(
            expected: Link::class,
            actual: $Response->links,
            message: 'A map of operations links that can be followed from the response.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Response->links->description,
            message: 'A map of operations links that can be followed from the response.'
        );
    }

}