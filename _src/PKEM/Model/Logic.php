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

}
