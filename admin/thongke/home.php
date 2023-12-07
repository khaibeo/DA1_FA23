<div class="order_day">
        <div class="content ">
            <div class="col">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex gap-4 align-items-center">
                                    <div class="d-none d-md-flex"> <H3>Đơn hàng ngày hôm nay</H3> </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom table-lg mb-0" id="products">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Người mua </th>
                                <th>Tổng tiền</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th class="text-end">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($list_order as $order){
                                        extract($order);
                                    
                                    $edit_order="index.php?act=order_detail&order_id=".$order_id;
                                    ?>
                                            <tr>
                                                <td>
                                                    <a href="#">#<?=$order_id?></a>
                                                </td>
                                                <td><?=$fullname?></td>
                                                <td><?=number_format($total, 0, ',', '.') . ' đ'?></td>
                                                <td><?=$created_at?></td>
                                                <?php if($status=="unpaid"){?>
                                                <td><button type="button" class="btn-primary">Chưa thanh toán</button></td>
                                                <?php } ?>
                                                <?php if($status=="pending"){?>
                                                <td><button type="button" class="btn-primary">Chờ xác nhận</button></td>
                                                <?php } ?>
                                                <?php if($status== "processing"){?>
                                                    <td ><button type="button" class=" btn-success ">Đã xác nhận</button></td>
                                                <?php } ?>
                                                <?php if($status== "canceled"){?>
                                                    <td ><button type="button" class=" btn-danger ">Đã hủy</button></td>
                                                <?php } ?>
                                                <?php if($status== "shiped"){?>
                                                    <td ><button type="button" class=" btn-info">Đang giao hàng</button></td>
                                                <?php } ?>
                                                <?php if($status== "delivered"){?>
                                                    <td ><button type="button" class=" btn-success">Giao thành công</button></td>
                                                <?php } ?>
                                                <td><a href="<?=$edit_order?>" style="text-align:center ; display:block;"  >Chi tiết</a></td>
                                                    <!-- <a style="text-align:center ; display:block;" href="<?=$edit_order?>">Chi tiết  -->
                                            </tr>             
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <nav class="mt-4" aria-label="Page navigation example">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .col-md-8{
        width: 98%;
        height: auto;
        border: solid 1px #DDDDDD;
        border-radius:30px ;
        padding: 20px;
    }
    .card-body{
        width: 100%;
    }
</style>