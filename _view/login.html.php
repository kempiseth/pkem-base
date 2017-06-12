<?php

$section = <<<"SECTION"
<form id="login" method="post">
    <div>
        <label for="username">អ្នកប្រើប្រាស់</label>
        <input type="text" class="_input" id="username" name="username" placeholder="Username" 
            required autofocus autocorrect="off" autocapitalize="off" spellcheck="false">
    </div>
    <div>
        <label for="password">ពាក្យសម្ងាត់​</label>
        <input type="password" class="_input" id="password" name="password" placeholder="Password" required>
    </div>
    <div>
        <button type="submit">ចូល</button>
    </div>
</form>
SECTION;

require __DIR__ . '/_base_/_base_.html.php';
