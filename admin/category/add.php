
<div class="content">
    <h1>ADD CATEGORY</h1>
    <form action="index.php?act=add_category" method="post" >
        <label for="">Name Category</label>
        <input type="text" name="category_name" >
        <input type="submit" name="add_category" value="ADD">
        <a href="index.php?act=list_category">Danh Sách Danh Mục</a>
    </form>
    <div class="warring" style="color:red;">
    <?php 
    if(isset($warring['category'])){
        echo"".$warring['category']."";
    }
    ?>
    </div>
</div>