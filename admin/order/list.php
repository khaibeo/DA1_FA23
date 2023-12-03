
<div class="col-1">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Tìm Kiếm</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <form action="index.php?act=list_order" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="số điện thoại" name="search_order">
                            <!-- <button class="btn btn-outline-light" name="keyword" type="submit">
                                <i class="bi bi-search"></i>
                            </button> -->
                            <input type="submit" name="keyword" class="keyword" value="Search">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div>
        <div class="filter">
            <div class="price">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            aria-expanded="true" data-bs-target="#priceCollapseExample" role="button">
                        <div>Price</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                        <div class="collapse show mt-4" id="priceCollapseExample">
                            <form action="index.php?act=list_product" method="post">
                                <input type="text" id="price_filter" name="price_product"  class="form-control">
                                <input type="submit" name="filter_price" class="search" value="Lọc">
                            </form>
                        </div>
                </div>
            </div>
            </div>
            <div class="category">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#categoriesCollapseExample" role="button">
                        <div>Danh Mục</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="categoriesCollapseExample">
                        <div class="d-flex flex-column gap-3">
                            <div class="form-check">
                                <form action="index.php?act=list_product" method="post">
                                    <select name="category" id="" class="form-control">
                                    <?php 
                                        foreach($list_category as $ct){
                                            extract($ct);
                                    ?>
                                        <option value="<?=$category_id?>"<?php echo 'selected'?>><?=$category_name?></option>
                                         
                                    <?php
                                        }
                                    ?>
                                    </select>
                                        <input type="submit" name="filter_category" class="search" value="Lọc">
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
        </div>
             -->
</div>          
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">Danh sách đơn hàng</div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <!-- <th>
                            <input class="form-check-input select-all" type="checkbox"
                                   data-select-all-target="#products" id="defaultCheck1">
                        </th> -->
                        <th>ID</th>
                        <th>Người mua</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền</th>
                        <th>Ngày</th>
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
                                        <td><?=$tel?></td>
                                        <td><?=$total?></td>
                                        <td><?=$date_add?></td>
                                        <?php if($status=="pending"){?>
                                           <td><button type="button" class="btn-primary">Chờ xác nhận</button></td>
                                           <?php } ?>
                                        <?php if($status== " processing"){?>
                                            <td ><button type="button" class=" btn-success ">Xác nhận thành công</button></td>
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
            <form action="index.php?act=list_order" method="post">
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                        for ($i=0; $i < $count; $i++) { 
                    ?>
                        <input type="submit" name="number" class="page" value="<?=$i+1?>">
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            </form>
        </div>

        </div>
    </div>
</div>
<style>
    .col{
        margin-top: -20px;
    }
    .col-1{
        width: 99%;
        
    }
    .keyword{
        background-color:#ff6e40 ;
        color: #fff;
        border: 1px solid #ff6e40;
        width: 70px;
        height: 50px;
        border-radius: 5px;
    }
    .search{
        margin-left: -40px;
        background-color:#ff6e40 ;
        color: #fff;
        border: 1px solid #ff6e40;
        border-radius: 10px;
        width: 100px;
        height: 50px;
    }
    .page{
        width: 30px;
        height: 30px;
        margin: 5px;
        color:#ff6e40 ;
        border:solid 1px #ff6e40 ;
        background-color: #fff;
        border-radius: 10px;
    }
    .page:hover{
        background-color:#ff6e40;
        color: #fff;
    }
    .filter{
        width: 100%;
        display: flex;
    }
    .filter .price{
        width: 50%;
        align-items: start;
    }
    .filter .category{
        width: 50%;
        align-items: end;
    }
    form {
       display: flex;
    }
    button{
        background-color: #ff6e40;
        color:#fff;
        border: solid 1px #ff6e40;
        border-radius: 5px;
    }
</style>