<?php
session_start();
include("../model/pdo.php");
include("../admin/model_admin/category.php");
include("../admin/model_admin/product.php");
include("../admin/view/header.php");
include("../admin/model_admin/account.php");
// include("home.php");

$warring=[];
if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch($act){
        //start category//
    case'add_category':
        if(isset($_POST['add_category'])){
            $category_name=$_POST['category_name'];
            if(!empty($category_name)){
            if(is_numeric($category_name)){
                $warring['category']="Trường này chỉ nhận chuỗi";
            }
            if(!empty($warring)){
            }
            else{
                insert_category($category_name);
                $warring="Thêm Thành công";
            }
            }
            else{
                $warring['category']= 'Bạn cần nhập đầy đủ thông';
            }
        };
        include('../admin/category/add.php');
        break;
    case'list_category':
        if(isset($_POST['btn_search'])){
            $keyword=$_POST['search_category'];
        }else{
            $keyword= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_category();
        $list_pro=load_page_category($keyword,$start,$limit);
        $list_category=count_category();
        include '../admin/category/list.php';
        break;
    case 'edit_category':
        if(isset($_GET['category_id'])&&($_GET['category_id']>0)){
            $category=loadone_category($_GET['category_id']);
        }
        include ('../admin/category/update.php');
        break;
    case 'update_category':
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $category_id=$_POST['category_id'];
            $category_name=$_POST['category_name'];
            update_category($category_id,$category_name);
            $warring="Update successful";
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_category();
        $list_pro=load_page_category($keyword='',$start,$limit);
        include "../admin/category/list.php";
        break;
    case'delete_category':
        if(isset($_GET['category_id'])&&($_GET['category_id']>0)){
            delete_category($_GET['category_id']);
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_category();
        $list_pro=load_page_category($keyword='',$start,$limit);
        $list_category=loadall_category();
        include ('../admin/category/list.php');
        break;
        // end category//

        // start product//
    case 'add_product':
        if(isset($_POST['add_product'])){
            $category_id=$_POST['category'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $discounted_price=$_POST['discounted_price'];
            $product_describe=$_POST['product_describe'];
            $product_status=$_POST['product_status'];
            $file_name=$_FILES['product_image']['name'];
            $target_dir="../upload/";
            $target_file=$target_dir . basename($_FILES["product_image"]["name"]);
            move_uploaded_file($_FILES['product_image']['tmp_name'],$target_file);
            if(!empty( $product_name && $product_price && $discounted_price && $product_describe && $product_status && $file_name )){
                if(is_numeric($product_name)){
                    $warring['product_name']="Trường này chỉ nhận  dữ liệu chuỗi";
                }
                if(is_numeric($product_describe)){
                    $warring['product_describe']="Trường này chỉ nhận  dữ liệu chuỗi";
                }
                if(is_numeric($file_name)){
                    $warring['file_name']="Trường này chỉ nhận  dữ liệu chuỗi";
                }
                if(!is_numeric($product_price)){
                    $warring['product_price']="Trường này chỉ nhận  dữ liệu Số";
                }
                if(!is_numeric($discounted_price)){
                    $warring['discounted_price']="Trường này chỉ nhận  dữ liệu Số";
                }
            if(!empty($warring)){
            }
            else{
            insert_product($category_id,$product_name, $product_price, $discounted_price, $product_describe, $product_status);
            $warring['all']="Thêm Thành công";
            }
        }
            else{
                $warring['all']="Bạn cần nhập đầy đủ thông tin";
            }
        }
        $list_category=loadall_category();
        include('../admin/product/add.php');
        break;
    case 'list_product':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_product'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_category'])&&($_POST['filter_category'])){
            $category_id=$_POST['category'];
        }
        else{
            $category_id= 0;
        }
        if(isset($_POST['filter_price'])&&($_POST['filter_price'])){
            $price=$_POST['price_product'];
        }
        else{
            $price= "";
        }

        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_product();
        $list_pro= load_page_product($keyword,$category_id,$price,$start,$limit);
        $list_product=count_product();
        $list_category=loadall_category();
        include '../admin/product/list.php';
        break;
    case'edit_product':
        if(isset($_GET['product_id'])&&($_GET['product_id']> 0)){
            $product=loadone_product($_GET['product_id']);
        }
        $list_category=loadall_category();
        include ('../admin/product/update.php');
        break;
    case'update_product':
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $product_id=$_POST['product_id'];
            // $image_id=$_POST['image_id'];
            $category_id=$_POST['category'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $discounted_price=$_POST['discounted_price'];
            $product_describe=$_POST['product_describe'];
            $product_status=$_POST['product_status'];
            $file_name=$_FILES['product_image']['name'];
            $target_dir="../upload/";
            $target_file=$target_dir . basename($_FILES["product_image"]["name"]);
            move_uploaded_file($_FILES['product_image']['tmp_name'],$target_file);
            update_product($product_id,$category_id,$product_name,$product_price,$discounted_price,$product_describe,$product_status);
            // update_image($image_id,$product_id,$file_name);
            $warring= 'Sửa Thành Công';
        }
        $list_category=loadall_category();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_product();
        $list_pro= load_page_product($keyword="",$category_id="",$price="",$start,$limit);
        include '../admin/product/list.php';
        break;
    case"product_detail":
        if(isset($_GET['product_id'])&&($_GET['product_id']> 0)){
            $load_detail=loadone_product($_GET['product_id']);
            $product_detail=load_product_detai($_GET['product_id']);
        }
        
        include "../admin/product/product_detail.php";
        break;
    case"edit_detail":
            if(isset($_GET['product_detail_id'])&&($_GET['product_detail_id']> 0)){
                $detail_id= load_detail_id($_GET['product_detail_id']);
            }
            include "../admin/product/update_detail.php";
            break;
    case"update_detail":
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $product_id=$_POST['product_id'];
            $product_detail_id=$_POST['product_detail_id'];
            $product_size=$_POST['product_size'];
            $product_quantity=$_POST['product_quantity'];
            update_detail($product_size,$product_quantity,$product_detail_id);
        }
        $load_detail=loadone_product($product_id);
        $product_detail=load_product_detai($product_id);
        include '../admin/product/product_detail.php';
        break;
    case 'delete_product':
        if(isset($_GET['product_id'])&&($_GET['product_id'])){
            delete_product($_GET['product_id']);
        }
        $list_product=loadall_product();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_product();
        $list_pro= load_page_product($keyword="",$category_id="",$price="",$start,$limit);
        include ('../admin/product/list.php');
        break;
    case 'add_account':
        if(isset($_POST['btn_add'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $address=$_POST['address'];
        $file_name=$_FILES['avatar']['name'];
        $target_dir="../upload/";
        $target_file=$target_dir . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES['avatar']['tmp_name'],$target_file);
        $role=$_POST['role'];
        $pattern = '/^(0|\+84|\+841|\+849|\+8498)([2-9]\d{8})$/';
        if(!empty($username&&$password&&$fullname&&$email&&$tel&&$role&&$file_name)){
            if(strlen($username)<6){
                $warring['username']="Tên đăng nhập phải lớn hơn 6 kí tự";
            }
            if(strlen($password)<6){
                $warring['password']="Mật khẩu phải lớn hơn 6 kí tự";
            }
            if(is_numeric($fullname)){
                $warring['fullname']="Trường này chỉ nhận dữ liệu chuỗi";
            }
            if(is_numeric($address)){
                $warring['address']="Trường này chỉ nhận dữ liệu chuỗi";
            }
            if(!preg_match($pattern,$tel)){
                $warring['tel']="Số điện thoại không đúng định dạng";
            }
            if(!preg_match('/^\\S+@\\S+\\.\\S+$/',$email)){
                $errors['email'] = "Không đúng định dạng Email";
            }
            if(is_numeric($role)){
                $warring['role']="Trường này chỉ nhận dữ liệu chuỗi";
            }
            if(!empty($warring)){
            }else{
                insert_account($username,$password,$fullname,$email,$tel,$address,$file_name,$role);
                $warring['all']="Thêm Thành công";
            }
        }
        else{
            $warring['all']="Bạn cần nhập đầy đủ dữ liệu";
        }
    }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword="",$role="",$start,$limit);
        include ('../admin/account/add.php');
        break;
    case 'list_account':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_account'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_account'])&&($_POST['filter_account'])){
            $role=$_POST['account'];
        }
        else{
            $role= '';
        }

        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword,$role,$start,$limit);
        $account=count_account();
        include ('../admin/account/list.php');
        break;
    case'edit_account':
        if(isset($_GET['user_id'])&&($_GET['user_id']> 0)){
            $account=loadone_account($_GET['user_id']);
            $list_account=loadall_account();
        }
        include ('../admin/account/update.php');
        break;
    case'update_account':
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $user_id=$_POST['user_id'];
            $username=$_POST['user_name'];
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $tel=$_POST['tel'];
            $address=$_POST['address'];
            $role=$_POST['role'];
            $file_name=$_FILES['avatar']['name'];
            $folder='./image/upload/';
            move_uploaded_file($_FILES['avatar']['tmp_name'], $folder . $file_name);
            update_account( $username, $fullname, $email,$tel, $address,$role, $file_name,$user_id);
            $warring='Update successful';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword="",$role="",$start,$limit);
        include ('../admin/account/list.php');
        break;
    case'delete_account':
        if(isset($_GET['user_id'])&&($_GET['user_id']>0)){
            delete_account($_GET['user_id']);
        }
        $list_account=loadall_account();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword="",$role="",$start,$limit);
        include ('../admin/account/list.php');
        break;
    default:
    include('../admin/view/home.php');
    break;
    }
}
include("..//admin/view/footer.php");
?>
