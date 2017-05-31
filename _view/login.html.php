<?php

$section = <<<"SECTION"
<form id="login" method="post">
    <div class="error">$error</div>
    <div>
        <label for="username">Username</label>
        <input type="text" class="_input" id="username" name="username" placeholder="Username" autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" class="_input" id="password" name="password" placeholder="Password">
    </div>
    <div>
        <button type="submit">Log in</button>
    </div>
</form>
SECTION;

require __DIR__ . '/_base_/_base_.html.php';
