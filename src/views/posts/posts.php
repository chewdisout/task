<?php 
    include 'src/controller/category/category-get.logic.php';
?>

<div class="posts">
    <div class="post-categories">
        <?php include 'src/views/components/categories/categories.php'; ?>
    </div>
    <div class="post-subcategories">
        <?php
            if(isset($_GET["categoryId"])) {
                $category = new CategoryController(null, null);
                $subCategories = $category -> getSubCategoriesArray($_GET["categoryId"]);

                foreach($subCategories as $subCategory) {
        ?>
                <div class="subcategories-item">
                    <div class="subcategories-item-description"><?php echo $subCategory["sub_category_title"] ?></div>
                    <div class="subcategories-item-title"><?php echo $subCategory["sub_category_description"] ?></div>
                </div>
        <?php

                }
            }
        ?>
    </div>
    <div>
        <form action="src/controller/category/category-delete.logic.php" method="POST">
            <div class="form-input">
                <label for="categoryTitle">Type title name to delete</label>
                <input name="categoryTitle" type="text">
            </div>
            <div class="form-submit">
                <button type="submit" name="submit">Delete</button>
            </div>
        </form>
    </div>
</div>