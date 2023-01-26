<?php

class DbDriver {
    public $hostName;
    public $dbLogin;
    public $dbPassword;
    public $dbName;

    public function __construct(string $hostName, string $dbLogin, string $dbPassword, string $dbName){
        $this->hostName = $hostName;
        $this->dbLogin = $dbLogin;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;
        
    }

    public function openDb(){
        $mysql = new mysqli("$this->hostName", "$this->dbLogin", "$this->dbPassword", "$this->dbName");
        $mysql->set_charset('utf8mb4');
        $mysql->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
        return $mysql;
    }

    public function getData (string $entity){
        $mysql = $this->openDb();
        $data = $mysql->query("SELECT * FROM `$entity`");
        $mysql->close();
        return $data;
    }

    public function insertLoginData (string $email, string $password){
        $mysql = $this->openDb();
        $mysql->query("INSERT INTO user (email, password) VALUES ('$email','$password')");
        $mysql->close();
        
    }

    public function getUserData (string $email){
        $mysql = $this->openDb();        
        $selectData = $mysql->prepare("SELECT * FROM `user` WHERE `email` = ? ");        
        $selectData->bind_param("s",$email);
        $selectData->execute(); 
        $result = $selectData->get_result();
        $userData = $result->fetch_assoc();
        return $userData;     
    }
}
