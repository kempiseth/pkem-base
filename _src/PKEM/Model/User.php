<?php

namespace PKEM\Model;

class User {

    const TABLE_NAME = "_user";

    protected $id;
    protected $username;
    protected $password;
    protected $roles = [];

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        //$this->checkTable();
        $this->checkAdminUser();
    }

    private function checkTable() {
        $db = new DB();
        $sql = "CREATE TABLE IF NOT EXISTS " . self::TABLE_NAME . " (
            id INTEGER PRIMARY KEY,
            username TEXT,
            password TEXT,
            roles TEXT,
            time TEXT)";
        $db->dbh->exec($sql);
    }

    public function isValid() {
        return $this->isUsernameValid() && $this->isPasswordValid();
    }

    private function isUsernameValid() {
        $db = new DB();
        $sql = "SELECT COUNT(*) FROM " . self::TABLE_NAME . " WHERE username = '$this->username'";
        return ($result = $db->dbh->query($sql)) && ($result->fetchColumn() > 0);
    }

}
