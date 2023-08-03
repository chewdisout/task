<?php 

class LoginModel extends Database {
    protected function getUser($username, $password) {
        $query = $this -> connect() -> prepare('SELECT users_password FROM users WHERE users_username = ?;');

        if(!$query -> execute(array($username))) {
            $query = null;
            header("location: /login?error=queryfailed");
            exit();
        }

        if($query -> rowCount() === 0) {
            $query = null;
            header("location: /login?error=nouserfound");
            exit();
        }

        $passwordHashed = $query -> fetchAll(PDO::FETCH_ASSOC);
        $verifyPassword = password_verify($password, $passwordHashed[0]['users_password']);

        if($verifyPassword === false) {
            $query = null;
            header("location: /login?error=wrongpassword" . $username);
            exit();
        } elseif ($verifyPassword === true) {
            $query = $this -> connect() -> prepare('SELECT user_id, users_username FROM users WHERE users_username = ?;');

            if(!$query -> execute(array($username))) {
                $query = null;
                header("location: /login?error=queryfailed");
                exit();
            }

            if($query -> rowCount() === 0) {
                $query = null;
                header("location: /login?error=nouserfound");
                exit();
            }

            $user = $query -> fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]['user_id'];
            $_SESSION["userUsername"] = $user[0]['users_username'];
        }

        $query = null;
    }
}