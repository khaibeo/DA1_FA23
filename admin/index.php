<?php
session_start();
include("../model/pdo.php");
include("../model/category.php");
include("../model/product.php");
include("../admin/header.php");
include("../model/account.php");
// include("home.php");


if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch($act){
        //start category//
    case'add_category':
        if(isset($_POST['add_category'])){
            $category_name=$_POST['category_name'];
            if(empty($_POST['category_name'])){
                $warring= 'You need to enter complete information';
            }
            else{
            insert_category($category_name);
            $warring="More Successfully";
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
        $limit=2;  
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
        $limit=2;  
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
            $folder="./image/upload/";
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $folder . $file_name);
            if(empty($_POST['category'] && $_POST['product_name'] && $_POST['product_price'] && $_POST['discounted_price'] && $_POST['product_describe'] && $_POST['product_status'] && $_FILES['product_image']['name'] )){
                $warring="You need to enter complete information";
            }else{
            insert_product($category_id,$product_name, $product_price, $discounted_price, $product_describe,  $file_name, $product_status);
            $warring="More Successfully";
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

        $limit=2;  
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
            $category_id=$_POST['category'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $discounted_price=$_POST['discounted_price'];
            $product_describe=$_POST['product_describe'];
            $product_status=$_POST['product_status'];
            $file_name=$_FILES['product_image']['name'];
            $folder="./image/upload/";
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $folder . $file_name);
            update_product($product_id,$category_id,$product_name,$product_price,$discounted_price,$product_describe,$file_name,$product_status);
            $warring= 'Update successful';
        }
        $list_category=loadall_category();
        $limit=2;  
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
        include ('../admin/product/list.php');
        break;
    case 'list_account':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_accunt'];
        }
        else{
            $keyword= '';
        };
        $limit=2;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword,$start,$limit);
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
        $limit=2;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword="",$start,$limit);
        include ('../admin/account/list.php');
        break;
    case'delete_account':
        if(isset($_GET['user_id'])&&($_GET['user_id']>0)){
            delete_account($_GET['user_id']);
        }
        $limit=2;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account();
        $list_account=load_page_account($keyword="",$start,$limit);
        // $list_account=loadall_account();
        break;
    default:
    include('home.php');
    break;
    }
}
include("footer.php");
?>
