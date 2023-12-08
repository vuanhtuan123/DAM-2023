<?php
session_start();
include "../dao/pdo.php";
include "../dao/binhluan.php";
if(isset($_SESSION['s_user'])){
$iduser = $_SESSION['s_user']['id'];
$hoten = $_SESSION['s_user']['username'];
}
// Ktra idPro có dk truyền qua URL ko
if(isset($_GET['idpro'])){
    $idpro = $_GET['idpro'];
}
if (isset($_POST['guibinhluan'])) {
    $idpro = $_POST['idpro']; //thông tin về sản phẩm mà bình luận được thêm vào.
    $noidung = $_POST['noidung']; //ND của bình luận do người dùng nhập vào.
    date_default_timezone_set('Asia/Bangkok'); //hiết lập múi giờ mặc định cho kịch bản là múi giờ châu Á
    $ngaybl = date('H:i:s d/m/Y'); //gày và giờ bình luận được tạo.
    $iduser=$_SESSION['s_user']['id']; //thông tin người dùng đã được đăng nhập và được lưu trữ trong phiên
    // $hoten=$_SESSION['s_user']['hoten'];
    binhluan_insert($iduser, $idpro, $noidung, $ngaybl,$hoten);
}
$dsbl = binhluan_select_all(); // lấy danh sách tất cả các bình luận từ CSDL
$html_bl = ""; // sẽ được sử dụng để xây dựng nND  HTML của các bình luận để hiển thị trên trang web
foreach ($dsbl as $bl) {
    extract($bl);
    $html_bl .=  '<p class="bl" > <div><img class="avata" src="../layout/images/avata.jpg" alt="">  <div class="name">  '.$hoten.' - ('.$ngaybl.')</div></div>

     <p> '.$noidung.'</p>
    </p> 
    <hr>
    ';
    
}

?>
<link rel="stylesheet" href="../layout/css/style.css">
<h1>Bình Luận</h1>

<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {


?>

    <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="idpro" value="<?=$idpro?>">
        <textarea name="noidung" id="" cols="100" rows="5" required ></textarea> <br>
        <button type="submit" name="guibinhluan">Gửi bình luận</button>
    </form>
<?php
} else {
    $_SESSION['trang'] = "sanphamchitiet"; //Lưu trang hiện tại vào biến  trang.
    $_SESSION['idpro'] = $_GET['idpro']; //Lưu giá trị idpro từ tham số trên URL vào biến phiên idpro.
    echo "<a href='../index.php?pg=dangnhap' target='_parent' >Bạn phải đăng nhập để sử dụng chức năng này</a>";
}
?>
<div class="dsbl">
<?=$html_bl?>

</div>