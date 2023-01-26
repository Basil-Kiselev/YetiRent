<?php

class Validate {
    public $email;
    public $password;

    public function __construct(string $email, string $password){
        $this->email = $email;
        $this->password = $password;        
    }

    public function trimData (){
        $trimDataEmail = trim($this->email);
        $trimDataPass = trim($this->password);
        $trimData['email'] = $trimDataEmail;
        $trimData['password'] = $trimDataPass;
        return $trimData; 
    }    

    public function validatePassword (){
        $trimData = self::trimData();

            if(strlen($trimData['password']) < 5){
                echo "Length password less 5 symbols";
            } else {                
                return $trimData;           
            }
    }
}