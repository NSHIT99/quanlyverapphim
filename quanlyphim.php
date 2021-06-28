<!DOCTYPE html>
<html>
<head>
    <title>Phim công chiếu</title>
    <meta charset="UTF-8">
<style>
.main a:hover {
  background-color: #db7093;
  color: white;
  width: 130px;
}

</style>
</head>
<body>
<h1>Các bộ phim công chiếu</h1>
<div class="main">
<a style="display: block; color: green; text-decoration: none; font-size:30px" href="themmoiphim.php">Thêm mới</a>
<?php
    include "config.php";
    $sql = "SELECT * FROM phimcongchieu";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0){
    	while($row = mysqli_fetch_assoc($result)){
            echo "<table style='width:1200px' border=1>";
            echo "<tr>";
            echo "<td style='text-align:center'>".'<img src="img/'.$row['image'].'"/>'."<h1>".$row["ten_phim"]."</h1>"."<h3>Đạo diễn: ".$row["daodien_phim"]."<h3>"."</td>"; 
                  
            echo "<td style='vertical-align:top'>"."<h3>Năm sản xuất: ".$row["namsx_phim"]."</h3>".$row["ghichu"]."<br>"."<br>"."<br>"."<a style='display: block; color: green; text-decoration: none; font-size:30px' href='suaphim.php?id_phim=".$row["id_phim"]."'>Chỉnh sửa</a>"."<a style='display: block; color: green; text-decoration: none; font-size:30px' href='quanlyphim.php?id_phim=".$row["id_phim"]."'>Xóa phim</a>"."</td>";
            echo "</tr>";
            echo "</table>";
        }
    }
?>
<?php
	error_reporting(0);
	$id_phim = $_GET['id_phim'];
	include("config.php");
	$query = "delete from phimcongchieu where id_phim = '$id_phim'";
		if (mysqli_query($connect, $query) ==true) {
		}
		else{
			echo "error";
		}
?>	
</div>
</body>
</html>