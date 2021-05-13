<?php
session_start();
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$productModel = new ProductModel();

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    if ($productModel->deleteProduct($id)) {
        $notification = 'xoa sản phẩm thành công';
    }
}
$productList = $productModel->getProducts();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
    .dangnhap li {
        list-style: none;
    }

    .dangnhap {
        margin-bottom: 50px;
        font-family: Georgia, Times, 'Times New Roman', serif;
    }

    .dangnhap a {
        font-size: 1rem;
    }
</style>

<body>
    <?php
    if (!empty($notification)) {
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $notification; ?>
        </div>
    <?php
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Manage Products</h1>
            </div>
            <div class="col-4 text-right">
                <a href="createproduct.php" class="btn btn-primary">CREATE</a>
            </div>
             <!-- dang nhap -->
             <div class="col-4 dangnhap">
                <?php
                if (isset($_SESSION['username']) && $_SESSION['username']) { ?>

                    <li class="active">Xin Chào <?php echo $_SESSION['username'] ?></li>
                    <a href="logout.php">
                        <li>Logout</li>
                    </a>

                <?php
                } else { ?>
                    <li>Ban Chưa Đăng Nhập</li>
                    <a href="login.php">
                        <li>Login</li>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>

        <table class="table">
            <thead>
                <td>ID</td>
                <td style="width: 50px;">Product Photo</td>
                <td>Product Name</td>
                <td>Update</td>
                <td>Delete</td>
            </thead>
            <?php
            foreach ($productList as $item) {
            ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <?php
                    $maintphoto = explode(',', $item['product_img']);
                    ?>
                    <td><img src="img/bg-img/<?php echo $maintphoto[0] ?>" class="img-fluid" alt="..."></td>
                    <td><?php echo $item['product_name'] ?></td>
                    <td><a href="updateproduct.php?id=<?php echo $item['id'] ?>" class="btn btn-primary">UPDATE</a></td>
                    <td>
                        <form action="manager.php" method="post" onsubmit="return confirm('xoa khong?')">
                            <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                            <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>