<?php

namespace PKEM\Controller;

use PKEM\Model\Action;

class Page {

    const NOT_FOUND = 'notFound';

    protected $name;

    function __construct($name=self::NOT_FOUND) {
        $this->name = $name;
    }

    public function render() {
        $action = new Action($this->name);
        $action->processLogic();
        $action->loadview();
    }

}
