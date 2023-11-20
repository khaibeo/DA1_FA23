<div class="content ">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Search Category</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <div class="input-group">
                            <form action="index.php?act=list_category" method="post">
                            <input type="text" class="form-control" name="search_category" placeholder="search category">
                            <button class="btn" type="submit" name="btn_search">
                                <i class="bi bi-search"></i>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                form{
                    display: flex;
                }
                form .form-control{
                    width: 800px;
                }
                .btn {
                    margin-left: -50px;
                }
                .card,.table-responsive{
                    width: 850px;
                }
                .mt-4{
                    align-items: center;
                }
            </style>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex">
                        <div class="d-none d-md-flex">All Category</div>
                        <!-- <div class="d-md-flex gap-4 align-items-center">
                            <form class="mb-3 mb-md-0">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <select class="form-select">
                                            <option>Sort by</option>
                                            <option value="desc">Desc</option>
                                            <option value="asc">Asc</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option> 
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                        <!-- <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown"
                               class="btn btn-primary dropdown-toggle"
                               aria-haspopup="true" aria-expanded="false">Actions</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Action</a>
                                <a href="#" class="dropdown-item">Another action</a>
                                <a href="#" class="dropdown-item">Something else here</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <!-- <th>
                            <input class="form-check-input select-all" type="checkbox"
                                   data-select-all-target="#products" id="defaultCheck1">
                        </th> -->
                        <th>ID</th>
                        <th>Name</th>
                        <th> Actions</th>
                        <!-- <th class="text-end">Actions</th> -->
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                         foreach($list_pro as $ct){
                            extract($ct);
                            $edit_category="index.php?act=edit_category&category_id=".$category_id;
                            $delete_category="index.php?act=delete_category&category_id=".$category_id;
                            ?>
                            <tr>
                                <td>
                                    <a href="#">#<?=$category_id?></a>
                                </td>
                                <td><?=$category_name?></td>
                                <td> <a href="<?=$edit_category?>"><button>EDIT</button></a> | <a href="<?=$delete_category?>"><button>DELETE</button></a>
                            </tr>
                        <?php
                        }
                        ?>
                    <!-- <tr>
                        <td>
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td>
                            <a href="#">#1</a>
                        </td>
                        <td>Headphone</td>
                        <td>02/03/2021</td>
                        <td><button>EDIT</button> | <button>DELETE</button></td>
                    </tr> -->
                    </tbody>
                </table>
            </div>
            <form action="index.php?act=list_category" method="POST">
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li> -->
                    <!-- <li class="page-item"><input type="submit" name="number"  class="page" value="1"></a></li>
                    <li class="page-item"><input type="submit" name="number"  class="page" value="2"></a></li>
                    <li class="page-item"><input type="submit" name="number" class="page" value="3"></a></li> -->
                    <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li> -->
                    <?php
                        for ($i=0; $i < $count; $i++) { 
                    ?>
                        <input type="submit" name="number" class="page"value="<?=$i+1?>">
                    <?php
                        }
                    ?>
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
                </ul>
            </nav>
            </form>
        </div>
    </div>

    </div>