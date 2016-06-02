<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca;

use Slim\App;

class Zorca extends App
{
    public function __construct()
    {
        $config = Config::get();
        parent::__construct($config);
        $this->get('/[{arg1}[/[{arg2}[/[{arg3}[/]]]]]]', function ($request, $response, $args) {
            echo 'arg1 = ' . $args['arg1'] . ' arg2 = ' . $args['arg2'] . ' arg3 = ' . $args['arg3'];
        });
    }
}
