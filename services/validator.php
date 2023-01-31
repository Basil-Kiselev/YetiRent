<?php

class Validate {
    public $email;
    public $password;

    public function __construct(string $email, string $password){
        $this->email = $email;
        $this->password = $password;        
    }

    public function run(): array
    {
        $errors = [];

        if (empty($this->email)) {
            $errors['email'][] = "field required";
        } 

        if (empty($this->password)) {
            $errors['password'][] = "field required"; 
        }
        
        if (strlen($this->password) < 5) {
            $errors['password'][] = "length password less 5 symbols";
        }

        return $errors;
    }
}