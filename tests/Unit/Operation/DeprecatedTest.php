<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\Reference;

class DeprecatedTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function default(): void
    {
        $Operation = Operation::from([Operation::responses => ['example1' => [Reference::ref => 'ref']]]);

        self::assertFalse(
            condition: $Operation->deprecated,
            message: 'Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function false(): void
    {
        $Operation = Operation::from([
            Operation::deprecated => false,
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertFalse(
            condition: $Operation->deprecated,
            message: 'Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields */
    #[Test] public function true(): void
    {
        $Operation = Operation::from([
            Operation::deprecated => true,
            Operation::responses => ['example1' => [Reference::ref => 'ref']]
        ]);

        self::assertTrue(
            condition: $Operation->deprecated,
            message: 'Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.'
        );
    }
}