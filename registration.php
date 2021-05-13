<!doctype html>
<html>

<head>
    <title>Đăng kí</title>
    <link rel="stylesheet" href="CSS/1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="./login.css">
</head>

<body>
    <form action="xulydangkitaikhoan.php" method="POST">
        <div class="to">
            <div class="formlogin">
                <h2>Đăng ký</h2>
                <i class="fab fa-app-store-ios"></i>
                <label style="margin-left: -140px;">Tên Đăng Nhập</label>
                <input type="text" name="username">
                <label style="margin-left: -160px;">Password</label>
                <input type="text" name="password">
                <label style="margin-left: -180px;">Email</label>
                <input type="text" name="email">
                <label style="margin-left: -150px;">Họ Và Tên</label>
                <input type="text" name="fullname">
                <input id="submit" type="submit" name="submit" value="Đăng Kí Tài Khoan">
                <input id="rs" type="reset" value="Reset">
            </div>
        </div>
    </form>
</body>

</html>