<?php
    if(isset($_POST["submit"])) {
        $categoryTitle = $_POST["categoryTitle"];
        $categoryDescription = $_POST["categoryDescription"];

        include "../../model/database/database.model.php";
        include "../../model/category/category.model.php";
        include "./category.controller.php";

        $addCategory = new CategoryController($categoryTitle, $categoryDescription);

        $addCategory -> createCategory();

        header("location: /add-category?error=none");
    }