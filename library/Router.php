<?php

/**
* Router manager
*/
class Router
{
	private $_HTTPRequest;
	public $route;

	public function __construct(HTTPRequest $request)
	{
		$this->_HTTPRequest = $request;
		$this->setRoute();
	}

	private function setRoute()
	{
		$json = file_get_contents('config/routes.json');
		$routes = json_decode($json, true);

		foreach ($routes as $route_name => $param) {
			$param['varsNames'] = isset($param['varsNames']) ? $param['varsNames'] : [];
			$route = new Route($route_name, $param['url'], $param['controller'], $param['action'], $param['varsNames']);

			if ($route->match($this->_HTTPRequest->getURI())) {
				$this->route = $route;
				$this->_HTTPRequest->setGETData($this->route->vars);
			}
		}
	}

	public function runController()
	{
		$controller = ucfirst($this->route->controller)."Controller";
		$controller = new $controller;
	}

	// generate URL from route name and param
}
