<?php

namespace Factories;

use Zerotoprod\DataModelOpenapi30\Server;
use Zerotoprod\DataModelFactory\Factory;

class ServerFactory
{
    use Factory;

    protected $model = Server::class;

    protected function definition(): array
    {
        return [
            Server::url => '/home',
        ];
    }

    public function make(): Server
    {
        return $this->instantiate();
    }
}