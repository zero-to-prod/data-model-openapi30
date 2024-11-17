<?php

namespace Tests\Unit\Schema;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\InvalidReadAndWriteOnlyException;
use Zerotoprod\DataModelOpenapi30\Schema;

class ReadOnlyTest extends TestCase
{

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function default(): void
    {
        $Schema = Schema::from();

        self::assertFalse(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function false(): void
    {
        $Schema = Schema::from([
            Schema::readOnly => false,
            Schema::writeOnly => false,
        ]);

        self::assertFalse(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    /**@link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20 */
    #[Test] public function true(): void
    {
        $Schema = Schema::from([
            Schema::readOnly => true,
            Schema::writeOnly => false,
        ]);

        self::assertTrue(
            condition: $Schema->readOnly,
            message: 'Default value is false.'
        );
    }

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “read only”. This means that it _MAY_ be sent as part
     * of a response but **_SHOULD_ NOT** be sent as part of the request.
     * If the property is marked as `readOnly` being `true` and is in
     * the `required` list, the `required` will take effect on the
     * response only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Test] public function read_and_write_only_cannot_both_be_true(): void
    {
        $this->expectException(InvalidReadAndWriteOnlyException::class);
        Schema::from([
            Schema::readOnly => true,
            Schema::writeOnly => true,
        ]);
    }
}