<?php

$username = @$_SESSION['user']->username;
$changePasswordForm = "<form name='change-password-form' method='post' autocomplete='off'>
  <fieldset>
    <legend>Change Password</legend>
    <table id='change-password-table'>
      <tr>
        <td><label for='username'>Username</label></td>
        <td><input type='text' id='username' name='username' class='_input' readonly value='$username'></td>
      </tr>
      <tr>
        <td><label for='password'>New Password</label></td>
        <td><input type='password' id='password' name='password' class='_input' required autocomplete='new-password'></td>
      </tr>
      <tr>
        <td><label for='confirm-password'>Confirm Password</label></td>
        <td><input type='password' id='confirm-password' name='confirm-password' class='_input' required autocomplete='new-password'></td>
      </tr>
      <tr>
        <td colspan='2'><button type='submit'>Change</button></td>
      </tr>
    </table>
  </fieldset>
</form>";

$section = <<<"SECTION"
<div id="account" class="task">
  <div class="title">Account settings</div>
  <div class="content">
    $changePasswordForm
  </div>
</div>
SECTION;

require __DIR__ . '/_base_/_base_.html.php';
