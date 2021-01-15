<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
$productmodel = new ProductModel();

var_dump($productmodel->updateLike(1,1));
?>