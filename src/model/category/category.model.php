<?php 

class CategoryModel extends Database {
    protected function addCategory($title, $description) {
        $query = $this -> connect() -> prepare('INSERT INTO categories (category_title, category_description) VALUES (?, ?);');

        if(!$query -> execute(array($title, $description))) {
            $query = null;
            header("location: /add-category?error=queryfailed");
            exit();
        }
    }

    protected function getCategories() {
        $query = $this -> connect() -> prepare('SELECT * FROM categories');

        if(!$query -> execute()) {
            $query = null;
            header("location: /posts?error=queryfailed");
            exit();
        }

        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getSubCategories($parentCategoryId) {
        $query = $this -> connect() -> prepare('SELECT * FROM sub_categories WHERE parent_category_id = ?');

        if(!$query -> execute(array($parentCategoryId))) {
            $query = null;
            header("location: /posts?error=queryfailed");
            exit();
        }

        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    protected function removeCategory($title) {
        $query = $this -> connect() -> prepare('DELETE FROM categories WHERE category_title = ?');

        if(!$query -> execute(array($title))) {
            $query = null;
            header("location: /posts?error=queryfailed");
            exit();
        }
    }
}