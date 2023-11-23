<?php
$add_detail="index.php?act=product_detail&product_id=".$_GET['product_id'];
?>
<div class="content">
    <form action="index.php?act=add_detail" method="post">
        <table>
            <tr>
                <td><label for="">Size</label></td>
                <td><input type="text" name="product_size"></td>
            </tr>
            <tr>
                <td><label for="">Số Lượng</label></td>
                <td><input type="text" name="product_quantity"></td>
            </tr>
            <tr>
                <input type="hidden" name="product_id" value="<?=$_GET['product_id']?>">
                <td><input type="submit" name ="add_detail" value="Thêm"></td>
                <td><a href="<?=$add_detail?>">Danh Sách Size-Số lượng</a></a></td>
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