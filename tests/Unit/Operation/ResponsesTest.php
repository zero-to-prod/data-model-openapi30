<?php

namespace Tests\Unit\Operation;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\MediaType;
use Zerotoprod\DataModelOpenapi30\Operation;
use Zerotoprod\DataModelOpenapi30\Reference;
use Zerotoprod\DataModelOpenapi30\Response;

class ResponsesTest extends TestCase
{

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function required(): void
    {
        $this->expectException(PropertyRequiredException::class);

        Operation::from();
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function ref(): void
    {
        $Operation = Operation::from([
            Operation::responses => [
                'example1' => [
                    Reference::ref => 'ref'
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Reference::class,
            actual: $Operation->responses['example1'],
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );

        self::assertEquals(
            expected: 'ref',
            actual: $Operation->responses['example1']->ref,
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );
    }

    /** @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema */
    #[Test] public function response(): void
    {
        $Operation = Operation::from([
            Operation::responses => [
                '200' => [
                    Response::description => 'description',
                    Response::content => [
                        'application/json' => [
                            MediaType::schema => [
                                Reference::ref => '#/components/schemas/Pet'
                            ]
                        ]
                    ]
                ]
            ],
        ]);

        self::assertInstanceOf(
            expected: Response::class,
            actual: $Operation->responses['200'],
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );

        self::assertEquals(
            expected: 'description',
            actual: $Operation->responses['200']->description,
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );

        self::assertEquals(
            expected: '#/components/schemas/Pet',
            actual: $Operation->responses['200']->content['application/json']->schema->ref,
            message: 'REQUIRED. The list of possible responses as they are returned from executing this operation.'
        );
    }
}