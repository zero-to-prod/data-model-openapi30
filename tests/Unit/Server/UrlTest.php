<?php

namespace Tests\Unit\Server;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\Server;

class UrlTest extends TestCase
{

    /**
     * **REQUIRED**. A URL to the target host. This URL supports Server Variables and **MAY**
     * be relative, to indicate that the host location is relative to the location where the
     * document containing the Server Object is being served. Variable substitutions will
     * be made when a variable is named in {braces}.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3
     */
    #[Test] public function missing_url(): void
    {
        $this->expectException(PropertyRequiredException::class);
        $this->expectExceptionMessage('Property `$url` is required.');

        Server::from();
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3 */
    #[Test] public function url(): void
    {
        $Server = Server::from([
            Server::url => '/relative/{id}'
        ]);

        self::assertEquals(
            expected: '/relative/{id}',
            actual: $Server->url,
            message: ' A URL to the target host. This URL supports Server Variables and MAY be relative, to indicate that the host location is relative to the location where the document containing the Server Object is being served. Variable substitutions will be made when a variable is named in {braces}.'
        );
    }
}