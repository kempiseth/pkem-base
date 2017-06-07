<?php

namespace PKEM\Model;

use PKEM\Controller\Route;

class Background {

    protected $action;

    function __construct($action) {
        $this->action = $action;
        $this->{$action}();
    }

    private function logout() {
        session_unset();
        Route::routeTo(LOGIN_PATH);
    }

    private function deleteUser() {
        //TODO
        print_r($_POST);
    }
}
