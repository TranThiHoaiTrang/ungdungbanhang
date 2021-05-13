<!doctype html>
<html>

<head>
  <title>Đăng Nhập</title>
  <link rel="stylesheet" href="CSS/1.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
  <link rel="stylesheet" href="./login.css">
</head>

<body>

  <div class="to">
    <div class="form">
      <form action='xulydangnhap.php?do=login' method='POST'>
        <h2 style="margin-left: 30px;">Đăng Nhập</h2>
        <i style="margin-left: 70px;" class="fab fa-app-store-ios"></i>
        <label style="width: 120px;margin-left: 20px;">Tên Đăng Nhập</label>
        <input style=" margin-left: 20px;" type="text" name="hoten">
        <label style=" margin-left: 20px;" style="width: 120px;margin-left: 0px;">Password</label>
        <input style=" margin-left: 20px;" type="text" name="password">
        <input style=" margin-left: 20px;" id="submit" type="submit" name="dangnhap" value="Gửi">
      </form>
      <a style="margin-top: 50px;" href="registration.php"><button type="submit">Đăng Kí</button></a>
    </div>
  </div>

</body>

</html>