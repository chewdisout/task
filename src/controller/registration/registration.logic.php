<?php
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];

        include "../../model/database/database.model.php";
        include "../../model/registration/registration.model.php";
        include "./registration.controller.php";

        $register = new RegistrationController($username, $password, $repeatPassword);

        $register -> registerUser();

        header("location: /registration?error=none");
    }