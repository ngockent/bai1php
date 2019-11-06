<?php
	include 'connect.php';

	function vantintaikhoan(){
		global $con;
		$sql = "select * from diadiem ";
		$exe = mysqli_query($con,$sql);
		return $exe;
	}

	function laythongtindiemdi($exe)
	{
		global $con;
		vantintaikhoan();
		while ($num = mysqli_fetch_array($exe)) {
			$num['DiemDi'];
		}
		return $num;
	}
?>