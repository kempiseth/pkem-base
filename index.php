<?php

// --- REQUIRE --- //
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/_config/_config.php';

$_route = require_once __DIR__ . '/_route/_route.php';
// --------------- //

use PKEM\Model\Security;
use PKEM\Controller\Route;

if (NEED_LOGIN)
    $security = new Security();

$route = new Route($_route);
$route->renderPage();
