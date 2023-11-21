<div class="content">
    <form action="index.php?act=add_product" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td><label for="">Category</label></td>
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
                <td><label for="">Product_name</label></td>
                <td><input type="text" name="product_name" placeholder="Product_name"></td>
            </tr>
            <tr>
                <td><label for="">Product_price</label></td>
                <td><input type="text" name="product_price" placeholder="Product_price"></td>
            </tr>
            <tr>
                <td><label for="">discounted_price</label></td>
                <td><input type="text" name="discounted_price" placeholder="discounted_price"></td>
            </tr>
            <tr>
                <td><label for="">Product_image</label></td>
                <td><input type="file" name="product_image"  ></td>
            </tr>
            <tr>
                <td><label for="">Product_describe</label></td>
                <td><textarea name="product_describe"  cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><label for="">Product_status</label></td>
                <td><input type="number" name="product_status"  max="1" min="0"></td>
            </tr>
            <tr>
                <td><input type="submit" name="add_product" value="ADD"></td>
                <td><input type="submit" name="reset" value="Reset"></td>
            </tr>
        </table>    
   
    </form>
    <div class="warring" style="color:red;">
    <?php 
        if(isset($warring)){
            echo ''.$warring.'';
        }
        ?>
    </div>
</div>
