<h1>Thông tin thành viên</h1>
<?php 
	include("config.php");
	$query="select * from user";
	$result = mysqli_query($connect, $query);
	echo "<table border=2>";
	echo "<tr>";
	echo "<td>Tên đăng nhập</td>";
	echo "<td>Họ và tên</td>";
	echo "<td>Địa chỉ</td>";
	echo "<td>Số CCCD</td>";
	echo "<td>Số điện thoại</td>";
	echo "</tr>";
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row["tendangnhap_user"]."</td>";
	echo "<td>".$row["ten_user"]."</td>";
	echo "<td>".$row["diachi"]."</td>";
	echo "<td>".$row["CCCD"]."</td>";
	echo "<td>".$row["SĐT"]."</td>";
	echo "<td><a href='xoathanhvien.php?tendangnhap_user=".$row['tendangnhap_user']."' onClick='return confirm('Bạn có muốn xóa không ?')' >Xóa</a></td>";
	echo "</tr>";
		}
	}
	echo "</table>";
?>
