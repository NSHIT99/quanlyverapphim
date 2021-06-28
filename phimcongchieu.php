<!DOCTYPE html>
<html>
<head>
	<title>Phim công chiếu</title>
  	<meta charset="UTF-8">
<style>
	body {
	  font-family: Arial;
	  padding: 10px;
	  background: #e9d8f4;
	}
	#header {
	background-color:white;
	color:#58257b;
	text-align:center;
	padding:5px;
	}
	#nav {
	background-color:white;
	width:15%;
	text-align: center;
	float:left;
	padding:5px;
	}
	#nav a{
	color: #58257b;
	font-size: 30px;
	text-decoration: none;
	}
	#nav a:hover {
	background-color: #db7093;
	color: white;
	}
	#section {
	width:80%;
	float:left;
	padding:10px;
	}
	#footer {
	background-color:white;
	color:#58257b;
	clear:both;
	text-align:center;
	padding:5px;
	}
</style>
</head>
<body>
 
<div id="header">
	<h1>Chào mừng các bạn đến với LOTTE Cinema</h1>
  	<p>Hân hạnh được phục vụ quý khách!</p>
</div>
 
<div id="nav">
	<a href="trangchu.php">Trang chủ</a><br>
	<a href="muave.php">Mua vé</a><br>
	<a href="thanhvien.php">Thành viên</a>
</div>
 
<div id="section">
	<?php
        include "config.php";
        $sql = "SELECT * FROM phimcongchieu";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<table style='width:1200px' border=1>";
                echo "<tr>";
                echo "<td style='text-align:center'>".'<img src="img/'.$row['image'].'"/>'."<h1>".$row["ten_phim"]."</h1>"."<h3>Đạo diễn: ".$row["daodien_phim"]."<h3>"."</td>"; 
                  
                echo "<td style='vertical-align:top'>"."<h3>Năm sản xuất: ".$row["namsx_phim"]."</h3>".$row["ghichu"]."<br>"."<a href='muave.php' style='font-size:20px; color:red'>Mua vé"."</a>"."</td>";
                echo "</tr>";
                echo "</table>";
            }
        }
       ?>
</div>
 
<div id="footer">
	<h4>Lịch chiếu phim có thể thay đổi mà không báo trước</h4>
  	<h4>Thời gian bắt đầu chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</h4>
</div>
 
</body>
</html>
