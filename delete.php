<?php
	$ID = $_GET["id"]; 
	include("connect.php");
	$sql = "delete from datve where ID = $ID"; 
	$query = mysqli_query($con,$sql); 
	if ($query){
		header('location:hienthi.php');  
	}
?>