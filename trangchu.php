<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Trang chủ</title>
  <meta charset="UTF-8">
  <script type='text/javascript'>
//<![CDATA[
var pictureSrc ="https://1.bp.blogspot.com/-CXx9jt2JMRk/Vq-Lh5fm88I/AAAAAAAASwo/XivooDn_oSY/s1600/hoamai.png"; //the location of the snowflakes
var pictureWidth = 15; //the width of the snowflakes
var pictureHeight = 15; //the height of the snowflakes
var numFlakes = 10; //the number of snowflakes
var downSpeed = 0.01; //the falling speed of snowflakes (portion of screen per 100 ms)
var lrFlakes = 10; //the speed that the snowflakes should swing from side to side


if( typeof( numFlakes ) != 'number' || Math.round( numFlakes ) != numFlakes || numFlakes < 1 ) { numFlakes = 10; }

//draw the snowflakes
for( var x = 0; x < numFlakes; x++ ) {
if( document.layers ) { //releave NS4 bug
document.write('<layer id="snFlkDiv'+x+'"><imgsrc="'+pictureSrc+'" height="'+pictureHeight+'"width="'+pictureWidth+'" alt="*" border="0"></layer>');
} else {
document.write('<div style="position:absolute; z-index:9999;"id="snFlkDiv'+x+'"><img src="'+pictureSrc+'"height="'+pictureHeight+'" width="'+pictureWidth+'" alt="*"border="0"></div>');
}
}

//calculate initial positions (in portions of browser window size)
var xcoords = new Array(), ycoords = new Array(), snFlkTemp;
for( var x = 0; x < numFlakes; x++ ) {
xcoords[x] = ( x + 1 ) / ( numFlakes + 1 );
do { snFlkTemp = Math.round( ( numFlakes - 1 ) * Math.random() );
} while( typeof( ycoords[snFlkTemp] ) == 'number' );
ycoords[snFlkTemp] = x / numFlakes;
}

//now animate
function flakeFall() {
if( !getRefToDivNest('snFlkDiv0') ) { return; }
var scrWidth = 0, scrHeight = 0, scrollHeight = 0, scrollWidth = 0;
//find screen settings for all variations. doing this every time allows for resizing and scrolling
if( typeof( window.innerWidth ) == 'number' ) { scrWidth = window.innerWidth; scrHeight = window.innerHeight; } else {
if( document.documentElement && (document.documentElement.clientWidth ||document.documentElement.clientHeight ) ) {
scrWidth = document.documentElement.clientWidth; scrHeight = document.documentElement.clientHeight; } else {
if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
scrWidth = document.body.clientWidth; scrHeight = document.body.clientHeight; } } }
if( typeof( window.pageYOffset ) == 'number' ) { scrollHeight = pageYOffset; scrollWidth = pageXOffset; } else {
if( document.body && ( document.body.scrollLeft ||document.body.scrollTop ) ) { scrollHeight = document.body.scrollTop;scrollWidth = document.body.scrollLeft; } else {
if(document.documentElement && (document.documentElement.scrollLeft ||document.documentElement.scrollTop ) ) { scrollHeight =document.documentElement.scrollTop; scrollWidth =document.documentElement.scrollLeft; } }
}
//move the snowflakes to their new position
for( var x = 0; x < numFlakes; x++ ) {
if( ycoords[x] * scrHeight > scrHeight - pictureHeight ) { ycoords[x] = 0; }
var divRef = getRefToDivNest('snFlkDiv'+x); if( !divRef ) { return; }
if( divRef.style ) { divRef = divRef.style; } var oPix = document.childNodes ? 'px' : 0;
divRef.top = ( Math.round( ycoords[x] * scrHeight ) + scrollHeight ) + oPix;
divRef.left = ( Math.round( ( ( xcoords[x] * scrWidth ) - (pictureWidth / 2 ) ) + ( ( scrWidth / ( ( numFlakes + 1 ) * 4 ) ) * (Math.sin( lrFlakes * ycoords[x] ) - Math.sin( 3 * lrFlakes * ycoords[x]) ) ) ) + scrollWidth ) + oPix;
ycoords[x] += downSpeed;
}
}

//DHTML handlers
function getRefToDivNest(divName) {
if( document.layers ) { return document.layers[divName]; } //NS4
if( document[divName] ) { return document[divName]; } //NS4 also
if( document.getElementById ) { return document.getElementById(divName); } //DOM (IE5+, NS6+, Mozilla0.9+, Opera)
if( document.all ) { return document.all[divName]; } //Proprietary DOM - IE4
return false;
}

