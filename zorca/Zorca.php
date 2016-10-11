<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca;

use Slim\App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Zorca extends App
{
    public function __construct()
    {
        $config = Config::getMain();
        Autoload::loadExt();
        parent::__construct($config);
        $this->start();
    }

    private function start ()
    {
        $this->get('[/{params:.*}]', function (Request $request, Response $response, $args) {
            $params = explode('/', $request->getAttribute('params'));
            if ($params[0]) {
                $slug = '/' . $params[0];
            } else {
                $slug = '/';
                $extAction = 'index';
            }
            $extConfig = Config::getExt();
            foreach ($extConfig as $extConfigItem) {
                if ($slug == $extConfigItem['slug']) {
                    $componentClass = 'Zorca\Ext\\' . ucfirst($extConfigItem['key']);
                    $extController = new $componentClass;
                    $extController->run($extAction, $response);
                    break;
                }
            }
        });
    }
}
