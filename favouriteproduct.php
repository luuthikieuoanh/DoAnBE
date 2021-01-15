<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
	require './app/models/' . $class_name . '.php';
});
$productModel = new ProductModel();

if (isset($_POST['favourite_check'])) {
    if ($productModel->updateLike($_POST['product_id'],$_POST['user_id'])) {
        $like = $productModel->countLike($_POST['product_id']);
        $checkUserFavourite = $productModel->checkUserFavourite($_POST['user_id'],$_POST['product_id']);
        echo "{ \"result\":\"success\",\"like\":".$like.",\"checkUserFavourite\":\"".$checkUserFavourite."\" }";
    }else{
        echo "{ \"result\":\"error\" }";
    }
}
