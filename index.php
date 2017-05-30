<?php

// --- REQUIRE --- //
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/_config/_config.php';

$_route = require_once __DIR__ . '/_route/_route.php';
// --------------- //

use PKEM\Controller\Route;

$route = new Route($_route);
$route->renderPage();
