<?php
class CategoryModel extends Db
{
    public function getCategories()
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM categories");
        return parent::select($sql);
    }

    public function getCategoriesByCategory($categoryId)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM categories_in_categories INNER JOIN categories_categories ON categories_in_categories.id = categories_categories.category_in_id WHERE categories_categories.category_id = ?");
        $sql->bind_param('i', $categoryId);
        return parent::select($sql);
    }
}
