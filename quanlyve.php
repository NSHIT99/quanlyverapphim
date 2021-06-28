<h1>Thông tin mua vé</h1>
<?php 
    include("config.php");
    $query="SELECT pcc.ten_phim, pcc.daodien_phim, bv.sove, bv.ngaycongchieu, bv.giocongchieu, mv.sovemua, mv.tendangnhap_user from banve as bv
    INNER JOIN phimcongchieu as pcc on bv.id_phim=pcc.id_phim
    INNER JOIN muave as mv on bv.id_banve=mv.id_banve";
    $result = mysqli_query($connect, $query);
    echo "<table border=2>";
    echo "<tr>";
    echo "<td>Tên phim</td>";
    echo "<td>Đạo diễn phim</td>";
    echo "<td>Số vé còn lại</td>";
    echo "<td>Ngày công chiếu</td>";
    echo "<td>Giờ công chiếu</td>";
    echo "<td>Thành viên mua vé</td>";
    echo "<td>Số vé mua</td>";
    echo "</tr>";
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row["ten_phim"]."</td>";
    echo "<td>".$row["daodien_phim"]."</td>";
    echo "<td>".$row["sove"]."</td>";
    echo "<td>".$row["ngaycongchieu"]."</td>";
    echo "<td>".$row["giocongchieu"]."</td>";
    echo "<td>".$row["tendangnhap_user"]."</td>";
    echo "<td>".$row["sovemua"]."</td>";
    echo "</tr>";
        }
        
    echo "</table>";
    }
?>
