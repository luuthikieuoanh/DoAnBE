<?php
class ProductModel extends Db
{
    // Lấy tổng số lượng sản phẩm
    public function getTotalRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(product_id) FROM products");
        return parent::select($sql)[0]['COUNT(product_id)'];
    }
    // Lấy sản phẩm theo trang
    public function getProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM products LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }
    // Lấy sản phẩm mới nhất 
    public function getLatestProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT product_id,product_name,product_price,product_picture FROM products ORDER BY create_at DESC LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }
    //
    public function getProducts()
    {
        $sql = parent::$connection->prepare("SELECT * from products");
        return parent::select($sql);
    }
    //Lấy sản phẩm theo id
    public function getProductByID($id)
    {
        $sql = parent::$connection->prepare("SELECT * from products where product_id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    //Lấy sản phẩm bán chạy
    public function getBestSellerProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT SUM(order_count.number) AS total, products.`product_id`,products.product_name,products.product_price,product_picture FROM products JOIN order_count 
        ON products.product_id = order_count.product_id 
        GROUP BY order_count.product_id 
        ORDER BY total DESC 
        LIMIT ?,?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }
     // Lấy các sản phẩm theo danh mục
     public function getProductsByCategory($categoryId)
     {
         $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN products_categories ON products.product_id = products_categories.product_id WHERE products_categories.category_id = ?");
         $sql->bind_param('i', $categoryId);
         return parent::select($sql);
     }
         // Tìm sản phẩm theo từ khóa
         public function searchProducts($keyword)
         {
           
             $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ? ");
             $search = "%{$keyword}%";
             $sql->bind_param('s', $search);
             return parent::select($sql);
         }
    public function searchProductsByPage($keyword,$page,$perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ? LIMIT ?,?");
        $search = "%{$keyword}%";
        $sql->bind_param('sii', $search,$start,$perPage);
        return parent::select($sql);
    }

         // Tìm sản phẩm theo từ khóa
         public function searchProductsASC($keyword,$page,$perPage)
         {
             $start = ($page - 1) * $perPage;
             $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ? LIMIT ?,?");
             $search = "%{$keyword}%";
             $sql->bind_param('sii', $search,$start,$perPage);
             return parent::select($sql);
         }
    //Sap xep
    public function sortCategoryDECS($id,$x,$page,$perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN products_categories ON products.product_id = products_categories.product_id WHERE products_categories.category_id = ? ORDER BY products.$x DESC LIMIT ?,?");
        $sql->bind_param('iii',$id,$start,$perPage);
        return parent::select($sql);
    }
    public function sortCategoryASC($id,$x,$page,$perPage)
    {
        $start = ($page - 1) * $perPage;

        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN products_categories ON products.product_id = products_categories.product_id WHERE products_categories.category_id = ? ORDER BY products.$x ASC LIMIT ?,?");
        $sql->bind_param('iii',$id,$start,$perPage);
        return parent::select($sql);
    }
     //Them san pham
     public function createProduct($productName, $productDescription, $productPrice, $productPhoto,$time,$qty)
     {
         $sql = parent::$connection->prepare("INSERT INTO `products`(`product_name`, `product_price`, `product_description`, `product_picture`,`product_qty`,`create_at`) VALUES (?,?,?,?,?,?)");
         $sql->bind_param('sissis', $productName, $productPrice, $productDescription, $productPhoto, $qty, $time);
         return $sql->execute();
     }

      //Xoa san pham
    public function deleteProduct($productID)
    {
        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE product_id=?");
        $sql->bind_param('i', $productID);
        return $sql->execute();
    }

    //Sua san pham
    public function updateProduct($productID, $productName, $productDescription, $productPrice, $productPhoto,$qty)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `product_name`=?, `product_description`=?, `product_price`=?, `product_picture`=?, `product_qty`=? WHERE `product_id` = ?");
        $sql->bind_param('ssisii', $productName, $productDescription, $productPrice, $productPhoto, $qty, $productID);
        return $sql->execute();
    }
    public function getProductsByCategoryPage($categoryId,$page,$perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN products_categories ON products.product_id = products_categories.product_id WHERE products_categories.category_id = ? LIMIT ?,?");
        $sql->bind_param('iii', $categoryId,$start,$perPage);
        return parent::select($sql);
    }
}
