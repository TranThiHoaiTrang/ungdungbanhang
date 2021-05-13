<?php
class ProductModel extends Db
{
    // Lấy tát cả sản phẩm
    public function getProducts()
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products");
        return parent::select($sql);
    }

    // Lấy tát cả sản phẩm theo trang
    public function getProductsByPage($perPage, $page)
    {
        $start = $perPage * ($page - 1);
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products  ORDER BY `created_at` DESC LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    // Lấy chi tiết sản phẩm theo id
    public function getProductById($id)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    // Lấy sản phẩm theo danh mục
    public function getProductsByCategory($categoryId)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN product_categories ON products.id = product_categories.id_product WHERE product_categories.id_categories = ?");
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

    // Lấy tổng số dòng
    public function getTotalRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(id) FROM products ");
        return parent::select($sql)[0]['COUNT(id)'];
    }

    // Thêm sản phẩm
    public function createProduct($productName, $productDescription, $productPrice, $productPhoto)
    {
        $sql = parent::$connection->prepare("INSERT INTO `products` (`product_name`, `product_description`, `product_price`, `product_img`,`created_at`,`product_view`) VALUES (?, ?, ?, ?,now(),0);");
        $sql->bind_param('ssis', $productName, $productDescription, $productPrice, $productPhoto);
        return $sql->execute();
    }
    //update sản phẩm
    public function updateProduct($productName, $productDescription, $productPrice, $productPhoto, $id)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `product_name` = ?, `product_description` = ?, `product_price` = ?, `product_img`= ? WHERE `products`.`id` = ?;");
        $sql->bind_param('ssisi', $productName, $productDescription, $productPrice, $productPhoto, $id);
        return $sql->execute();
    }
    //delete sản phẩm
    public function deleteProduct($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE `products`.`id` = ?;");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
    //lay ra san pham moi nhat
    public function getdate()
    {
        $sql = parent::$connection->prepare("SELECT * FROM `products` WHERE ( DATEDIFF(CURDATE(), `created_at`)) < 15");
        return $sql->execute();
    }
    //lay chi tiet san pham moi nhat
    public function getRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(id) FROM `products` WHERE (DATEDIFF (CURDATE(), `created_at`)) < 15 ");
        return parent::select($sql)[0]['COUNT(id)'];
    }
    //kiem tra ten co ngupi dung chua
    public function getname($username)
    {
        $sql = parent::$connection->prepare("SELECT username FROM member WHERE username='$username'");
        return parent::select($sql);
    }
    //Kiểm tra email đã có người dùng chưa
    public function getemail($email)
    {
        $sql = parent::$connection->prepare("SELECT email FROM member WHERE email='$email'");
        return parent::select($sql);
    }
    //Lưu thông tin thành viên vào bảng
    public function createmember($username, $passwords, $email, $fullname)
    {
        $sql = parent::$connection->prepare("
        INSERT INTO member (
            username,
            passwords,
            email,
            fullname,
            loai
        )
        VALUE (
            '{$username}',
            '{$passwords}',
            '{$email}',
            '{$fullname}',
            0
        )
        ");
        return $sql->execute();
    }
    
    //Kiểm tra tên đăng nhập có tồn tại không
    public function getnamelogin($username)
    {
        $sql = parent::$connection->prepare("SELECT username, passwords FROM member WHERE username='$username'");
        return parent::select($sql);
    }
    //kiem tra pass
    public function getpass($passwords)
    {
        $sql=parent::$connection->prepare("SELECT `passwords` FROM `member` WHERE `passwords` = '$passwords'");
        return parent::select($sql);
    }
    //lay ra loai
    public function getloai($username)
    {
        $sql=parent::$connection->prepare("SELECT * FROM `member` WHERE `username` = '$username' AND `loai` = 1");
        return parent::select($sql);
    }
    //update view
    public function getview($id, $product_view)
    {
        $sql = parent::$connection->prepare("UPDATE products SET `product_view` =  ? WHERE `id` = ?");
        $sql->bind_param('ii',$product_view,$id);
        return $sql->execute();
    }

    public function getProductByIdview($id)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    public function getproductview()
    {
        $sql = parent::$connection->prepare("SELECT * FROM `products` WHERE `product_view` ORDER BY `product_view` DESC LIMIT 4");
        return parent::select($sql);
    }
}
