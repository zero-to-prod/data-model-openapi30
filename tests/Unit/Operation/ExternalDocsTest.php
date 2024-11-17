<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\Operation;

class ExternalDocsTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from();

        self::assertNull(
            actual: $Operation->externalDocs,
            message: 'Additional external documentation for this schema.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::externalDocs => [
                ExternalDocumentation::url => 'https://example.com',
            ],
        ]);

        self::assertEquals(
            expected: 'https://example.com',
            actual: $Operation->externalDocs->url,
            message: 'Additional external documentation for this schema.'
        );
    }
}