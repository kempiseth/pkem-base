<?php

namespace PKEM\Model;

use PKEM\View\View;

class Action {

    protected $pageName;
    protected $logicData;
    protected $action;

    protected $bgPages = [
            "logout",
        ];

    function __construct($pageName) {
        $this->pageName = $pageName;
    }

    private function isBackground() {
        $_isbg = isset($_POST['_ajax']) ||
            in_array($this->pageName, $this->bgPages);
        $this->action = $_isbg ?
            (isset($_POST['_ajax']) ? $_POST['_ajax'] : $this->pageName) :
            '';
        return $_isbg;
    }

    public function processLogic() {
        if ( ! $this->isBackground() ) {
            $logic = new Logic($this->pageName);
            $this->logicData = $logic->getData();
        } else {
            new Background($this->action);
        }
    }

    public function loadView() {
        if ( ! $this->isBackground() ) {
            $view = new View($this->logicData, $this->pageName);
            $view->createView();
        }
    }

}
