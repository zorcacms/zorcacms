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
            if ($params[1]) {
                $extSlug = $params[0];
                $extAction = $params[1];
            } elseif ($params[0]) {
                $extSlug = '/';
                $extAction = $params[0];
            } else {
                $extSlug = '/';
                $extAction = 'index';
            }
            $extComponents = Config::getComp();
            $extIndex = array_search($extSlug, array_column($extComponents, 'slug'));
            if (isset($extIndex)) {
                $componentKey = $extComponents[$extIndex]['key'];
            } else {
                $componentKey = 'pages';
                $extAction = '404';
            }
            $componentClass = 'Zorca\Ext\\' . ucfirst($componentKey);
            $extController = new $componentClass;
            $fullContent = $extController->run($extAction);
            $response->getBody()->write($fullContent);
        });
    }
}
