<?php

namespace PKEM\Model;

use PKEM\Controller\Route;

class Security {

    protected $isLoggedIn = false;
    protected $user;

    function __construct() {
        session_start() || die('Failed to start session.');
        $this->isLoggedIn = $this->isLoggedIn();

        if ($this->isLoggedIn) {
            if ( self::isInLoginPage() ) {
                Route::routeTo(START_PATH);
            } else {
                $this->user = $this->getUser();
            }
        } else {
            if ( ! self::isInLoginPage() ) {
                $this->login();
            }
        }
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
