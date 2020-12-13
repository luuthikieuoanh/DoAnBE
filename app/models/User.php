<?php
class User
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $telephone;
    public function __construct($firstName, $lastName, $email, $password, $telephone)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);;
        $this->telephone = $telephone;
    }
    
   
}
