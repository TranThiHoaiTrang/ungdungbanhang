<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$productlist = new ProductModel();

if (!isset($_POST['username'])) {
    die('');
}

$username   = addslashes($_POST['username']);
$password   = addslashes($_POST['password']);
$email      = addslashes($_POST['email']);
$fullname   = addslashes($_POST['fullname']);

if (!$username || !$password || !$email || !$fullname)
{
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
      
    // Mã khóa mật khẩu
    $password = md5($password);

 //Kiểm tra tên đăng nhập này đã có người dùng chưa
 if ($productlist->getname($username) == $username){
    echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
      
//Kiểm tra email có đúng định dạng hay không
if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
{
    echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
      
//Kiểm tra email đã có người dùng chưa
if ($productlist->getemail($email) == $email)
{
    echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

//Thông báo quá trình lưu
if ($productlist->createmember($username ,$password ,$email ,$fullname))
echo "Quá trình đăng ký thành công. <a href='login.php'>Về trang đăng nhập</a>";
else
echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='registration.php'>Thử lại</a>";

