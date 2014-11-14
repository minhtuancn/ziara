<?php

// FrontController

// get helpers
require_once(_HELPERS_ . 'uri.helpers.php');
// require base classes
require_once(_CLASSES_ . 'route.class.php');
require_once(_CLASSES_ . 'request.class.php');
require_once(_CLASSES_ . 'view.class.php');

// create routes, request and launch controller
$Route = new Route();
require_once(_PHP_ . 'routes.php');
$Req = new Request();