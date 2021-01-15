<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
$productModel = new ProductModel();
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $item = $productModel->getProductById($id);
}

if (isset($_POST['productName'])) {
    $photo = $_FILES['productPhoto'];
    $imgName = array();

    for ($i = 0; $i < count($photo['name']); $i++) {
        $imgName[$i] = time() . $photo['name'][$i];
        $uploadPath = 'image/cache/catalog/demo/product/' . $imgName[$i];
        if (is_uploaded_file($photo['tmp_name'][$i]) && move_uploaded_file($photo['tmp_name'][$i], $uploadPath));
    }
    $filename = implode(',', $imgName);
     $a = (int)$item['product_qty'] + (int)$_POST['qty'];
    $update = $productModel->updateProduct($_GET['update'], $_POST['productName'], $_POST['productDescription'], $_POST['productPrice'], $filename, $a);
    header('location:manageproducts.php');
    //echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .title {
            text-align: center;
        }

        label {
            font-weight: bolder;
        }

        .form-control {
            width: 25%;
        }

        .form-group input {
            width: 360px;
        }

        .contain {
            margin: 0 35%;
        }

        button {
            float: right;
            margin-right: 30px;
        }

        textarea {
            width: 365px;
        }

        .form-control {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <h2 class="title">Update Product</h2>
    <div class="contain">
        <form action="updateproduct.php?update=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="id" style="display: none;" value="<?php echo $id ?>">
            <div class="form-group">
                <label>Name:
                    <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter product name....." value="<?php echo $item['product_name'] ?>">
                </label>
            </div>
            <div class="form-group ">
                <label>Description:</label>
                <input type="text" name="productDescription" id="productDescription" class="form-control description" placeholder="Enter product description....." value="<?php echo $item['product_description'] ?>">
                <!-- <textarea name="productDescription" id="productDescription" cols="30" rows="10" placeholder="Enter product description....." aria-valuetext="<?php// echo $item['product_description']?>"></textarea> -->

            </div>
            <div class="form-group">
                <label>Price:
                    <input type="text" name="productPrice" id="productPrice" class="form-control" placeholder="Enter product price......" value="<?php echo $item['product_price'] ?>">
                </label>
            </div>
            <div class="form-group">
                <label>Qty:
                    <input type="text" name="qty" id="qty" class="form-control" placeholder="Enter product qty......" value="<?php echo $item['product_qty'] ?>">
                </label>
            </div>
            <div class="form-group">
                <label>Photo:
                    <input type="file" name="productPhoto[]" id="productPhoto" multiple placeholder="Enter product photo.....">
                </label>
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</body>


</html>