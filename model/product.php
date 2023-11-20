<?php
function loadall_product()
{
 $sql="SELECT * FROM `products` ";
 $list_product=pdo_query($sql);
 return $list_product;
}
function loadone_product($product_id)
{
    $sql= "SELECT * FROM `products` WHERE product_id=$product_id";
    $list_product=pdo_query_one($sql);
    return $list_product;
}
function insert_product($category_id,$product_name, $product_price, $discounted_price, $product_describe,  $file_name, $product_status)
{
    $sql= "INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `discounted_price`, `product_describe`, `product_image`, `category_id`, `status`) VALUES (NULL, '{$product_name}', '{$product_price}', '{$discounted_price}', '{$product_describe}','{$file_name}' , '{$category_id}', '{$product_status}')";
    pdo_execute($sql);
}
function update_product($product_id,$category_id,$product_name,$product_price,$discounted_price,$product_describe,$file_name,$product_status)
{   
    if($file_name !=" "){
        $sql= "UPDATE products SET product_name = '$product_name', product_price = '$product_price',
                discounted_price = '$discounted_price', product_describe = '$product_describe',
                category_id = '$category_id',
                status = '$product_status' WHERE products.product_id = $product_id";
    }else{
    $sql= "UPDATE products SET product_name = '$product_name', product_price = '$product_price',
            discounted_price = '$discounted_price', product_describe = '$product_describe',product_image='$file_name',
            category_id = '$category_id',
            status = '$product_status' WHERE products.product_id = $product_id";
    }
    pdo_execute($sql);
}
function delete_product($product_id)
{
    $sql= "DELETE FROM products WHERE `products`.`product_id` = $product_id";
    pdo_execute($sql);
}
function count_product()
{
    $sql= "SELECT * FROM products";
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/2);
    return $number;
}
function load_page_product($keyword,$category_id,$price,$start,$limit)
{
    $sql= "SELECT * FROM  products WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND product_name LIKE '%$keyword%'";
    }
    if($category_id>0){
        $sql.=" AND category_id ='".$category_id."'";
    }
    if($price!=""){
        $sql.= " AND product_price LIKE'%$price%'";
    }
    $sql.= " order by products.product_id asc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function load_product_detai($product_id)
{
    $sql="SELECT * FROM products_detail WHERE product_id=$product_id ";
    $product_detail=pdo_query($sql);
    return $product_detail;
}
function load_detail_id($product_detail_id){
    $sql="SELECT * FROM products_detail WHERE product_detail_id=$product_detail_id";
    $product_detail_id=pdo_query_one($sql);
    return $product_detail_id;
}
function update_detail($product_size,$product_quantity,$product_detail_id){
    $sql="UPDATE `products_detail` SET `product_quantity` = '$product_quantity', 
    `product_size` = '$product_size' WHERE `products_detail`.`product_detail_id` = $product_detail_id";
    pdo_execute($sql);
}
?>