<?php
    if(is_array( $category)){
        extract( $category);
    }
?>
<div class="content_update" >
    <h1>EDIT CATEGORY</h1>
    <br>
    <form action="index.php?act=update_category" method="post">
        <table >
            <tr>
                <td><label for="">ID Category</label></td>
                <td><input type="text" name="category_id" placeholder="ID Category" value="<?php if(isset($category_id) && ($category_id!="")) echo $category_id?>" ></td>
            </tr>
            <tr>
                <td><label for="">Name Category</label></td>
                <td><input type="text" name="category_name" placeholder="Name Category" value="<?php if(isset($category_name) && ($category_name!="")) echo $category_name?>" ></td>
            </tr>
            <tr>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
       
        <input type="hidden" name="id_category" value="<?php if(isset($category_id) && ($category_id>0)) echo $category_id?>">
        <input type="submit" value="Update" name="btn_update"> | <input type="reset" value="Retype"> | <a href="index.php?act=list_category"><input type="button" value="List-Category"></a>
       
       
    </form>
</div>
<?php 
if (isset($warring)) {
    echo "".$warring."";
}
?>