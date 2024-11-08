<?php

namespace Factories;

use Zerotoprod\DataModelAdapterOpenapi30\ServerVariable;
use Zerotoprod\DataModelFactory\Factory;

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