<?php

namespace PKEM\Model;

class DB {

    public $dbh;

    function __construct() {
        try {
            $this->dbh = new \PDO('sqlite:' . SQLITE_PATH);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function __destruct() {
        $this->dbh = null;
    }

}
