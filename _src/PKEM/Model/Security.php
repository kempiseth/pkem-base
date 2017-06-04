<?php

namespace PKEM\Model;

use PKEM\Controller\Route;
use \PDO;

class Security {

    protected $isLoggedIn;
    protected $userid;

    function __construct() {
        session_start() || die('Failed to start session.');
        $this->isLoggedIn = $this->isLoggedIn();

        if ($this->isLoggedIn) {
            $this->userid = $_SESSION['userid'];
            if ( ! isset($_SESSION['user']) )
                $_SESSION['user'] = $this->getUser();

            if ( self::isInLoginPage() ) {
                Route::routeTo(START_PATH);
            }
        } else {
            if ( ! self::isInLoginPage() ) {
                $this->login();
            }
        }
    }

    private function getUser() {
        $user = new User();
        $dbh = (new DB())->dbh;
        $sql = "SELECT * FROM ".User::TABLE_NAME." WHERE id=:id";
        $stmt = $dbh->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_INTO, $user);
        $stmt->execute(array(':id' => $this->userid));
    
        $stmt->fetch();
        $user->roles = json_decode($user->roles);
        return $user;
    }

    private function isLoggedIn() {
        return isset($_SESSION['userid']);
    }

    private function login() {
        Route::routeTo(LOGIN_PATH);
    }

    static function isInLoginPage() {
        $currentPath = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        $loginPath = trim(LOGIN_PATH, '/');
        return $currentPath == $loginPath;
    }

}
