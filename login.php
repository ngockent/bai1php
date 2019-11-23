<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <?php include 'connect.php' ?>
    <div class="container">
        <form method="post" style="margin:0 10%">
            <h1 align="center">Login</h1>
            <div class="row">
                <label class="col-md-3">UserName</label>
                <input class="col-md-3" type="text" name="username">
            </div>
            <div class="row">
                <label class="col-md-3">PassWord</label>
                <input type="password" class="col-md-3" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="OK">Đăng Nhập</button>
        </form>
    </div>

    <?php
    if (isset($_POST['OK'])) {
        $user = $_POST['username'];
        $paswd = $_POST['password'];

        $sqllogin = "select * from user where username = '$user' and password = '$paswd'";
        $exelogin = mysqli_query($con, $sqllogin);
        if (mysqli_num_rows($exelogin) != 1) {
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu không hợp lệ')</script>";
        } else {
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $paswd;
            header("location:bai1.php");
        }
    }
    ?>
</body>

</html>