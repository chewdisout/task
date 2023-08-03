<?php
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        include "../../model/database/database.model.php";
        include "../../model/login/login.model.php";
        include "./login.controller.php";

        $login = new LoginController($username, $password);

        $login -> loginUser();

        header("location: /?error=none");
    }