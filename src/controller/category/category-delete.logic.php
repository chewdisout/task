<?php 
    if(isset($_POST["submit"])) {
        $categoryTitle = $_POST["categoryTitle"];

        include "../../model/database/database.model.php";
        include "../../model/category/category.model.php";
        include "./category.controller.php";

        $deleteCategory = new CategoryController($categoryTitle, null);

        $deleteCategory -> deleteCategory();

        header("location: /posts?error=none");
    }
    