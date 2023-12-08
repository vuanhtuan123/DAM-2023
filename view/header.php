<?php 
if(isset($_SESSION['s_user'])&&($_SESSION['s_user']>0)){
    extract($_SESSION['s_user']);
    $html_account = '<a href="index.php?pg=myaccount">'.$username.'</a></a>
    <a href="index.php?pg=dangxuat">Thoát</a>';
}else{
$html_account = '<a href="index.php?pg=dangky">ĐĂNG KÝ</a></a>
<a href="index.php?pg=dangnhap">ĐĂNG NHẬP</a>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe House</title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>

<body>
    <div class="containerfull padd20">
        <div class="container">
            <div class="logo col2"><a href="index.php"><img src="layout/images/logo-bahozone-03-icon-h80.png" height="40" alt=""></a></div>
            <div class="menu col8">
                <div class="col3">
                    <form action="index.php?pg=sanpham" method="post">
                        <div class="tks">
                            <input class="inputs" type="text" name="kyw" placeholder="Tìm Từ khoá Tìm Kiếm">
                            <input class="bttons" type="submit" name="timkiem" value="Go">
                        </div>
                    </form>

                </div>
                <div class="col9">
                    <img src="sp1.webp" alt="">
                    <a href="index.php">TRANG CHỦ</a>
                    <a href="index.php?pg=sanpham">SẢN PHẨM</a>
                    <!-- <a href="index.php?pg=dichvu">DỊCH VỤ</a>
                    <a href="index.php?pg=lienhe">LIÊN HỆ</a> -->
                    <a href="index.php?pg=viewcart">GIỎ HÀNG</a>
                    <a href="index.php?pg=mybill">ĐƠN CỦA TÔI</a>
                    <?=$html_account?>

                </div>

            </div>
        </div>