	
	<main class="bg_gray">
		
        <div class="container margin_30">
            <div class="page_header text-center">
                <!-- <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Đăng nhập/Đăng ký</a></li>
                        <li>Page active</li>
                    </ul>
            </div>
            <h1>Đăng ký</h1> -->
        </div>
        <!-- /page_header -->
                <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <form action="index.php?act=dangky" method="post">
                    <div class="box_account">
                        <h3 class="new_client">Đăng ký</h3> <small class="float-right pt-2">* Bắt buộc nhập</small>
                        <div class="form_container">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_2" placeholder="Email*" required>
                                <span><?php if(!empty($errors['email'])) echo $errors['email'] ?></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username"  placeholder="username*" required>
                                <span><?php if(!empty($errors['username'])) echo $errors['username'] ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password*" required>
                            </div>
                            <hr>
                            
                            </div>
                            <div class="text-center"><input type="submit" value="Register" name="dangky" class="btn_1 full-width"></div>
                            <span><?php if(!empty($mess)) echo $mess ?></span>
                        </div>
                        <!-- /form_container -->
                    </div>
                    </form>
                    <!-- /box_account -->
                </div>
            </div>
            <!-- /row -->
            <div class="row text-center mt-4 mb-5">
                        <p>Bạn đã có tài khoản <a href="index.php?act=dangnhap">Đăng nhập</a></p>
                    </div>
            </div>
            <!-- /container -->
        </main>
        <!--/main-->