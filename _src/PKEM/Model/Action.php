<?php

namespace PKEM\Model;

use PKEM\View\View;

class Action {

    protected $pageName;
    protected $logicData;

    function __construct($pageName) {
        $this->pageName = $pageName;
    }

    public function processLogic() {
        $logic = new Logic($this->pageName);
        $this->logicData = $logic->getData();
    }

    public function loadView() {
        $view = new View($this->logicData, $this->pageName);
        $view->createView();
    }

}
