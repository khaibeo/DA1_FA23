<?php
function loadall_danhgia()
{
    $sql="SELECT * FROM `evaluation`
    INNER JOIN `products` ON `products`.`product_id`=`evaluation`.`product_id`
    INNER JOIN `user` ON `user`.`user_id`=`evaluation`.`user_id`";
    $list_evaluation=pdo_query($sql);
    return $list_evaluation;
}

function delete_evaluation($evaluation_id)
{
    $sql="DELETE FROM evaluation WHERE `evaluation`.`evaluation_id` = '$evaluation_id'";
    pdo_execute($sql);
}
function load_star()
{
    $sql="SELECT * FROM `evaluation` ";
    $list_star=pdo_query($sql);
    return $list_star;
}
function count_evaluation()
{
    $sql= "SELECT * FROM evaluation  ";
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_page_evaluation($keyword,$start,$limit)
{
    $sql= "SELECT * FROM  evaluation 
    INNER JOIN `products` ON `products`.`product_id`=`evaluation`.`product_id`
    INNER JOIN `user` ON `user`.`user_id`=`evaluation`.`user_id`
     ";
    if($keyword!=""){
        $sql.= " AND product_name LIKE '%$keyword%'";
    }
    $sql.= " order by `evaluation`.`evaluation_id` asc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
?>