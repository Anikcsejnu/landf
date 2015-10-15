<?php

namespace App\Users;

class Users {

    public $username = '';
    public $email = '';
    public $password = '';
    public $created = '';

    function __construct() {
        $this->conn = new \PDO('mysql:host=localhost;dbname=lostnfound', 'root', '');
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function create($username, $email, $password, $created) {
        try {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->created = $created;

            $query = "INSERT INTO users (username, email, password, created) VALUES (:username,:email,:password,:created)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':username' => $this->username,
                ':email' => $this->email,
                ':password' => $this->password,
                ':created' => $this->created,)
            );
            header('location:../../login.php');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
