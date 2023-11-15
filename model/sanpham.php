<?php
function get_record($start, $num_per_page, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name 
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id $where 
    GROUP BY sp.product_id LIMIT $start,$num_per_page ";
    $list_record = pdo_query($sql);
    return $list_record;
}

function get_num_pro($iddm = "", $search_info = "")
{
    $where = "";
    if ($search_info != "") {
        $where = "WHERE `product_name` like '%$search_info%'";
    }

    if ($iddm != "") {
        $where = "WHERE `category_id` in ($iddm)";
    }

    $result = pdo_query_one("SELECT count(*) as sl FROM `products` $where");
    return $result['sl'];
}

function get_filter($brand = "", $price = [])
{
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name 
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id WHERE ";

    // Thêm điều kiện về danh mục ( nếu có )
    if (!empty($brand)) {
        $brands = implode("','", explode(",", $brand)); // Chuyển chuỗi thành mảng và nối lại với dấu '
        $sql .= "category_id IN ('$brands') AND ";
    }

    // Thêm điều kiện về giá nếu có
    if (!empty($price)) {
        $priceConditions = [];

        foreach ($price as $value) {
            switch ($value) {
                case 1:
                    $priceConditions[] = "product_price < 1000000";
                    break;
                case 2:
                    $priceConditions[] = "product_price BETWEEN 1000000 AND 2000000";
                    break;
                case 3:
                    $priceConditions[] = "product_price BETWEEN 2000000 AND 3000000";
                    break;
                case 4:
                    $priceConditions[] = "product_price > 3000000";
                    break;
            }
        }

        $sql .= "(" . implode(" OR ", $priceConditions) . ") AND ";
    }

    // Loại bỏ "AND" cuối cùng nếu có
    $sql = rtrim($sql, "AND ");

    $sql = rtrim($sql, "WHERE ");

    $sql .= " GROUP BY sp.product_id ";

    if(!empty($brand) || !empty($price)){
        $sql .= " ORDER BY sp.product_price";
    }
    
    return pdo_query($sql);
}
