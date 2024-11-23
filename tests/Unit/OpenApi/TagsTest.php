<?php

namespace Tests\Unit\OpenApi;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\Info;
use Zerotoprod\DataModelOpenapi30\OpenApi;
use Zerotoprod\DataModelOpenapi30\Tag;

class TagsTest extends TestCase
{

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata
     * _MAY_ be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function default(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => [
                Info::title => 'title',
                Info::version => '1.0.0'
            ],
            OpenApi::paths => [],
        ]);

        self::assertEmpty(
            actual: $OpenApi->tags,
            message: 'A list of tags used by the OpenAPI Description with additional metadata. The order of the tags can be used to reflect on their order by the parsing tools. Not all tags that are used by the Operation Object must be declared. The tags that are not declared MAY be organized randomly or based on the tools’ logic. Each tag name in the list MUST be unique.'
        );
    }

    /**
     * **REQUIRED**. Provides metadata about the API. The metadata
     * _MAY_ be used by tooling as required.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields
     */
    #[Test] public function security(): void
    {
        $OpenApi = OpenApi::from([
            OpenApi::openapi => '3.0.4',
            OpenApi::info => [
                Info::title => 'title',
                Info::version => '1.0.0'
            ],
            OpenApi::paths => [],
            OpenApi::tags => [
                [Tag::name => 'name']
            ],
        ]);

        self::assertEquals(
            expected: 'name',
            actual: $OpenApi->tags[0]->name,
            message: 'A list of tags used by the OpenAPI Description with additional metadata. The order of the tags can be used to reflect on their order by the parsing tools. Not all tags that are used by the Operation Object must be declared. The tags that are not declared MAY be organized randomly or based on the tools’ logic. Each tag name in the list MUST be unique.'
        );
    }
}