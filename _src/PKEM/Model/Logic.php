<?php

namespace PKEM\Model;

use PKEM\Controller\Route;

class Logic {

    protected $pageName;
    protected $data;

    function __construct($pageName) {
        $this->pageName = $pageName;
        $this->data = $this->generateData();
    }

    private function generateData() {
        return $this->{$this->pageName}();
    }

    public function getData() {
        return $this->data;
    }

    /**
     * @Page: start
     */
    public function start() {
        return [
            'title' => 'Start',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: notFound
     */
    public function notFound() {
        $_SESSION['message'] = "This page is not implemented yet!";
        return [
            'title' => 'Not Found',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: manageSystem
     */
    public function manageSystem() {
        // Insert a new user:
        if (isset($_POST['username'])) {
            $user = new User($_POST['username'], $_POST['password'], $_POST['roles']);
            $user->insertIntoDB();
        }

        // Users' list:
        $dbh = (new DB())->dbh;
        $sql = "SELECT * FROM ".User::TABLE_NAME;
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return [
            'title' => 'Manage System',
            'page' => $this->pageName,
            'users' => $users,
        ];
    }

    /**
     * @Page: login
     */
    public function login() {
        if ( ! empty($_POST) ) {
            $user = new User($_POST['username'], $_POST['password']);
            if ( $user->isValid() ) {
                $_SESSION['userid'] = $user->getId();
                Route::routeTo(START_PATH);
            } else {
                $_SESSION['message'] = "Username or Password is not correct.";
            }
        }

        return [
            'title' => 'Log in',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: account
     */
    public function account() {
        return [
            'title' => 'Account',
            'page' => $this->pageName,
        ];
    }

}
