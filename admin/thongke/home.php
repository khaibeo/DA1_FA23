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
                                <th>Số điện thoại</th>
                                <th>Ngày</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                                <th class="text-end">Thông tin </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($list_order as $order){
                                        extract($order);
                                    $edit_order="index.php?act=order_detail&order_id=".$order_id;
                                    ?>
                                    <form action="index.php?act=update_order_today" method="post">
                                            <tr>
                                                <td>
                                                    <a href="#">#<?=$order_id?></a>
                                                </td>
                                                <td><?=$fullname?></td>
                                                <td><?=$tel?></td>
                                                <td><?=$created_at?></td>
                                                <?php if($status=="unpaid"){?>
                                                <td><button type="button" class="btn-primary">Chưa thanh toán</button></td>
                                                <input type="hidden" name="status" value="<?= $status ?>">
                                                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                <td><button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button></td>
                                                <?php } ?>
                                                <?php if($status=="pending"){?>
                                                <td><button type="button" class="btn-primary">Chờ xác nhận</button></td>
                                                <input type="hidden" name="status" value="<?= $status ?>">
                                                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                <td><button type="submit" class=" btn-danger" name="btn_cencel">Hủy Đơn</button>
                                                <button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button>
                                                </td>
                                                <?php } ?>
                                                <?php if($status== "processing"){?>
                                                    <td ><button type="button" class=" btn-success ">Đã xác nhận</button></td>
                                                    <input type="hidden" name="status" value="<?= $status ?>">
                                                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                    <td><button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button></td>
                                                <?php } ?>
                                                <?php if($status== "canceled"){?>
                                                    <td ><button type="button" class=" btn-danger ">Đã hủy</button></td>
                                                    <td></td>
                                                <?php } ?>
                                                <?php if($status== "shiped"){?>
                                                    <td ><button type="button" class=" btn-info">Đang giao hàng</button></td>
                                                    <input type="hidden" name="status" value="<?= $status ?>">
                                                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                    <td><button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button></td>
                                                <?php } ?>
                                                <?php if($status== "delivered"){?>
                                                    <td ><button type="button" class=" btn-success">Giao thành công</button></td>
                                                    <td></td>
                                                <?php } ?>
                                                
                                                <td><a href="<?=$edit_order?>" style="text-align:center ; display:block;"  >Chi tiết</a></td>
                                                    <!-- <a style="text-align:center ; display:block;" href="<?=$edit_order?>">Chi tiết  -->
                                            </tr>             
                                <?php
                                }
                                ?>
                                </form>
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