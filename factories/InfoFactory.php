<?php

namespace Factories;

use Zerotoprod\DataModelFactory\Factory;
use Zerotoprod\DataModelOpenapi30\Info;

class InfoFactory
{
    use Factory;

    protected $model = Info::class;

    protected function definition(): array
    {
        return [
            Info::title => 'title',
            Info::version => 'version',
        ];
    }

    public function make(): Info
    {
        return $this->instantiate();
    }
}