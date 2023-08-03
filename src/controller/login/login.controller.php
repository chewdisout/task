<?php

class LoginController extends LoginModel{
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this -> username = $username;
        $this -> password = $password;
    }

    public function loginUser() {
        if ($this -> isEmpty() === true) {
            header("location: /login?error=emptyinput");
            exit();
        }

        $this -> getUser($this -> username, $this -> password);
    }

    private function isEmpty(): bool {
        if (empty($this -> username) || empty($this -> password)) {
            return true;
        } else {
            return false;
        }
    }
}