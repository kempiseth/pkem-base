<?php

$nav = <<<"NAV"
<a href="/human-resource/">Human Resource</a>
NAV;

$section = <<<"SECTION"
<div id="user" class="task">
    <div class="title">User</div>
    <div class="content">
    </div>
</div>
SECTION;

$js = <<<"JS"
<script src="/static/js/$page.js"></script>
JS;

require __DIR__ . '/_base_/_base_.html.php';
