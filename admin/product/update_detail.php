<?php
if(is_array( $detail_id)){
    extract( $detail_id);}
var_dump($product_detail_id);
?> 
<form action="index.php?act=update_detail" method="post">
    <table>
        <tr>
            <td>product_size</td>
            <td><input type="text" name="product_size" value="<?=$product_size?>"></td>
        </tr>
        <tr>
            <td>product_quantity</td>
            <td><input type="text" name="product_quantity" value="<?=$product_quantity?>"></td>
        </tr>
        <tr>
            <input type="hidden" name="product_detail_id" value="<?=$product_detail_id?>">
            <input type="hidden" name="product_id" value="<?=$product_id?>"></td>
            <td><input type="submit" name="btn_update"value="Update"></td>
        </tr>
            </td>
        </tr>
    </table>
</form>