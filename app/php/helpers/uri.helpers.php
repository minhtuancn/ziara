<?php

function getFragmentsFromURI( $uri ){
	$a = explode("/", $uri);
	$tmp = array();
	foreach ($a as $i => $val) {
		if( $val !== "" ) array_push($tmp, $val);
	}
	return (empty($tmp) ? array('/') : $tmp);
}