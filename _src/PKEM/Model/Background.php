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
        $dbh = (new DB())->dbh;
        $sql = "DELETE FROM ".User::TABLE_NAME." WHERE id=:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $_POST['userid']);
        $_return = $stmt->execute();
        echo $_return ? 'OK' : 'FAILED';
    }
}
