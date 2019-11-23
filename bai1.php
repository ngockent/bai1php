<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<title>bai1</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<?php
	include 'connect.php';
	include 'function.php';
	// var_dump('<pre>');
	// var_dump(abc($con));
	// var_dump('</pre>');
	// die;
	?>
	<form method="POST">
		<div class="container bg-secondary ">
			<div class="row-1">
				<h1 name="id">Đặt vé máy bay</h1>
			</div>
			<hr>
			<div class="row" style="color: #000;">
				<div class="col-md-6">
					<label class="col-md-6">Điểm đi</label>
					<select name="diemdi" class="col-md-6">
						<?php
						foreach (abc($con) as $key => $value) {
							?>
							<option><?php echo $value["DiemDi"] ?></option><br>
						<?php } ?>
					</select>
					<br>
					<lable class="col">Ngày đi</lable><br>
					<input type="number" name="ngaydi" class="col-md-2" min="1" max="31" step="1" placeholder="1">
					<input type="month" class="col-md-7" name="thangdi">
				</div>
				<div class="col-md-6">
					<label class="col">Điểm đến</label>
					<select name="diemden" value="col-md-9">
						<?php
						foreach (abc($con) as $key => $value) {
							?>
							<option><?php echo $value['DiemDen']; ?></option>
						<?php } ?>
					</select>
					<br>
					<label class="col-md-6">Ngày về</label><br>
					<input type="number" class="col-md-2" name="ngayve" min="1" max="31" step="1" placeholder="1">
					<input type="month" class="col-md-7" name="thangve">
				</div>
			</div>
			<hr>
			<div class="row">
				<label class="col-md-2">Người lớn</label>
				<input type="number" class="col-md-1" min="0" max="10" step="1" name="nguoilon"><br>
				<label class="col-md-9">(Từ 12 tuổi trở lên)</label>
				<label class="col-md-2">Trẻ em</label><br>
				<input type="number" class="col-md-1" min="0" max="10" step="1" name="treem"><br>
				<label class="col-md-9">(Từ 7 đến 12 tuổi)</label>
				<label class="col-md-2">Em bé</label><br>
				<input type="number" class="col-md-1" min="0" max="10" step="1" name="embe"><br>
				<label class="col-md-9">(Dưới 7 tuổi)</label>
			</div>
			<hr>
			<div class="row">
				<a href="#" class="col-md-6" style="color:#fff">Xem thêm hướng dẫn</a>
				<input type="submit" class="col-md-2 btn btn-primary" value="Mua Ngay" name="OK">
				<input type="button" class="col-md-2 btn btn-primary" onclick="location='hienthi.php'"
			</div>
		</div>
		<?php
		if (isset($_POST['OK'])) {
			$diemdi = $_POST['diemdi'];
			$diemden = $_POST['diemden'];
			$ngaydi = $_POST['ngaydi'];
			$thangdi = date("M,Y", strtotime($_POST['thangdi']));
			$ngayve = $_POST['ngayve'];
			$thangve = date("M,Y", strtotime($_POST['thangve']));
			$nguoilon = $_POST['nguoilon'];
			$treem = $_POST['treem'];
			$embe = $_POST['embe'];
			$total = 0;
			$user = $_SESSION['username'];

			$dayin = $ngaydi . ',' . $thangdi;
			$dayout = $ngayve . ',' . $thangve;
			$total = 2000000 * (int) ($nguoilon) + 2000000 * 25 / 100 * (int) ($treem) + 2000000 * 80 / 100 * ($embe);

			if ($ngaydi >= 1 || $ngaydi <= 31 and $ngayve >= 1 || $ngayve <= 31) 
			{
				if ($nguoilon >= 1 || $nguoilon <= 10 and $treem >= 1 || $treem <= 10) 
				{
					$sqlselect = "Insert into datve(username,DiemDi,DiemDen,NgayDi,NgayVe,NguoiLon,TreEm,EmBe,TotalMoney)
					values('$user','$diemdi','$diemden','$dayin','$dayout','$nguoilon','$treem','$embe','$total')";
					$exeInsert = mysqli_query($con, $sqlselect);
					header('location:hienthi.php');
				}
			} else {
				die();
			}
		}
		?>
	</form>
</body>

</html>