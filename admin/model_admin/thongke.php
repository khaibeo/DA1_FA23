<?php
function category_count()
{
    $sql="SELECT COUNT(product_id) FROM products WHERE product_id > 0";
    $category_count=pdo_query_one($sql);
    return $category_count;
}
function loadall_thongke(){
    $sql = "SELECT CATEGORIES.CATEGORY_ID AS CATEGORY_ID, CATEGORIES.CATEGORY_NAME AS CATEGORY_NAME, COUNT(PRODUCTS.PRODUCT_ID) AS COUNTPRODUCT, MIN(PRODUCTS.PRODUCT_PRICE) AS MINPRICE, MAX(PRODUCTS.PRODUCT_PRICE) AS MAXPRICE, AVG(PRODUCTS.PRODUCT_PRICE) AS AVGPRICE FROM PRODUCTS LEFT JOIN CATEGORIES ON PRODUCTS.CATEGORY_ID = CATEGORIES.CATEGORY_ID GROUP BY CATEGORIES.CATEGORY_ID ORDER BY CATEGORIES.CATEGORY_ID DESC  ";
    $listtk=pdo_query($sql);
    return $listtk;
}

?>