<?php
if ($user['avatar'] != '') {
    $img_path = "upload/{$user['avatar']}";
} else {
    $img_path = "img/avatar.jpg";
}
?>

<div class="col-md-3">
    <div class="d-flex flex-column flex-md-row text-center text-md-start mb-3">
        <figure class="me-4 flex-shrink-0">
            <?php $img = $user['avatar'] ?>
            <img width="100" height="100" class="rounded-pill" src="<?= $img_path ?>" alt="...">
        </figure>
        <div class="flex-fill">
            <h5 class="mb-3"><?= $user['username'] ?></h5>
            <a class="btn btn-primary me-2" href="index.php?act=profile">Sửa thông tin</a>
        </div>
    </div>
    <div class="card sticky-top mb-4 mb-md-0">
        <div class="card-body">
            <ul class="nav nav-pills flex-column gap-2" id="myTab" role="tablist">
                <li class="nav-item mb-1">
                    <a class="nav-link" id="profile-tab" href="index.php?act=profile" aria-controls="profile" aria-selected="true">
                        <i class="bi bi-person me-2"></i> Thông tin tài khoản
                    </a>
                </li>
                <li class="nav-item mb-1" role="presentation">
                    <a class="nav-link" id="password-tab" href="index.php?act=repass" aria-controls="password" aria-selected="false">
                        <i class="bi bi-lock me-2"></i> Đổi mật khẩu
                    </a>
                </li>
                <li class="nav-item mb-1" role="presentation">
                    <a class="nav-link" id="password-tab" href="index.php?act=myorder" aria-controls="password" aria-selected="false">
                        <i class="bi bi-lock me-2"></i> Đơn hàng
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>