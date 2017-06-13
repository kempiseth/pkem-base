<?php

namespace PKEM\View;

use PKEM\Model\User;

class View {

    const VIEW_SUFFIX = '.html.php';
    const VIEW_BASE = '/_view/';

    protected $logicData;
    protected $pageName;
    protected $viewRoot;

    function __construct($logicData, $pageName) {
        $this->logicData = $logicData;
        $this->pageName = $pageName;
        $this->viewRoot = $_SERVER['DOCUMENT_ROOT'] . self::VIEW_BASE;
    }

    public function createView() {
        extract($this->logicData);

        // Comman data for all pages:
        // Something here ...

        // Get the page to be displayed:
        require $this->viewRoot . $this->pageName . self::VIEW_SUFFIX;
        // Clear some view's session values:
        $_SESSION['message'] = '';
    }

}
