<?php

namespace Tests\Unit\PathItem;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\PathItem;
use Zerotoprod\DataModelOpenapi30\Parameter;
use Zerotoprod\DataModelOpenapi30\Reference;

class ParametersTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function nullable(): void
    {
        $PathItem = PathItem::from();

        self::assertEmpty(
            actual: $PathItem->parameters,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function ref(): void
    {
        $PathItem = PathItem::from([
            PathItem::parameters => [
                [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $PathItem->parameters[0],
            message: 'A list of parameters that are applicable for this operation.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $PathItem->parameters[0]->ref,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7 */
    #[Test] public function parameter(): void
    {
        $PathItem = PathItem::from([
            PathItem::parameters => [
                [
                    Parameter::name => 'name',
                    Parameter::in => 'in',
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Parameter::class,
            actual: $PathItem->parameters[0],
            message: 'A list of parameters that are applicable for this operation.'
        );

        self::assertEquals(
            expected: 'name',
            actual: $PathItem->parameters[0]->name,
            message: 'A list of parameters that are applicable for this operation.'
        );
    }
}