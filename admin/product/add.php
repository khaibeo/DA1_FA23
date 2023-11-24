<div class="content">
    <form action="index.php?act=add_product" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td><label for="">Danh Mục</label></td>
                <td><select name="category" id="">
                        <?php
                        foreach($list_category as $ct){
                            extract($ct);
                            echo' <option value='.$category_id.'>'.$category_name.'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Tên sản phẩm</label></td>
                <td><input type="text" name="product_name" placeholder="Tên sản phẩm" value="<?php if(isset($product_name)){echo $product_name ;}?>"><p><?php if(isset($warring['product_name'])){echo $warring['product_name'];}?></p></td></td>
            </tr>
            <tr>
                <td><label for="">Giá Gốc</label></td>
                <td><input type="text" name="product_price" placeholder="Giá Gốc"value="<?php if(isset($product_price)){echo $product_price ;}?>"><p><?php if(isset($warring['product_price'])){echo $warring['product_price'];}?></p></td>
            </tr>
            <tr>
                <td><label for="">Giá Khuyến Mãi</label></td>
                <td><input type="text" name="discounted_price" placeholder="Giá Khuyến Mãi"value="<?php if(isset($discounted_price)){echo $discounted_price ;}?>"><p><?php if(isset($warring['discounted_price'])){echo $warring['discounted_price'];}?></p></td>
            </tr>
            <tr>
                <td><label for="">Ảnh</label></td>
                <td><input type="file" name="product_image"  value="<?php if(isset($file_name)){echo $file_name ;}?>"><p><?php if(isset($warring['file_name'])){echo $warring['file_name'];}?></p></td>
            </tr>
            <tr>
                <td><label for="">Mô Tả</label></td>
                <td><textarea name="product_describe"  cols="30" rows="10" ><?php if(isset($product_describe)){echo $product_describe ;}?></textarea><p><?php if(isset($warring['product_describe'])){echo $warring['product_describe'];}?></p></td>
            </tr>
            <tr>
                <td><label for="">Trạng Thái</label></td>
                <td><input type="number" name="product_status"  max="1" min="0"value="<?php if(isset($product_status)){echo $product_status ;}?>"><p><?php if(isset($warring['product_status'])){echo $warring['product_status'];}?></p></td>
            </tr>
            <tr>
                <td><input type="submit" name="add_product" value="Thêm"></td>
                <td><a href="index.php?act=list_product">Danh Sách Sản Phẩm</a></td>
            </tr>
        </table>    
   
    </form>
    <div class="warring" style="color:red;">
    <?php 
        if(isset($warring['all'])){
            echo ''.$warring['all'].'';
        }
        ?>
    </div>
</div>
