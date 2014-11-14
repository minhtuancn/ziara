<?php

// REQUESTS class

class Request{
	public $uri;
	public $fragments;
	public $route;
	public $controller;
	public $response;

	function __construct(){
		// get request
		$this->getCurrentRequestInfo();
		// include requested controller
		require_once(_CONTROLLERS_ . $this->route->controller . '.php');
		$this->controller = new $this->route->controller();
		// execute request
		$this->execRequest();
	}

	private function getCurrentRequestInfo(){
		global $baseURI,$Route;
		$this->uri = str_replace($baseURI, "", $_SERVER["REQUEST_URI"]);
		$this->fragments = getFragmentsFromURI($this->uri);
		$this->route = $Route->getRouteFromFragments($this->fragments);
	}
	private function execRequest(){
		$this->response = call_user_func(array($this->controller, $this->route->exec));
		switch ($this->response->type) {
			case 'view':
				$this->showView();
				break;
			
			default:
				die("Unkwnown response type !");
				break;
		}
	}
	private function showView(){
		foreach ($this->response->args as $key => $value) {
			${$key} = $value;
		}
		include(_LAYOUT_ . $this->response->layout . '.php');
	}
}