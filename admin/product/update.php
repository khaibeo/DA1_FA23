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
                <td><label for="">Category</label></td>
                <td><select name="category" id="">
                        <?php
                        foreach($list_category as $ct){
                            extract($ct);
                        ?>
                            <option value="<?php echo $category_id?>"<?php echo "selected"?>><?php echo $category_name?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Product_name</label></td>
                <td><input type="text" name="product_name" placeholder="Product_name" value="<?php echo $product_name?>"></td>
            </tr>
            <tr>
                <td><label for="">Product_price</label></td>
                <td><input type="text" name="product_price" placeholder="Product_price" value="<?php echo $product_price?>"></td>
            </tr>
            <tr>
                <td><label for="">discounted_price</label></td>
                <td><input type="text" name="discounted_price" placeholder="discounted_price" value="<?php echo $discounted_price?>"></td>
            </tr>
            <tr>
                <td><label for="">Product_image</label></td>
                <td><img src="../upload/<?php echo $image_name?>" alt=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="product_image" id="product_image" value="<?php echo $image_name?>"></td>
            </tr>
            <tr>
                <td><label for="">Product_describe</label></td>
                <td><textarea name="product_describe" id="product_describe" cols="50" rows="10" ><?php echo $product_describe?></textarea></td>
            </tr>
            <tr>
                <td><label for="">Product_status</label></td>
                <td><input type="number" name="product_status" id="product_status" max="1" min="0" value="<?php echo $status?>"></td>
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
