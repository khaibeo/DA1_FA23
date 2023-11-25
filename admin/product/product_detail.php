<?php
if(is_array($load_detail)){
    extract($load_detail);
}
$product_image=load_image($product_id);
extract($product_image);
$image="../upload/".$image_name;
// $edit_detail="index.php?act=edit_detail&product_id=".$product_id;
?>
<style>
    img{
        width: 300px;
        height: 210px;
    }
    table tr {
        margin: 20px;
    }
</style>
<div class="content">
    <table>
        <tr>
            <td><label for="">ID sản phẩm</label></td>
            <td><input type="text" name="product_id" value="<?=$product_id?>" readonly></td>
        </tr>
        <tr>
            <td><label for="">Ảnh</label></td>
            <td><img src="<?=$image?>" class="rounded" width="40" alt=""></td>
        </tr>
         <?php 
            foreach($product_detail as $detail){
                extract($detail);
                $edit_detail="index.php?act=edit_detail&product_detail_id=".$product_detail_id;
        ?> 
        <tr>
            <td><label for=""> Size :</label></td>
            <td><?=$product_size?></td>
            <td><label for=""> Số lượng :   </label></td>
            <td><?=$product_quantity?></td>
            <input type="hidden" name="product_id" value="<?=$product_detail_id?>">
            <td><a href="<?=$edit_detail?>"><button>Sửa</button></a></td>
        <?php }
        ?>  
        <tr>
            <td>
                <a class="btn btn-success" href="index.php?act=list_product">Danh sách sản phẩm</a>
            </td>
            <td>
                <a class="btn btn-danger" href="index.php?act=add_detail&id=<?= $product_id ?>">Thêm biến thể</a>
            </td>
        </tr>
    </form>
</div>