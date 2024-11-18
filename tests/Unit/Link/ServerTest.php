<?php

namespace Tests\Unit\Link;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Link;
use Zerotoprod\DataModelOpenapi30\Server;

class ServerTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function nullable(): void
    {
        $Link = Link::from();

        self::assertNull(
            actual: $Link->server,
            message: 'A server object to be used by the target operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16 */
    #[Test] public function string(): void
    {
        $Link = Link::from([
            Link::server => [
                Server::url => 'https://example.com',
            ],
        ]);

        self::assertEquals(
            expected: 'https://example.com',
            actual: $Link->server->url,
            message: 'A server object to be used by the target operation.'
        );
    }
}