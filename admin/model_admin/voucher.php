<?php
// function loadall_danhgia()
// {
//     $sql="SELECT * FROM `voucher`";
//     $list_voucher=pdo_query($sql);
//     return $list_voucher;
// }

function delete_voucher($voucher_id)
{
    $sql="DELETE FROM voucher WHERE `voucher`.`voucher_id` = '$voucher_id'";
    pdo_execute($sql);
}
function count_voucher()
{
    $sql= "SELECT * FROM voucher  ";
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_page_voucher($keyword,$start,$limit)
{
    $sql= "SELECT * FROM  voucher WHERE 1";
    if($keyword !=""){
        $sql.= " AND `code` LIKE '%$keyword%'";
    }
    $sql.= " order by voucher.voucher_id asc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function insert_voucher($code,$category_code,$value,$date_start,$date_end,$quantity){
    $sql="INSERT INTO `voucher` (`code`,`category_code`,`value`,`date_start`,`date_end`,`quantity`)
    VALUES ('$code','$category_code','$value','$date_start','$date_end','$quantity')";
    pdo_execute($sql);
}
?>