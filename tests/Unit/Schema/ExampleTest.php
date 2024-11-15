<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\Schema;

class ExampleTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default_example(): void
    {
        $Schema = Schema::from();

        self::assertNull(
            actual: $Schema->example,
            message: 'A free-form field to include an example of an instance for this schema. To represent examples that cannot be naturally represented in JSON or YAML, a string value can be used to contain the example with escaping where necessary.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function string_example(): void
    {
        $Schema = Schema::from([
            Schema::example => 'example',
        ]);

        self::assertEquals(
            expected: 'example',
            actual: $Schema->example,
            message: 'A free-form field to include an example of an instance for this schema. To represent examples that cannot be naturally represented in JSON or YAML, a string value can be used to contain the example with escaping where necessary.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function bool_example(): void
    {
        $Schema = Schema::from([
            Schema::example => true,
        ]);

        self::assertIsBool(
            actual: $Schema->example,
            message: 'A free-form field to include an example of an instance for this schema. To represent examples that cannot be naturally represented in JSON or YAML, a string value can be used to contain the example with escaping where necessary.'
        );
    }
}