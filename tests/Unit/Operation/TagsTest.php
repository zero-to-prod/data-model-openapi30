<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;

class TagsTest extends TestCase
{
    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0 */
    #[Test] public function nullable(): void
    {
        $Operation = Operation::from();

        self::assertNull(
            actual: $Operation->tags,
            message: 'A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0 */
    #[Test] public function string(): void
    {
        $Operation = Operation::from([
            Operation::tags => ['tag1' => 'tag1'],
        ]);

        self::assertEquals(
            expected: 'tag1',
            actual: $Operation->tags['tag1'],
            message: 'A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.'
        );
    }
}