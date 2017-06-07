<?php

namespace PKEM\Controller;

use PKEM\Model\Action;

class Page {

    const NOT_FOUND = 'notFound';

    protected $superPages = [
        'manageSystem',
    ];

    protected $name;
    protected $isSuperUser;
    protected $isSuperPage;

    function __construct($name=self::NOT_FOUND) {
        $this->name = $name;

        $this->isSuperUser = isset($_SESSION['user']) ?
            ( count($_SESSION['user']->roles) > 2 ) : false;
        $_SESSION['isSuperUser'] = $this->isSuperUser;

        $this->isSuperPage = in_array($name, $this->superPages);
        $_SESSION['isSuperPage'] = $this->isSuperPage;
    }

    public function render() {
        if (!$this->isSuperUser && $this->isSuperPage) {
            Route::routeTo(START_PATH);
        } else {
            $action = new Action($this->name);
            $action->processLogic();
            $action->loadview();
        }
    }

}
