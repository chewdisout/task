<?php 

class RegistrationModel extends Database {
    protected function checkUser($username) {
        $query = $this -> connect() -> prepare('SELECT user_id FROM users WHERE users_username = ?;');

        if(!$query -> execute(array($username))) {
            $query = null;
            header("location: /registration?error=queryfailed");
            exit();
        }

        $resultCheck;
        if($query -> rowCount() > 0) {
            $resultCheck = true;
        } else {
            $resultCheck = false;
        }

        return $resultCheck;
    }

    protected function setUser($username, $password) {
        $query = $this -> connect() -> prepare('INSERT INTO users (users_username, users_password) VALUES (?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$query -> execute(array($username, $hashedPassword))) {
            $query = null;
            header("location: /registration?error=queryfailed");
            exit();
        }

        $resultCheck;
        if($query -> rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}