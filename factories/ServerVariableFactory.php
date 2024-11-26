<?php

namespace Factories;

use Zerotoprod\DataModelFactory\Factory;
use Zerotoprod\DataModelOpenapi30\ServerVariable;

class ServerVariableFactory
{
    use Factory;

    protected $model = ServerVariable::class;

    protected function definition(): array
    {
        return [
            ServerVariable::enum => ['443'],
            ServerVariable::default => '443',
        ];
    }

    public function make(): ServerVariable
    {
        return $this->instantiate();
    }
}