<?php
session_start(); // Khời tạo để sử dụng phiên để lưu giữ dữ liệu qua nhiều trang cho một người dùng.
ob_start(); //sử dụng để đệm dữ liệu đầu ra trong bộ nhớ trước khi gửi đến trình duyệ
if (isset($_SESSION['user']) && ($_SESSION['user']["role"] == 1)) {
    include '../dao/pdo.php';
    include '../dao/sanpham.php';
    include '../dao/donhang.php';
    include '../dao/danhmuc.php';
    include '../dao/user.php';
    include("view/header.php");
    //Kiểm tra xem URL có chứa tham số "pg"
    if (isset($_GET["pg"])) {
        $pg = $_GET["pg"];
        switch ($pg) {
            case "sanphamlist":
                $sanphamlist = get_dssp_new(100);
                include('view/sanphamlist.php');
                break;
            case "updateproduct":
                if (isset($_POST["updateproduct"])) {
                   
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $iddm = $_POST['iddm'];
                    $id = $_POST['id'];
                    $img = $_FILES['image']['name'];
                    if ($img != "") {
                        $target_file = IMG_PATH_ADMIN . $img;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    } else {
                        $img = "";
                    }
                    sanpham_update ($name, $img, $price, $iddm,$id);
                } 
                $sanphamlist = get_dssp_new(100);
                include('view/sanphamlist.php');
                break;
            case "sanphamadd":
                $danhmuclist = danhmuc_all();
                include("view/sanphamadd.php");
                break;
            case "sanphamupdate":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $sp = get_sp__by_id($id);
                }
                $danhmuclist = danhmuc_all();
                include('view/sanphamupdate.php');
                break;
            case "delproduct":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $img = IMG_PATH_ADMIN . get_img($id);
                    if (is_file($img)) {
                        unlink($img);
                    }
                    try {
                        sanpham_delete($id);
                    } catch (\Throwable $th) {
                        echo "<h3 style='color:red;text-align:center;' >Sản phẩm đã có trong giỏ hàng !!! không được phép xoá</h3>";
                    }
                }
                $sanphamlist = get_dssp_new(100);
                include('view/sanphamlist.php');
                break;
            case "addproduct":
                if (isset($_POST['addproduct'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $iddm = $_POST['iddm'];

                    $img = $_FILES['image']['name'];
                    $target_file = IMG_PATH_ADMIN . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    sanpham_insert($name, $img, $price, $iddm);
                    $sanphamlist = get_dssp_new(100);
                    include('view/sanphamlist.php');
                } else {
                    $danhmuclist = danhmuc_all();
                    include("view/sanphamadd.php");
                }
                break;
                case"catalog" :
                    $danhmuc_list = danhmuc_all();
                    include("view/danhmuclist.php");
                break;
                case"danhmucadd" :
                    include("view/danhmucadd.php");
                break;

                case"updatedm":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {    
                        $id = $_GET['id'];
                        $dm = danhmuc_select_by_id($id);
                    }
                    $danhmuc_list = danhmuc_all();
                    include("view/danhmucupdate.php");
                break;

                case"deletedm" :
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                        danhmuc_delete($id);
                    }
                    $danhmuc_list = danhmuc_all();
                    include("view/danhmuclist.php");
                break;
                case"adddanhmuc" :
                    if (isset($_POST['adddm'])) {
                        $id = $_POST['id'];
                        $name = $_POST['namedm'];
                        update_danhmuc($id,$name);
                    }
                    $danhmuc_list = danhmuc_all();
                    include("view/danhmuclist.php");
                break;
                case"users":
                    $user_list = user_all();
                    include("view/userlist.php");
                break;
                case"adminadduser":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {    
                        $id = $_GET['id'];
                        $us = user_select_by_id($id);
                    }
                    $danhmuc_list = danhmuc_all();
                    include("view/adduser.php");
                break;
                case"addrole":
                    if(isset($_POST["addus"])) {
                        $id = $_POST["id"];
                        $role = $_POST['role'];
                        user_update_admin($id,$role);
        
                    }
                    $user_list = user_all();
                    include("view/userlist.php");
                break;
                case "dangxuat":
                    if (isset($_SESSION['user'])) {
                        unset($_SESSION['user']);
                        header('location:login.php');
                    }else{
                        header('location:login.php');
                    }
                    break;
                    case 'bills':
                    $show_dh = donhang_new();
                        include("view/donghanglist.php");
                    break;
                    case"deldh" :
                        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                            $id = $_GET['id'];
                            donhang_delete($id);
                        }
                        $show_dh = donhang_new();
                        include("view/donghanglist.php");
                    break;
            default:
                include("view/home.php");
                break;
        }
    } else {
        include("view/home.php");
    }
    include("view/footer.php");
} else {
    header('location:login.php');
}
