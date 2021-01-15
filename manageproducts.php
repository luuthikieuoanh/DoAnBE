<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

session_start();
if (!isset($_SESSION['email'])) {
    header('Location:login.php');
}


$productModel = new ProductModel();
$productList = $productModel->getProducts();

if (isset($_GET['delete'])) {
    $productModel->deleteProduct($_GET['delete']);
    header('location:manageproducts.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        td.photo {
            width: 100px;
        }

        .thread td {
            background: #cfd3d6;
            font-size: 15px;
            font-weight: bolder;

        }

        .btn-primary {
            background-color: #36506d;
            margin: 15px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="createproduct.php" class="btn btn-primary">Create a new product</a>
        <a href="logout.php" class="btn btn-primary">Logout</a>
        <table class="table">
            <tr class="thread">
                <td>ID</td>
                <td class="photo">IMAGE</td>
                <td>NAME</td>
                <td>PRICE</td>
                <td>UPDATE</td>
                <td>DELETE</td>
            </tr>
            <?php
            foreach ($productList as $item) {
            ?>
                <tr>
                    <td><?php echo $item['product_id'] ?></td>
                    <td>
                        <?php
                        $productPath = strtolower(str_replace(' ', '-', $item['product_name'])) . '-' . $item['product_id'];
                        ?>
                        <a href="product.php/<?php echo $productPath ?>">
                            <img src="image/cache/catalog/demo/product/<?php echo explode(",", $item['product_picture'])[0] ?>" class="card-img-top img-fluid" alt="..." style="width:100px;">
                        </a>
                    </td>
                    <!-- <td><img src="./public/images/<?php //echo  $item['product_photo'] 
                                                        ?> " class="img-fluid" alt="..."></td> -->
                    <td><?php echo $item['product_name'] ?></td>
                    <td><?php echo $item['product_price'] ?></td>
                    <td>
                        <a href="updateproduct.php?update=<?php echo  $item['product_id'] ?>" class="btn btn-primary">UPDATE</a>
                    </td>
                    <td>
                        <form action="deleteproduct.php?delete=<?php echo  $item['product_id'] ?>" method="post" onsubmit="return confirm('Ban chac chan muon xoa san pham ?')">
                            <!-- <input type="hidden" name="productId" value="<?php// echo $item['id'] ?>"> -->
                            <button type="submit" class="btn btn-primary">DELETE</button>
                        </form>
                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>
</body>

</html>