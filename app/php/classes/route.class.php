<?php

// ROUTES class

class Route{
	public $register;

	function __construct(){
		$this->register = array();
	}

	public function register($uri, $name, $controller){
		$aControl = explode("@", $controller);
		$o = new stdClass();
		$o->name = $name;
		$o->uri = $uri;
		$o->controller = $aControl[1];
		$o->exec = $aControl[0];
		array_push($this->register, $o);
	}
	public function getRouteFromFragments($fragments){
		foreach ($this->register as $o) {
			$aFrag = getFragmentsFromURI($o->uri);
			$aArgs = array();
			$isRoute = true;
			foreach ($aFrag as $i => $value) {
				if ( substr($value,0,1) == "{" && substr($value,-1) == "}" ) {
					// argument fragment
					$aArgs[substr($value, 1, strlen($value)-2)] = $fragments[$i];
				}
				elseif ( $value !== $fragments[$i] ){
					// wrong fragment, stop everything
					$isRoute = false;
					break;
				}
			}
			if ($isRoute) {
				$o->args = $aArgs;
				return $o;
			}
		}
		die("No route is corresponding to request !");
	}
	public function parseRoute($name,$args){
		$s = $this->getRouteFromName($name)->uri;
		foreach ($args as $key => $val) {
			$s = str_replace('{'.$key.'}', $val, $s);
		}
		return $s;
	}
	private function getRouteFromName($name){
		foreach ($this->register as $o) {
			if ($o->name === $name) {
				return $o;
			}
		}
	}
}