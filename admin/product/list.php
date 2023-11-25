<?php
    if(is_array($list_category)){
        extract($list_category);
    }
?>
<div class="content ">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">All Products</div>
                        <!-- <div class="d-md-flex gap-4 align-items-center">
                            <form class="mb-3 mb-md-0">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <select class="form-select" name="arrange">
                                            <option>Sort by</option
                                             <option value="desc">Desc</option>
                                            <option value="asc">Asc</option> -->
                                        <!-- </select>
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
                        </div>  -->
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
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Giá</th>
                        <th>Thời gian đăng</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        foreach($list_pro as $pd){
                            extract($pd);
                            $product_image=load_image($product_id);
                            extract($product_image);
                            $edit_product="index.php?act=edit_product&product_id=".$product_id;
                            $delete_product="index.php?act=delete_product&product_id=".$product_id;
                            $show_detail="index.php?act=product_detail&product_id=".$product_id;
                            $image="../upload/".$image_name;    
                            ?>
                                    <tr>
                                        <td>
                                            <a href="#">#<?=$product_id?></a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img src="<?=$image?>" class="rounded" width="40" alt="">
                                            </a>
                                        </td>
                                        <td><?=$product_name;?></td>
                                        <?php if($status==1){?>
                                           <td>
                                           <span class="text-success">Hoạt động</span>
                                           </td>
                                           <?php } ?>
                                        <?php if($status== 0){?>
                                            <td style="color:red;"><span>Ẩn</span></td>
                                        <?php } ?>
                                            <td><?=$product_price?></td>
                                            <td><?=$date_add?></td>
                                            <td class="text-end"><a href="<?=$edit_product?>"><button>Sửa</button></a> | 
                                            <a href="<?=$delete_product?>"><button>Xóa</button></a> | 
                                            <a href="<?= $show_detail?>"><button>Biến thể</button></a>
                                            </td>
                                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
               
                    
                    
                   
                
            </div>
            <form action="index.php?act=list_product" method="post">
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
        <div class="col-md-4">
            <h5 class="mb-4">Filter Products</h5>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Keywords</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <form action="index.php?act=list_product" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="......" name="search_product">
                            <!-- <button class="btn btn-outline-light" name="keyword" type="submit">
                                <i class="bi bi-search"></i>
                            </button> -->
                            <input type="submit" name="keyword" class="keyword" value="Search">
                            <style>
                                   .keyword{
                                    background-color:#ff6e40 ;
                                    color: #fff;
                                    border: 1px solid #ff6e40;
                                    width: 70px;
                                    height: 50px;
                                    border-radius: 20px;
                                }
                            </style>
                            
                        </div>
                        </form>
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
                            <div class="form-check">
                                <form action="index.php?act=list_product" method="post">
                                    <?php 
                                        foreach($list_category as $ct){
                                            extract($ct);
                                    ?>
                                         <input class="forminput" type="radio" name="category" value="<?=$category_id?>">
                                         <label class="formlabel" for="categoryCheck1"><?=$category_name?></label> <br>
                                    <?php
                                        }
                                    ?>
                                        <input type="submit" name="filter_category" class="search" value="Filter">
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
                            </style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#priceCollapseExample" role="button">
                        <div>Price</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="priceCollapseExample">
                        <form action="index.php?act=list_product" method="post">
                        <input type="text" id="price_filter" name="price_product">
                        <input type="submit" name="filter_price" class="search" value="Filter">
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#colorsCollapseExample" role="button">
                        <div>Colors</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="colorsCollapseExample">
                        <div class="color-filter-group d-flex gap-3">
                            <input class="form-check-input" type="checkbox" value="#1fa0c6" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="green" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="#c61faa" aria-label="...">
                            <input class="form-check-input" type="checkbox" value="#1fc662" aria-label="...">
                            <input class="form-check-input" type="checkbox" value="#9dc61f" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="#c67b1f" aria-label="...">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    </div>