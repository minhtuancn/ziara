<?php

function getFragmentsFromURI( $uri ){
	$a = explode("/", $uri);
	$tmp = array();
	foreach ($a as $i => $val) {
		if( $val !== "" ) array_push($tmp, $val);
	}
	return (empty($tmp) ? array('/') : $tmp);
}

function getBaseUrl(){
	global $baseURI;
	$url = 'http';
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$url .= "s";}
	$url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
	}
	else {
		$url .= $_SERVER["SERVER_NAME"];
	}
	$url .= $baseURI;
	return $url;
}

function url($routeName, $args = array()){
	global $Route;
	return getBaseUrl() . $Route->parseRoute($routeName,$args);
}

function linkTo($text, $routeName, $args = array(), $attr = array()){
	$sAttr = "";
	foreach ($attr as $name => $val) {
		$sAttr .= " ".$name."=\"".$val."\"";
	}
	echo("<a href=\"".url($routeName,$args)."\"".$sAttr.">".$text."</a>");
}