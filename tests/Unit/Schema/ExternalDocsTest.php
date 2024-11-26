<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\Schema;

class ExternalDocsTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function discriminator_null(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->externalDocs,
            message: 'Additional external documentation for this schema.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function discriminator(): void
    {
        $Schema = Schema::from([
            Schema::externalDocs => [
                ExternalDocumentation::url => 'https://example.com',
            ],
        ]);

        self::assertEquals(
            expected: 'https://example.com',
            actual: $Schema->externalDocs->url,
            message: 'Additional external documentation for this schema.'
        );
    }
}