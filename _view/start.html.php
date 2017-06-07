<?php

$manageSystem = $_SESSION['isSuperUser'] ?
    '<a href="/manage-system/">Manage System</a>' : '';

$nav = <<<"NAV"
<a href="/human-resource/">Human Resource</a>
$manageSystem
NAV;

$section = <<<"SECTION"
SECTION;

require __DIR__ . '/_base_/_base_.html.php';
