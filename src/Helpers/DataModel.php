<?php

namespace Zerotoprod\DataModelOpenapi30\Helpers;

use Zerotoprod\DataModelHelper\DataModelHelper;
use Zerotoprod\Transformable\Transformable;

/**
 * @link https://github.com/zero-to-prod/data-model-openapi30
 */
trait DataModel
{
    use \Zerotoprod\DataModel\DataModel;
    use Transformable;
    use DataModelHelper;
}