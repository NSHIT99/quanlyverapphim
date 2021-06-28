<!DOCTYPE html>
<html>
<head>
  <title>Mua vé</title>
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
  <a href="phimcongchieu.php">Phim công chiếu</a><br>
  <a href="thanhvien.php">Thành viên</a>
</div>
 
<div id="section">
  <form method="POST">
  <?php 
    include "config.php";
    $sql = "SELECT vb.id_banve, pcc.ten_phim, pcc.daodien_phim, pcc.image, vb.sove, vb.ngaycongchieu, vb.giocongchieu FROM phimcongchieu AS pcc INNER JOIN banve AS vb ON(pcc.id_phim = vb.id_phim)";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo "<table style='width:1200px' border=1>";
        echo "<tr>";
        echo "<td style='text-align:center'>".'<img src="img/'.$row['image'].'"/>'."<h1>".$row["ten_phim"]."</h1>"."<h3>Đạo diễn: ".$row["daodien_phim"]."<h3>"."</td>"; 
        $id_banve=$row["id_banve"];
        echo "<input type='hidden' name='id_banve' value='$id_banve'>";
        echo "<td style='text-align:center'>"."<h3>Ngày công chiếu: ".$row["ngaycongchieu"]."</h3>"."<h3>Số vé còn lại: ".$row["sove"]."</h3>"."</h3>"."<h3>Giờ công chiếu: ".$row["giocongchieu"]."</h3>"."<a href='thongtinmuave.php?id_banve=".$row['id_banve']."'>Đặt vé ngay</a>"."</td>";
        echo "</tr>";
        echo "</table>";
      }
    }
  ?>
  </form>
</div>
 
<div id="footer">
  <h4>Lịch chiếu phim có thể thay đổi mà không báo trước</h4>
    <h4>Thời gian bắt đầu chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</h4>
</div>
 
</body>
</html>