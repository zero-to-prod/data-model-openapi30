<?php

namespace Factories;

use Zerotoprod\DataModelFactory\Factory;
use Zerotoprod\DataModelOpenapi30\Server;

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