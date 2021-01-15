<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$productModel = new ProductModel();
if (isset($_GET['delete'])) {
    $item = $productModel->getProductById($_GET['delete']);
    $productModel->deleteProduct($_GET['delete']);
    header('location:manageproducts.php');
}
?>
