<?php

namespace PKEM\Model;

use \PDO;
use \PDOException;

class DB {

    public $dbh;

    private $DSN;
    private $user;
    private $pass;
    private $options = [
        PDO::ATTR_EMULATE_PREPARES => false, 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    function __construct() {
        global $_mysql;
        $this->DSN = "mysql:host={$_mysql['host']};dbname={$_mysql['dbname']};charset=utf8mb4";
        $this->user = $_mysql['user'];
        $this->pass = $_mysql['pass'];

        try {
            $this->dbh = new PDO($this->DSN, $this->user, $this->pass, $this->options);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function __destruct() {
        $this->dbh = null;
    }

}
