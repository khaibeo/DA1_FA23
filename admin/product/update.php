<?php
if(is_array($product)){
    extract($product);
    }
    $product_image=load_image($product_id);
    extract($product_image);
?>
<h1>THÔNG TIN SẢN PHẨM</h1>
<div class="content">
    <form action="index.php?act=update_product" method="post" enctype="multipart/form-data">
        <div class="update">
            <div class="information">
                <img src="../upload/<?php echo $image_name?>" alt=""> <br>
                <input class="form-control" type="file" name="product_image" id="product_image" value="<?php echo $image_name?>">
                <h5>Mô Tả</h5>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="product_describe" id="product_describe" style="height: 230px" ><?php echo $product_describe?></textarea>
                </div>
            </div>
            <div class="information">
                <h5>ID Sản Phẩm</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_id"  value="<?=$product_id?>" readonly>

                <h5>Danh Mục</h5> 
                <select class="form-select" aria-label="Default select example" name="category">
                <?php
                        foreach($list_category as $ct){
                        ?>
                            <option <?php if($ct['category_id'] == $category_id) echo "selected"; ?> value="<?php echo $ct['category_id']?>"><?php echo $ct['category_name']?></option>
                        <?php
                        }
                        ?>
                </select>  <br>
                <h5>Tên Sản Phẩm</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_name"  value="<?=$product_name?>">

                <h5>Giá Gốc</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_price"  value="<?=$product_price?>">
                
                <h5>Giá Khuyến Mãi</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="discounted_price"  value="<?=$discounted_price?>">
                
                <h5>Trạng Thái</h5>
                <select class="form-select" aria-label="Default select example" name="product_status">
                        <option value="0" <?php if($status == 0) echo "selected" ?>>Ẩn</option>
                        <option value="1" <?php if($status == 1) echo "selected" ?>>Hoạt động</option>
                </select>  <br>

                <h5>Ngày Đăng</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="date_add"  value="<?=$date_add?>" readonly>
            </div>
        </div>
       

                <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                <input type="hidden" name="imgae_id" value="<?php echo $image_id?>">
                <td><input type="submit" class="btn btn-primary" name="btn_update" value="Lưu thay đổi"></td>
                <td><a href="index.php?act=list_product"><button class="btn btn-primary">Danh Sách Sản Phẩm</button></a></td>
    </form>
</div>
<style>
.content{
    width: 100%;
}
.update{
    display:flex;
    width: 100%;
}
.information{
    width: 45%;
    margin: 10px;
}
.information img{
    margin-top: 10px;
    width: 390px;
    height: 270px;
    border-radius:10px;
}
    </style>