<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/cart.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id =  intval($_POST['id']);
    $qty = intval($_POST['qty']);
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
        $user_cart = get_user_cart($user_id);

        $price = get_product_price($id);

        $total_price = $price * $qty;

        update_total($user_cart,$id,$total_price,$qty);

        $cart_info = get_cart($user_cart);
        $total = get_total_cart($user_cart);
    }
    
    $sub_total = number_format($total_price, 0, ',', '.') . ' đ';
    $total = number_format($total['tongtien'], 0, ',', '.') . ' đ';

    $data = "$sub_total, $total";

    echo $data;
}

