<?php

namespace Zerotoprod\DataModelOpenapi30\Helpers;

use ReflectionAttribute;
use ReflectionProperty;
use Zerotoprod\DataModelHelper\DataModelHelper;
use Zerotoprod\DataModelOpenapi30\InvalidMultipleException;
use Zerotoprod\Transformable\Transformable;

trait DataModel
{
    use \Zerotoprod\DataModel\DataModel;
    use Transformable;
    use DataModelHelper;

    public static function throwException(mixed $value, array $context, ?ReflectionAttribute $Attribute, ReflectionProperty $Property): string|int|null|float
    {
        $args = $Attribute?->getArguments()[0];

        throw new ($args['exception'])($args['message']);
    }
}