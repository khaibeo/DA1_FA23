<?php
    if(is_array($account)){
        extract($account);
    }
?>
<div class="content">
    <style>
        img{
            width: 100px;
            height: 70px;
        }
    </style>
    <form action="index.php?act=update_account" method="post" enctype="multipart/form-data">
        <table>
             <tr>
            <tr>
                <td><label for="">User_name</label></td>
                <td><input type="text" name="user_name" placeholder="User_name" value="<?=$username?>"></td>
            </tr>
            <tr>
                <td><label for="">Fullname</label></td>
                <td><input type="text" name="fullname" placeholder="Full_name" value="<?=$fullname?>"></td>
            </tr>
            <tr>
                <td><label for="">Tel</label></td>
                <td><input type="text" name="tel" placeholder="Tel" value="<?=$tel?>"></td>
            </tr>
            <tr>
                <td><label for="">Address</label></td>
                <td><input type="text" name="address" placeholder="Address" value="<?=$address?>"></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="email" name="email" placeholder="Email" value="<?=$email?>"></td>
            </tr>
            <tr>
                <td><label for="">Avatar</label></td>
                <td><img src="../admin/image/upload/<?=$avatar?>" alt=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="avatar" id="avatar" value="<?=$avatar?>"></td>
            </tr>
            <tr>
                <td><label for="">Role</label></td>
                <td><input type="text" name="role" id="" value="<?=$role?>"></td>
                
                <td>
               </td>
            </tr>     
            <tr>
                <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                <td><input type="submit" name="btn_update" value="Update"></td>
                <td><input type="submit" name="reset" value="Reset"></td>
            </tr>
        </table>    
   
    </form>
</div>