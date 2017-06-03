<?php

namespace PKEM\Model;

use PKEM\Controller\Route;

class Logic {

    const METHOD_SUFFIX = 'Logic';

    protected $pageName;
    protected $data;

    function __construct($pageName) {
        $this->pageName = $pageName;
        $this->data = $this->generateData();
    }

    private function generateData() {
        $gd = $this->pageName . self::METHOD_SUFFIX;
        return $this->{$gd}();
    }

    public function getData() {
        return $this->data;
    }

    /**
     * @Page: start
     */
    public function startLogic() {
        return [
            'title' => 'Start',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: notFound
     */
    public function notFoundLogic() {
        return [
            'title' => 'Not Found',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: manageSystem
     */
    public function manageSystemLogic() {
        return [
            'title' => 'Manage System',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: login
     */
    public function loginLogic() {
        $error = '';
        if ( ! empty($_POST) ) {
            $user = new User($_POST['username'], $_POST['password']);
            if ( $user->isValid() ) {
                $_SESSION['userid'] = $user->getId();
                Route::routeTo(START_PATH);
            } else {
                $error = "The Username or Password is not valid.";
            }
        }

        return [
            'error' => $error,
            'title' => 'Log in',
            'page' => $this->pageName,
        ];
    }

}
