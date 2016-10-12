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
        Autoload::loadExt();
        parent::__construct(Config::getMain());
    }

    public function start()
    {
        $this->get('[/{params:.*}]', function (Request $request, Response $response, $args) {
            $params = explode('/', $request->getAttribute('params'));
            $componentKey = 'pages';
            $extAction = 'index';
            $componentClass = 'Zorca\Ext\\' . ucfirst($componentKey);
            $extController = new $componentClass;
            $fullContent = $extController->run($extAction);
            $response->getBody()->write($fullContent);
        });
        $this->run();
    }
}
