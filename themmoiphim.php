<!DOCTYPE html> 
<html> 
<head> 
    <title>Thêm phim</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div id="content"> 
        <form method="POST" enctype="multipart/form-data"> 
            <table>
                <tbody>
                    <tr>
                        <td><h5>Tên phim: </h5></td>
                        <td><input type="text" name="ten_phim"></td>
                    </tr>
                    <tr>
                        <td><h5>Đạo diễn phim: </h5></td>
                        <td><input type="text" name="daodien_phim"></td>
                    </tr>
                    <tr>
                        <td><h5>Năm sản xuất phim: </h5></td>
                        <td><input type="text" name="namsx_phim"></td>
                    </tr>
                    <tr>
                        <td><h5>Nước sản xuất: </h5></td>
                        <td><input type="text" name="nuocsx_phim"></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><h5>Ghi chú: </h5></td>
                        <td><textarea name="ghichu" style="width: 300px; height: 300px"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="size" value="1000000"> 
                        <input type="file" name="image"></td>
                        <td><button type="submit" name="xacnhan">Xác nhận</button></td>
                    </tr>
                </tbody>
            </table>
        </form> 
    </div> 
</body> 
</html>
<?php
include "config.php";
    if (isset($_POST['xacnhan'])) {
        $ten_phim = $_POST["ten_phim"];
        $daodien_phim = $_POST["daodien_phim"];
        $namsx_phim = $_POST["namsx_phim"];
        $nuocsx_phim = $_POST["nuocsx_phim"];
        $ghichu = $_POST["ghichu"];
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
                }
        if($file_size > 4097152) {
            $errors[]='Kích thước file không được lớn hơn 4MB';
                }
            $image = $_FILES['image']['name'];
            $target = "img/".basename($image);
            $sql = "INSERT INTO phimcongchieu (id_phim, ten_phim, daodien_phim, namsx_phim, nuocsx_phim, ghichu, image) VALUES ('','$ten_phim','$daodien_phim', '$namsx_phim', '$nuocsx_phim', '$ghichu', '$image')";
            mysqli_query($connect, $sql);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo '<script language="javascript">alert("Đã upload thành công!");</script>';
            }
        else{
            echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
        }
    }
?>
