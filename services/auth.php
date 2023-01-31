<?php

require_once "datasource/dbdriver.php";

class Auth 
{
    public function login(string $email, string $password): array
    {
        $userData = (new DbDriver())->getUserData($email); 

        if (empty($userData)) {
            throw new Exception('user not found');
        }

        if (!password_verify($password,$userData['password'])) {
            throw new Exception('username or password incorrect');
        }

        $_SESSION['user'] = $userData;
        
        return $userData;
    }

    public function registration (string $email, string $password): array
    {
        $userData = (new DbDriver())->getUserData($email);         

        if(isset($userData['email'])) {
            throw new Exception('email already exists');
        }

        $hashedPass = password_hash($password,PASSWORD_DEFAULT);
        (new DbDriver())->insertData($email, $hashedPass);
        $userData = (new DbDriver())->getUserData($email); 
        $_SESSION['user'] = $userData;
        
        return $userData;
    }
}