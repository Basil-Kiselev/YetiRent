<?php

class DbDriver {

    public function openDb()
    {
        $mysql = new mysqli('localhost', 'root', '','yeti_rent');
        $mysql->set_charset('utf8mb4');
        $mysql->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);

        return $mysql;
    }

    public function getData (string $entity)
    {
        $mysql = $this->openDb();
        $data = $mysql->query("SELECT * FROM `$entity`");
        $mysql->close();

        return $data;
    }

    public function insertData (string $email, string $password)
    {
        $mysql = $this->openDb();
        $mysql->query("INSERT INTO user (email, password) VALUES ('$email','$password')");
        $mysql->close();        
    }

    public function getUserData (string $email)
    {
        $mysql = $this->openDb();        
        $selectData = $mysql->prepare("SELECT * FROM `user` WHERE `email` = ?");        
        $selectData->bind_param("s",$email);
        $selectData->execute(); 
        $result = $selectData->get_result();
        $userData = $result->fetch_assoc();

        return $userData;     
    }
}
