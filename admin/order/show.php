<?php 
if(is_array($list_order)){
    extract($list_order);
}
?>
<h1>THÔNG TIN ĐƠN HÀNG</h1>
<div class="content">
    <div class="header-1">
        <div class="order">
        <form action="index.php?act=update_order" method="post">
            <label for="">ID Đơn hàng : #<?=$order_id?> </label>
            </div>
            <div class="order">
                <label for="">Trạng thái Đơn hàng : </label>
                    <?php if($status== "processing"){?>
                        <button type="button" class=" btn-success  ">Xác nhận thành công</button>
                        <input type="hidden" name="status" value="<?=$status?>">
                        <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button>
                    <?php } ?>
                    <?php if($status== "canceled"){?>
                        <button type="button" class=" btn-danger ">Đã hủy</button>
                        <input type="hidden" name="status" value="<?=$status?>">
                    <?php } ?>
                    <?php if($status== "shiped"){?>
                        <button type="button" class=" btn-info">Đang giao hàng</button>
                        <input type="hidden" name="status" value="<?=$status?>">
                        <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button>
                    <?php } ?>
                    <?php if($status== "delivered"){?>
                        <button type="button" class=" btn-success">Giao thành công</button>
                        <input type="hidden" name="status" value="<?=$status?>">
                    <?php } ?>
                
                    <?php if($status=="pending"){?>
                    <button type="button" class="btn-primary">Chờ xác nhận</button>
                    <input type="hidden" name="status" value="<?=$status?>">
            </div>
                <div class="order">
                    
                <button type="submit" class=" btn-danger" name="btn_cencel">Hủy Đơn</button>
                <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button>
                    <?php } ?>
                    <input type="hidden" name="order_id" value="<?=$order_id?>">
                </form>
                </div>
    </div>
    <br>
    <hr>
   
    <div class="information">
        <div class="information_item">
            <h5>Thông tin khách hàng</h5>
            <label for="">ID khách hàng : #<?=$user_id?></label> <br>
            <label for="">Họ và tên : <?=$fullname?></label><br>
            <label for="">Email : <?=$email?> </label><br>
            <label for="">Số Điện Thoại : <?=$tel?> </label><br>
            <h6>Địa Chỉ : <?=$address?></h6>
        </div>
        <div class="information_item">
            <label for="">Phương thức thanh toán: <br><?php if($payment_method=="cod"){echo "Trả sau khi nhận hàng";} else{
                $payment_method;
            }?></label> <br>
            <label for="">Ngày đặt : <br> <?=$date_add?></label>
        </div>
    </div>
    <hr>
    <div class="product">
        <?php 
        foreach($list_product as $product){
            extract($product);
        ?>
        <div class="product_detail">
            <div class="product_detail_item">
                <label for="">ID sản Phẩm : #<?=$product['product_id']?></label><br>
                <label for=""> <?=$product['product_name']?></label>
            </div>
            <div class="product_detail_item">
                <label for="">Size : <?=$product_size?></label> -
                <label for="">Số lượng : <?=$quantity?></label>
            </div>
            <div class="product_detail_item">
                <!-- <label for=""><h6>Giá khuyến mãi : <?=$discounted_price?></h6></label>  -->
                <label for="">Giá : <?=number_format($product_price,0,'.','.').'đ'?></label>
            </div>
        </div>
        <?php
        }?>
    </div>
    <hr>
    <div class="total">
        <div class="describe">
            <h6>Mô tả</h6>
            <label for=""><?=$note?></label>
        </div>
        <div class="all">
            <label for="">Tổng tiền: <?=number_format($total_price_pro,0,'.','.').'đ'?></label> <br>
            <label for="">voucher: -<?=number_format($discounted,0,'.','.').'đ'?></label> <br>
            <h5>Thành tiền: <?=number_format($total,0,'.','.').'đ'?></h5>
        </div>
    </div>
</div>
<style>
    .content{
        width: 90%;
        height: 700px;
        /* border: solid 1px black; */
    }
    .header-1{
        width: 100%;
        height:auto;
        display: flex;
        justify-content: space-between;
    }
    .information{
        width: 100%;
        height:auto;
        display: flex;
        justify-content: space-between;
    }
    .product_detail{
        width: 100%;
        display: flex;
        justify-content: space-between;
        border-bottom: solid 1px black;
        margin-top: 10px;
        padding: 10px;
        border-radius: 10px;
        background-color:#fff;
        /* border-radius: 5px; */
    }
    .product_detail_item{
        
        width: 30%;
        height: auto;
    }
    .total{
        display: flex;
        justify-content: space-between;
    }
    .describe{
        width: 50%;
    }
    .all{
        width: 30%;
    }

   
</style>