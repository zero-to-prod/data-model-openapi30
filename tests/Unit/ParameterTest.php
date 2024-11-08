<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Zerotoprod\DataModel\PropertyRequiredException;
use Zerotoprod\DataModelOpenapi30\ExternalDocumentation;
use Zerotoprod\DataModelOpenapi30\InvalidUrlException;
use Zerotoprod\DataModelOpenapi30\Parameter;

class ParameterTest extends TestCase
{

    /**
     * @link https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields
     */
    #[Test] public function missing_name(): void
    {
        $this->expectException(PropertyRequiredException::class, '');
        $this->expectExceptionMessage('Property `$name` is required.');

        Parameter::from();
    }
}