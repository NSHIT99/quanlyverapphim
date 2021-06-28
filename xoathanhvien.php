<?php
		$tendangnhap_user = $_GET["tendangnhap_user"];
		include("config.php");
		$query = "delete from user where tendangnhap_user='$tendangnhap_user'";
		if (mysqli_query($connect, $query)==true) {
			header("location:quanlythanhvien.php");
		}
		else{
			echo "error";
		}
?>
