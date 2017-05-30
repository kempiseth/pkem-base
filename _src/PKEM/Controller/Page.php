<?php

namespace PKEM\Controller;

use PKEM\Model\Action;

class Page {

    protected $name;

    function __construct($name) {
        $this->name = $name;
    }

    public function render() {
        $action = new Action($this->name);
        $action->processLogic();
        $action->loadview();
    }

}
