<?php

namespace Tests\Unit\Server;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Server;

class DescriptionTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3 */
    #[Test] public function missing_description(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
        ]);

        self::assertNull(
            actual: $Server->description,
            message: 'An optional string describing the host designated by the URL. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3 */
    #[Test] public function description(): void
    {
        $Server = Server::from([
            Server::url => '/relative',
            Server::description => 'description',
        ]);

        self::assertEquals(
            expected: 'description',
            actual: $Server->description,
            message: 'An optional string describing the host designated by the URL. [CommonMark] syntax MAY be used for rich text representation.'
        );
    }
}