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
    width:17%;
    text-align: center;
    float:left;
    padding:5px;
    }
    #nav a{
    color: #58257b;
    font-size: 25px;
    text-decoration: none;
    }
    #nav a:hover {
    background-color: #db7093;
    color: white;
    }
    #section iframe{
    width:80%;
    float:left;
    padding:10px;
    min-height: 500px;
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
    <a href="quanlyphim.php" target="loadpage">Quản lý phim</a><br>
    <a href="quanlyve.php" target="loadpage">Quản lý vé</a><br>
    <a href="quanlythanhvien.php" target="loadpage">Quản lý thành viên</a><br>
    <a href="login.php">Đăng xuất</a>
</div>
 
<div id="section">
    <iframe name="loadpage" src="quanlyphim.php"></iframe>
</div>
 
<div id="footer">
    <h4>Lịch chiếu phim có thể thay đổi mà không báo trước</h4>
    <h4>Thời gian bắt đầu chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</h4>
</div>
 
</body>
</html>
