
<div class="content">
    <h1>ADD CATEGORY</h1>
    <form action="index.php?act=add_category" method="post" >
        <label for="">Name Category</label>
        <input type="text" name="category_name" >
        <input type="submit" name="add_category" value="ADD">
    </form>
    <div class="warring" style="color:red;">
    <?php 
    if(isset($warring) && $warring!= ""){
        echo"".$warring."";
    }
    ?>
    </div>
</div>