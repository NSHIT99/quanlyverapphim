 <?php
  session_start();
?>
<?php
$tendangnhap_user = $_SESSION["tendangnhap_user"];
include("config.php");
$sql = "select * from user where tendangnhap_user = '$tendangnhap_user'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Thành viên</title>
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
  <a href="phimcongchieu.php">Phim công chiếu</a>
</div>
 
<div id="section">
  <form action="" method="POST">
  <table>
    <tbody>
      <input type="hidden" name="id_user" value="<?php echo  $tendangnhap_user; ?>">
      <tr>
        <td>Tên người dùng</td>
        <td><input type="text" name="ten_user" value="<?php echo $row["ten_user"] ?>"></td>
      </tr>
      <tr>
        <td>Mật khẩu</td>
        <td><input type="text" name="pass_user" value="<?php echo $row["pass_user"] ?>"></td>
      </tr>
      <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="diachi" value="<?php echo $row["diachi"] ?>"></td>
      </tr>
      <tr>
        <td>Số CCCD</td>
        <td><input type="text" name="CCCD" value="<?php echo $row["CCCD"] ?>"></td>
      </tr>
      <tr>
        <td>SĐT</td>
        <td><input type="text" name="SĐT" value="<?php echo $row["SĐT"] ?>"></td>
      </tr>
      <tr>
        <td style="text-align: center" colspan="2"><input type="submit" name="xacnhan" value="Xác nhận thay đổi"></td>
      </tr>
    </tbody>
  </table>
</form>
</div>
 
<div id="footer">
  <h4>Lịch chiếu phim có thể thay đổi mà không báo trước</h4>
    <h4>Thời gian bắt đầu chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</h4>
</div>
 
</body>
</html>

<?php
if (isset($_POST['xacnhan'])){
    $tendangnhap_user = $_POST['tendangnhap_user'];
    $ten_user = $_POST['ten_user'];
    $pass_user = $_POST['pass_user'];
    $diachi = $_POST['diachi'];
    $CCCD = $_POST['CCCD'];
    $SĐT = $_POST['SĐT'];
    include("config.php");

    $sql = "update user set ten_user = '$ten_user', pass_user = '$pass_user', diachi = '$diachi', CCCD = '$CCCD', SĐT = '$SĐT' where tendangnhap_user = '$tendangnhap_user'";
    if(mysqli_query($connect,$sql) == true){
        header("Location: trangchu.php");
    }
    else{
    echo "Sửa du lieu không thành cong";

    }
    mysqli_close($connect);
}
?>