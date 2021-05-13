<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
$id = $_GET['id'];
$productModel = new ProductModel();
$item = $productModel->getProductById($id);


$notification = '';
if(!empty($_POST['productName']) && !empty($_POST['productDescription']) && !empty($_POST['productPrice']) && !empty($_POST['productPhoto'])) {
    $productModel = new ProductModel();
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productPhoto = $_POST['productPhoto'];
   
    if($productModel->updateProduct($productName, $productDescription, $productPrice, $productPhoto,$id)) {
        $notification = 'cap nhat sản phẩm thành công';
        header('location:http://localhost:83/amado-master/amado-master/manager.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- Xuất thông báo -->
        <?php
        if(!empty($notification)) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $notification; ?>
        </div>
        <?php
        }
        ?>

        <!-- Form thêm sản phẩm -->
        <h1>CREATE A PRODUCT</h1>
        <form action="updateproduct.php?id=<?php echo $id;?>" method="post">
            <div class="form-group">
                <label for="productName">Product name</label>
                <input type="text" name="productName" id="productName" class="form-control" placeholder="Product Name" aria-describedby="helpId" value="<?php echo $item['product_name']; ?>" >
            </div>
            <div class="form-group">
                <label for="productDescription">Product description</label>
                <textarea type="text" name="productDescription" id="productDescription" class="form-control" placeholder="Product Description" aria-describedby="helpId"><?php echo $item['product_description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="productPrice">Product price</label>
                <input type="text" name="productPrice" id="productPrice" class="form-control" placeholder="Product Price" aria-describedby="helpId" value="<?php echo $item['product_price']; ?>">
            </div>
            <div class="form-group">
                <label for="productPhoto">Product photo</label>
                <input type="text" name="productPhoto" id="productPhoto" class="form-control" placeholder="Product photo" aria-describedby="helpId" value="<?php echo $item['product_img']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>