window.setInterval('flakeFall();',100);
//]]>
</script>  
  <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="header">
  <h1>Chào mừng các bạn đến với LOTTE Cinema</h1>
  <p>Hân hạnh được phục vụ quý khách!</p>
</div>
<div class="topnav">
  <a href="muave.php">Mua vé</a>
  <a href="phimcongchieu.php">Phim công chiếu</a>
  <a href="thanhvien.php">Thành viên</a>
  <a href="login.php" style="float:right">Đăng xuất</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Phim đang công chiếu</h2>
      <h5>LotteCinemaVN.com</h5>
      <div class="fakeimg">
        <?php
        include "config.php";
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:1;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; 
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($connect, "SELECT * FROM phimcongchieu ORDER BY id_phim ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($connect, "SELECT * FROM phimcongchieu");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>
       <?php
          while ($row = mysqli_fetch_array($products)) {
       ?>
        <div class="product-img">
          <table>
            <tbody>
              <tr>
                <td><?= '<img src="img/'.$row['image'].'"/>' ?></td>
                <td><?= $row['ghichu'] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2><?= $row['ten_phim'] ?></h2>
        <label><b>Đạo diễn: </b></label><?= $row['daodien_phim'] ?><br>
        <label><b>Năm sản xuất: </b></label><?= $row['namsx_phim'] ?><br>
        <label><b>Nước sản xuất: </b></label><?= $row['nuocsx_phim'] ?>
        <div class="buy-button">
          <a href="muave.php" style="text-decoration: none; color: red; font-size: 20px">&#10145;Mua vé</a>
        </div>
        <?php } ?>
      </div>
      <br>
        <?php include "phantrang.php" ?>
      <p><b>Các bộ phim đang được công chiếu tại rạp mà bạn không thể bỏ lỡ</p>
      <p>Website Facebook chính thức của hệ thống Lotte Cinema tại Việt Nam. Chúng tôi là một trong những hệ thống rạp chiếu phim hiện đại và lớn nhất tại Hàn Quốc & Việt Nam.</b></p>
    </div>
    <div class="card">
      <h2>Tương tác khán giả</h2>
      <h5>LotteCinemaVN.com</h5>
      <div class="fakeimg">
        <?php 
        error_reporting(0);
          include("config.php");
          $sql = "SELECT user.ten_user, cmt.cmt FROM comment as cmt
          inner join user on(cmt.tendangnhap_user = user.tendangnhap_user)";
          $result = mysqli_query($connect,$sql);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<span style='font-size: 20px; '>".$row["ten_user"]."</span>"." đã bình luận: "."&emsp;"."<span>".$row["cmt"]."</span>"."<br>";
            }
          }
        ?>
        <form method="POST">
        <input type="text" name="cmt">
        <button type="submit" name="xacnhan">Bình luận</button>
        </form>
        <?php
          include "config.php";
          if (isset($_POST['xacnhan'])) {
            $cmt = $_POST["cmt"];
            $tendangnhap_user = $_SESSION["tendangnhap_user"];
            $sql = "INSERT INTO comment (id_cmt, tendangnhap_user, cmt) values('', '$tendangnhap_user', '$cmt')";
            if (mysqli_query($connect, $sql)==true) {
                header("refresh: 2");
            }
            else{
              echo "error";
            }
          }
        ?>
      </div>
      <p><b>Không gian rộng, thoáng, khu ngồi chờ mua vé và chờ vào xem phim tách biệt.</p>
      <p>Phòng chiếu phim có kích thước mỗi phòng vừa phải, lối đi và ghế ngồi thoải mái. bố trí ghế và màn hình khá hợp lý nên dù bạn có ngồi ghế đầu tiên hay cuối cùng, ghế bên góc cũng không bị quá lệch khi nhìn màn hình.</p>
      <p>Đặt vé onine không cần thanh toán chỉ cần đến sớm trước 30 phút – 1 tiếng.</b></p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h3>Ưu đãi</h3>
      <div class="banner"><img src="img/banner1.jpg"></div>
      <div class="banner"><img src="img/banner2.jpg"></div>
      <div class="banner"><img src="img/banner3.jpg"></div>
    </div>
    <div class="card">
      <h3>LotteCinema</h3>
      <h5>Website: <a href="http://www.lottecinemavn.com/LCHS/Contents/Movie/Movie-List.aspx">LotteCinemaVN.com</a></h5>
      <h5>FaceBook: <a href="https://www.facebook.com/lottecinema/">facebook.com</a></h5>
    </div>
  </div>
</div>

<div class="footer">
  <h4>Lịch chiếu phim có thể thay đổi mà không báo trước</h4>
  <h4>Thời gian bắt đầu chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</h4>
</div>

</body>
</html>