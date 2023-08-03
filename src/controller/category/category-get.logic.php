<?php 

    include "src/model/database/database.model.php";
    include "src/model/category/category.model.php";
    include "src/controller/category/category.controller.php";

    $getCategory = new CategoryController(null, null);

    $categories = $getCategory -> getCategoriesArray();
