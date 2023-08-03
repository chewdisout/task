<?php

class RegistrationController extends RegistrationModel {
    private $username;
    private $password;
    private $repeatPassword;

    public function __construct($username, $password, $repeatPassword) {
        $this -> username = $username;
        $this -> password = $password;
        $this -> repeatPassword = $repeatPassword;
    }

    public function registerUser() {
        if ($this -> isEmpty() === true) {
            header("location: /registration?error=emptyinput");
            exit();
        }

        if ($this -> isUsernameValid() === false) {
            header("location: /registration?error=usernameinvalid");
            exit();
        }

        if ($this -> userExist() === true) {
            header("location: /registration?error=userexists");
            exit();
        }

        $this -> setUser($this -> username, $this -> password);
    }

    private function isEmpty(): bool {
        if (empty($this -> username) || empty($this -> password) || empty($this -> repeatPassword)) {
            return true;
        } else {
            return false;
        }
    }

    private function isUsernameValid(): bool {
        if (preg_match("/^[a-zA-Z0-9]*$/", $this -> username)) {
            return true;
        } else {
            return false;
        }
    }

    private function userExist(): bool {
        if ($this -> checkUser($this -> username)) {
            return true;
        } else {
            return false;
        }
    }
}