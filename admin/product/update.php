<?php
if(is_array($product)){
    extract($product);
    }
    $product_image=load_image($product_id);
    extract($product_image);
?>
<div class="content">
    <style>
        img{
            width: 100px;
            height: 70px;
        }
    </style>
    <form action="index.php?act=update_product" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td><label for="">Danh mục</label></td>
                <td><select name="category" id="">
                        <?php
                        foreach($list_category as $ct){
                        ?>
                            <option <?php if($ct['category_id'] == $category_id) echo "selected"; ?> value="<?php echo $ct['category_id']?>"><?php echo $ct['category_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Tên sản phẩm</label></td>
                <td><input type="text" name="product_name" placeholder="Product_name" value="<?php echo $product_name?>"></td>
            </tr>
            <tr>
                <td><label for="">Giá gốc</label></td>
                <td><input type="text" name="product_price" placeholder="Product_price" value="<?php echo $product_price?>"></td>
            </tr>
            <tr>
                <td><label for="">Giá khuyến mãi</label></td>
                <td><input type="text" name="discounted_price" placeholder="discounted_price" value="<?php echo $discounted_price?>"></td>
            </tr>
            <tr>
                <td><label for="">Ảnh</label></td>
                <td><img src="../upload/<?php echo $image_name?>" alt=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="product_image" id="product_image" value="<?php echo $image_name?>"></td>
            </tr>
            <tr>
                <td><label for="">Mô tả</label></td>
                <td><textarea name="product_describe" id="product_describe" cols="50" rows="10" ><?php echo $product_describe?></textarea></td>
            </tr>
            <tr>
                <td><label for="">Trạng thái</label></td>
                <td>
                    <select name="product_status" id="">
                        <option value="0" <?php if($status == 0) echo "selected" ?>>Ẩn</option>
                        <option value="1" <?php if($status == 1) echo "selected" ?>>Hoạt động</option>
                    </select>
                </td>
            </tr>
                        
            <tr>
                <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                <input type="hidden" name="imgae_id" value="<?php echo $image_id?>">
                <td><input type="submit" name="btn_update" value="Update"></td>
                <td><a href="index.php?act=list_product">Danh Sách Sản Phẩm</a></td>
            </tr>
        </table>    
   
    </form>
</div>
