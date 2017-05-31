<?php

namespace PKEM\Model;

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
        return [];
    }

    /**
     * @Page: login
     */
    public function loginLogic() {
        $error = '';
        if ( ! empty($_POST) ) {
            $user = new User($_POST['username'], $_POST['password']);
            if ( $user->isValid() ) {
                Route::routeTo($_SESSION['pathBeforeLogin']);
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
