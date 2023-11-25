
<div class="content">
    <form action="index.php?act=add_account" method="post"enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="">Tên Đăng Nhập</label></td>
                <td><input type="text" placeholder="Tên Đăng Nhập" name="username" value="<?php if(isset($username)){echo $username ;}?>"><p><?php if(isset($warring['username'])){echo $warring['username'];}?></p></td>
            </tr>
            <tr>
                <td><label for="">Password</label></td>
                <td><input type="text" placeholder="Password" name="password" value="<?php if(isset($password)){echo $password;}?>"><p><?php if(isset($warring['password'])){echo $warring['password'];}?></td>
            </tr>
            <tr>
                <td><label for="">Họ và Tên</label></td>
                <td><input type="text" placeholder="Họ và Tên" name="fullname" value="<?php if(isset($fullname)){echo $fullname ;}?>"><p><?php if(isset($warring['fullname'])){echo $warring['fullname'];}?></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="email" placeholder="Email" name="email" value="<?php if(isset($email)){echo $email ;}?>"><p><?php if(isset($warring['email'])){echo $warring['email'];}?></td>
            </tr>
            <tr>
                <td><label for="">Số Diện Thoại</label></td>
                <td><input type="text" placeholder="Số Diện Thoại" name="tel" value="<?php if(isset($tel)){echo $tel;}?>"><p><?php if(isset($warring['tel'])){echo $warring['tel'];}?></td>
            </tr>
            <tr>
                <td><label for="">Địa Chỉ</label></td>
                <td><input type="text" placeholder="Địa Chỉ" name="address" value="<?php if(isset($address)){echo $address;}?>"><p><?php if(isset($warring['address'])){echo $warring['address'];}?></td>
            </tr>
            <tr>
                <td><label for="">Ảnh</label></td>
                <td><input type="file" name="avatar" value="<?php if(isset($file_name)){echo $file_name;}?>"><p><?php if(isset($warring['avatar'])){echo $warring['avatar'];}?> </td>
            </tr>
            <tr>
                <td><label for="">Role</label></td>
                <td>
                    <select name="role" id="">
                        <option value="admin" selected>Admin</option>
                        <option value="customer">Customer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Thêm" name="btn_add"></td>
                <td><a href="index.php?act=list_account">Danh Sách Tài Khoản</a>
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
