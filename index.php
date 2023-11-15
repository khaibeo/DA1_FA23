<?php
ob_start();
session_start();
include "model/pdo.php";
include "function.php";
include "model/sanpham.php";
include "model/danhmuc.php";
// include "model/binhluan.php";
include "model/taikhoan.php";

include "global.php";

$danhmuc = loadall_danhmuc();

include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        // Sản phẩm
        case "sanpham":
            // sản phẩm theo danh mục
            if (isset($_GET['search']) && ($_GET['search'] != "")) {
                $search_info = $_GET['search'];
                $dk = " sp.product_name like '%$search_info%' ";
                $dk1 = "&search=$search_info";
            } else {
                $search_info = "";
                $dk = "";
                $dk1 = "";
            }

            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
                $dk = " sp.category_id = $iddm ";
                $dk1 = "&iddm=$iddm";
            } else {
                $iddm = "";
            }

            $num_pro = get_num_pro($iddm,$search_info);
            $total_row = $num_pro;
            $num_per_page = 3;

            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $num_per_page;

            $num_page = ceil($total_row / $num_per_page);

            $pagging = get_pagging($num_page, $page, "index.php?act=sanpham$dk1");
            $listsp = get_record($start, $num_per_page, $dk);
            // $listsp = loadall_sanpham($kyw, $iddm);

            include "view/product/list-products.php";
            break;

            case "filter":
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $brand = $_POST['brandInput'];
                    $price = $_POST['priceInput'];

                    if(!empty($price)){
                        $arrPr = explode(",", $price);
                    }else{
                        $arrPr = [];
                    }
    
                    $listsp = get_filter($brand,$arrPr);
                }else{
                    header("location: index.php?act=sanpham");
                }
               
                include "view/product/list-products.php";
                break;

        // Tài khoản
        case "dangnhap":
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $taikhoan = dangnhap($user, $pass);

                if (is_array($taikhoan)) {
                    $_SESSION['user'] = $user;
                    $_SESSION['role'] = $taikhoan['role'];
                    header("location: index.php");
                } else {
                    $mess = "Thông tin tài khoản hoặc mật khẩu không chính xác";
                }
            }
            include "view/account/login.php";
            break;

        case "dangky":
            if (isset($_POST['dangky']) && $_POST['dangky'] != "") {
                $email = $_POST['email'];
                $name = $_POST['username'];
                $pass = $_POST['password'];

                $errors = [];

                // check email đã tồn tại chưa
                if (check_email($email)) {
                    $errors['email'] = "Email đã tồn tại trên hệ thống";
                }

                // check username đã có hay chưa
                if (check_user($name)) {
                    $errors['username'] = "Username đã tồn tại trên hệ thống";
                }

                if (empty($errors)) {
                    add_taikhoan($email, $name, $pass);
                    $mess = "Đăng ký thành công";
                    include "view/account/login.php";
                    exit();
                }
            }
            include "view/account/register.php";
            break;

            case "dangxuat":
                dangxuat();
                header("location: index.php");
                break;
        case "quenmk":
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];

                $taikhoan = check_email($email);

                if ($taikhoan != false) {
                    sendMail($email, $taikhoan['username'], $taikhoan['password']);

                    $sendMailMess = "Gửi email thành công";
                } else {
                    $sendMailMess = "Email bạn nhập không có trong hệ thống";
                }
            }
            include "view/account/forgotpass.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
