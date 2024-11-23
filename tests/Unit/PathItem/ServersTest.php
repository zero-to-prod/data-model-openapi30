<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Server;

class ServersTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertEmpty(
            actual: $PathItem->servers,
            message: 'An alternative servers array to service this operation.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function servers(): void
    {
        $PathItem = PathItem::from([
            PathItem::servers => [[Server::url => 'https://example.com/api']],
        ]);

        self::assertEquals(
            expected: 'https://example.com/api',
            actual: $PathItem->servers[0]->url,
            message: 'An alternative servers array to service this operation.'
        );
    }
}