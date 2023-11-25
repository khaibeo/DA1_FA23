
<div class="content ">
<div class="col">
            <h5 class="mb">Filter Account</h5>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Keywords</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        
                        <style>
                                   .keyword{
                                    background-color:#ff6e40 ;
                                    color: #fff;
                                    border: 1px solid #ff6e40;
                                    width: 70px;
                                    height: 50px;
                                    border-radius: 5px;
                                }
                        </style>
                        <form action="index.php?act=list_account" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="username" name="search_account">
                            <input type="submit" name="keyword" value="search" class="keyword">
                            <!-- <button class="btn btn-outline-light" type="sumbit" name="keyword">
                                <i class="bi bi-search"></i>
                            </button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#categoriesCollapseExample" role="button">
                        <div>Categories</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="categoriesCollapseExample">
                        <div class="d-flex flex-column gap-3">
                        <form action="index.php?act=list_account" method="post">
                                         <input class="forminput" type="radio" name="account" value="Admin">
                                         <label class="formlabel" for="accountCheck1">Admin</label> <br>
                                         <input class="forminput" type="radio" name="account" value="Customer">
                                         <label class="formlabel" for="accountCheck1">Customer</label> <br>
                                        <input type="submit" name="filter_account" class="search" value="Lọc">
                                </form>
                            </div>
                            <style>
                                .search{
                                    margin-top:20px ;
                                    background-color:#ff6e40 ;
                                    color: #fff;
                                    border: 1px solid #ff6e40;
                                    border-radius: 20px;
                                    width: 100px;
                                    height: 40px;
                                    
                                }
                                .col{
                                    width: 100%;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col">
            
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">All Accounts</div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom " id="products">
                    <thead>
                    <tr>
                        <!-- <th>
                            <input class="form-check-input select-all" type="checkbox"
                                   data-select-all-target="#products" id="defaultCheck1">
                        </th> -->
                        <th>ID</th>
                        <th>Photo</th>
                        <th>User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tel</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($list_account as $user){
                        extract($user);
                        $edit_user="index.php?act=edit_account&user_id=".$user_id;
                        $delete_user="index.php?act=delete_account&user_id=".$user_id;
                        $image="../upload/".$avatar;
                        ?>
                        <tr>
                        <td>
                            <a href="#">#<?=$user_id?></a>
                        </td>
                        <td>
                            <a href="#">
                                <img src="<?=$image?>" class="rounded" width="40" alt="">
                            </a>
                        </td>
                        <td><?=$username?></td>
                        <td>
                            <span class="text-success"><?=$fullname?></span>
                        </td>
                        <td><?=$email?></td>
                        <td><?=$role?></td>
                        <td><?=$tel?></td>
                        <td class="text-end"><a href="<?=$edit_user?>"><button>EDIT</button></a> | <a href="<?=$delete_user?>"><button>DELETE</button></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                <form action="index.php?act=list_account" method="post">
                    <?php 
                    for($i= 0;$i<$count;$i++){
                    ?>
                    <input type="submit" name="number" class="page" value="<?=$i+1?>">
                    <?php
                    }?>

                </form>
                </ul>
            </nav>
            <style>
                        .page{
                            width: 30px;
                            height: 30px;
                            margin: 5px;
                            color:#ff6e40 ;
                            border:solid 1px #ff6e40 ;
                            background-color: #fff;
                            border-radius: 10px;
                        }
                        .page:hover{
                            background-color:#ff6e40;
                            color: #fff;
                        }
                    </style>
        </div>
        
    </div>

    </div>