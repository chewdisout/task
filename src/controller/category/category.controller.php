<?php

class CategoryController extends CategoryModel {
    private $title;
    private $description;

    public function __construct($title, $description) {
        $this -> title = $title;
        $this -> description = $description;
    }

    public function getCategoriesArray(): array {
        return $this -> getCategories();
    }

    public function getSubCategoriesArray($parentId): array {
        return $this -> getSubCategories($parentId);
    }

    public function deleteCategory() {
        $this -> removeCategory($this -> title);
    }

    public function createCategory() {
        if ($this -> isEmpty() === true) {
            header("location: /add-category?error=emptyinput");
            exit();
        }

        $this -> addCategory($this -> title, $this -> description);
    }

    private function isEmpty(): bool {
        if (empty($this -> title) || empty($this -> description)) {
            return true;
        } else {
            return false;
        }
    }
}