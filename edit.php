<!DOCTYPE html>
<html>

<head>
	<title>Sửa</title>
</head>

<body>
	<form method="POST">
		<h1 align="center">Thông tin đăng ký</h1>
		<table align="center" border="1">
			<?php
			include 'connect.php';
			$id = $_GET['id'];
			$sql2 = "select * from datve where ID = $id";
			$exec2 = mysqli_query($con, $sql2);
			$result = mysqli_fetch_array($exec2)
			?>
			<tr>
				<td>Tài Khoản</td>
				<td>
					<input type="text" name="txtUserName" value="<?php echo $result['username']; ?>">
				</td>
			</tr>
			<tr>
				<td>Điểm đi</td>
				<td>
					<input type="text" name="diemdi" value="<?php echo $result['DiemDi']; ?>">
				</td>
			</tr>
			<tr>
				<td>Điểm Đến</td>
				<td>
					<input type="text" name="diemden" value="<?php echo $result['DiemDen']; ?>">
				</td>
			</tr>
			<tr>
				<td>Ngày Đi</td>
				<td>
					<input type="text" name="ngaydi" value="<?php echo $result['NgayDI']; ?>">
				</td>
			</tr>
			<tr>
				<td>Ngày Về</td>
				<td>
					<input type="text" name="ngayve" value="<?php echo $result['NgayVe']; ?>">
				</td>
			</tr>
			<tr>
				<td>Người Lớn</td>
				<td>
					<input type="text" name="nguoilon" value="<?php echo $result['NguoiLon'] ?>">
				</td>
			</tr>
			<tr>
				<td>Trẻ Em</td>
				<td>
					<input type="text" name="treem" value="<?php echo $result['TreEm'] ?>">
				</td>
			</tr>
			<tr>
				<td>Em Bé</td>
				<td>
					<input type="text" name="embe" value="<?php echo $result['EmBe'] ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2">

					<button type="submit" class="btn btn-primary" name="OK">Submit</button>

				</td>
			</tr>
		</table>
	</form>
	<?php
	if (isset($_POST["OK"])) {
		$userName = $_POST["txtUserName"];
		$diemdi = $_POST['diemdi'];
		$diemden = $_POST['diemden'];
		$ngaydi = $_POST['ngaydi'];
		$ngayve = $_POST['ngayve'];
		$nguoilon = $_POST['nguoilon'];
		$treem = $_POST['treem'];
		$embe = $_POST['embe'];
		$total = 0;

		$total = (2000000 * (int)($nguoilon)) + (2000000 * 25 / 100 * (int)($treem)) + (2000000 * 80 / 100 * ($embe));
		$query = "update datve set  DiemDi='$diemdi', DiemDen = '$diemden', NgayDI = '$ngaydi', NgayVe = '$ngayve', NguoiLon = '$nguoilon', TreEm = '$treem', EmBe = '$embe', TotalMoney = '$total'";
		$update = mysqli_query($con, $query);
		if ($update == true) {
			header("location: hienthi.php");
		}
	}
	?>
</body>

</html>