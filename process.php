<?php
$id = $_POST['id'];
$qty = $_POST['qty'];

// lấy thông tin sản phẩm
$item = get_product_by_id($id);

if(isset($_SESSION['cart'])){
    // cập nhật số lượng
    $_SESSION['cart']['buy']["$id"]['qty'] = $qty;

    // cập nhật tổng tiền
    $sub_total = $qty * $item['price'];
    $_SESSION['cart']['buy']["$id"]['sub_total'] = $sub_total;

    // cập nhật toàn bộ giỏ hàng
    update_info_cart();

    // lấy tổng giá trị trong giỏ hàng
    $total = get_total_cart();

    //gias trị trả về
    $data = [
        'sub_total' => currency_format($sub_total),
        'total' => currency_format($total),
    ];

    echo json_encode($data);
}
?>

<script>
    $(document).ready(function (){
    $(".quantity").change(function(){
        // lấy dữ liệu
        var id = $(this).attr('data-id');
        var qty = $(this).val();

        // để dữ liệu dạng json
        var data = {id:id,qty:qty};

        // ajax xử lí
        $.ajax({
            url: 'process.php', //Trang xử lí , mặc đinhj trang hiện tại
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data){
                $("#sub-total-"+id).text(data.sub_total);
                $("#total-price span").text(data.total);
            },

            // hàm kiểm tra lỗi nếu có
            error: function(xhr,ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});
</script>