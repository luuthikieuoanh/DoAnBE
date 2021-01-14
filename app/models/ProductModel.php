<?php
class ProductModel extends Db
{
    // Lấy tất cả sản phẩm
    public function getProducts()
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products");
        return parent::select($sql);
    }

    // Lấy tổng số lượng sản phẩm
    public function getTotalRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(id) FROM products");
        return parent::select($sql)[0]['COUNT(id)'];
    }

    // Lấy sản phẩm theo trang
    public function getProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    // Lấy chi tiết sản phảm theo id
    public function getProductById($id)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    // Lấy các sản phẩm theo danh mục
    public function getProductsByCategory($categoryId)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN products_categories ON products.id = products_categories.product_id WHERE products_categories.category_id = ?");
        $sql->bind_param('i', $categoryId);
        return parent::select($sql);
    }

    // Tìm sản phẩm theo từ khóa
    public function searchProducts($keyword)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ?");
        $search = "%{$keyword}%";
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }

    //Them san pham
    public function createProduct($productName, $productDescription, $productPrice, $productPhoto,$time)
    {
        $sql = parent::$connection->prepare("INSERT INTO `products`(`product_name`, `product_description`, `product_price`, `product_photo`,`create_at`) VALUES (?,?,?,?,?)");
        $sql->bind_param('ssiss', $productName, $productDescription, $productPrice, $productPhoto,$time);
        return $sql->execute();
    }
    //Xoa san pham
    public function deleteProduct($productID)
    {
        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE id=?");
        $sql->bind_param('i', $productID);
        return $sql->execute();
    }
    //Sua san pham
    public function updateProduct($productID, $productName, $productDescription, $productPrice, $productPhoto)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `product_name`=?, `product_description`=?, `product_price`=?, `product_photo`=? WHERE `id` = ?");
        $sql->bind_param('ssisi', $productName, $productDescription, $productPrice, $productPhoto, $productID);
        return $sql->execute();
    }

    //sap xep giam dan
    public function sortProductByTime($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY create_at DESC LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    //tang luot view
    public function increaseView($id)
    {
        $sql=parent::$connection->prepare("UPDATE products SET views = views + 1 WHERE id = ?");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
}
