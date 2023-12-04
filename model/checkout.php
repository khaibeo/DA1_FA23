<?php
function get_items_from_cart($cart_id){
    $sql = "SELECT
    MIN(pi.image_name) AS image,
    p.product_id,
    p.product_name,
    pd.product_size,
    pd.product_detail_id,
    cd.product_quantity,
    p.product_price,
    cd.product_quantity * p.product_price AS subtotal
FROM cart_detail cd
JOIN cart ON cart.cart_id = cd.cart_id
JOIN
    products_detail pd ON cd.product_detail_id = pd.product_detail_id
JOIN
    products p ON pd.product_id = p.product_id
JOIN
    products_image pi ON p.product_id = pi.product_id WHERE cart.cart_id = $cart_id 
    GROUP BY cd.cart_detail_id;";

    return pdo_query($sql);
}

function create_order($user_id,$fullname,$email,$tel,$address,$total_pro,$payment,$note,$voucher,$totalBill){
    $sql ="INSERT INTO `order`(user_id,fullname,email,tel,address,total_price_pro,payment_method,note,discounted,total) VALUES ($user_id,'$fullname','$email','$tel','$address',$total_pro,'$payment','$note',$voucher,$totalBill)";
    return pdo_execute($sql);
}

function create_order_detail($order_id,$product_detail_id,$price,$quantity){
    $sql ="INSERT INTO order_detail(order_id,product_detail_id,price,quantity) VALUES ($order_id,$product_detail_id,$price,$quantity)";
    pdo_execute($sql);
}

function update_cart($user_cart){
    $sql = "DELETE FROM cart_detail
    WHERE cart_id = $user_cart;
    ";
    pdo_execute($sql);
}

function update_quantity_pro($id,$qty){
    $sql = "UPDATE products_detail SET product_quantity = product_quantity - $qty WHERE product_detail_id = $id";
    pdo_execute($sql);
}

function check_voucher($code){
    $sql = "SELECT * FROM voucher WHERE code = '$code'";
    return pdo_query_one($sql);
}

function update_voucher($code){
    $sql = "UPDATE voucher SET quantity = quantity - 1 WHERE code = '$code'";
    pdo_execute($sql);
}

function create_bill($order_id,$sotien,$note,$magiaodich,$manganhang){
    $sotien = $sotien / 100;
    $sql = "INSERT INTO bill(order_id,sotien,note,magiaodich,manganhang) VALUES ($order_id,$sotien,'$note',$magiaodich,'$manganhang')";
    pdo_execute($sql);
}

function update_status($id,$status){
    $sql = "UPDATE `order` SET `status` = '$status' WHERE order_id = $id";
    pdo_execute($sql);
}
?>