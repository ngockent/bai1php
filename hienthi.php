<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <table border="1" align="center">
            <tr>
            <?php
                include 'connect.php';
                $user = $_SESSION['username'];
            ?>
                <td colspan="11">
                    <p>Xin Chào: <?php echo $user?></p>
                </td>
            </tr>
            <tr>
                <td>STT</td>
                <td>Điểm Đi</td>
                <td>Điểm Đến</td>
                <td>Ngày Đi</td>
                <td>Ngày Về</td>
                <td>Người Lớn</td>
                <td>Trẻ Em</td>
                <td>Em Bé</td>
                <td>Tổng Tiền</td>
                <td colspan="2">Thao Tac</td>
            </tr>
            <?php
                $sql = "select * from datve where username = '$user'";
                $exe = mysqli_query($con,$sql);
                $index = 1;
                while ($num = mysqli_fetch_array($exe)){
            ?>
            <tr>
                <td><?php echo $index; ?></td>
                <td><?php echo $num['DiemDi']; ?></td>
                <td><?php echo $num['DiemDen']; ?></td>
                <td><?php echo $num['NgayDI']; ?></td>
                <td><?php echo $num['NgayVe']; ?></td>
                <td><?php echo $num['NguoiLon']; ?></td>
                <td><?php echo $num['TreEm']; ?></td>
                <td><?php echo $num['EmBe']; ?></td>
                <td><?php echo $num['TotalMoney']; ?></td>
                <td><a href='edit.php?id="<?php echo $num[0]?>"'>Sửa</a></td>
				<td><a href='delete.php?id="<?php echo $num[0]; ?>"' onclick="if(confirm('Ban co muon xoa khong?')) return true; else return false;">Xóa</a></td>
            </tr>
            <?php $index++;}?>
            <tr>
                <td colspan="11" align="center">
                    <a name="" class="btn btn-primary" href="bai1.php" role="button">Đặt vé</a>
                    <a name="" class="btn btn-danger" href="login.php" role="button">Thoát</a>
                </td>
            </tr>
        </table>           
    </form>
</body>
</html>