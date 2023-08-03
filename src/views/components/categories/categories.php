<?php
    foreach ($categories as $category){
?>
<div class="category-item">
    <div class="categories-title"><a href="/posts?categoryId=<?php echo $category['category_id'];?>"><?php echo $category['category_title'] ?></a></div>
    <div class="categories-description"><?php echo $category['category_description'] ?></div>
</div>
<?php
    }
?>