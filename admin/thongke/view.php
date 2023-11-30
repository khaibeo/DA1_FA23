<div class="content">
    <div class="row">
        <div class="col-lg-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/></svg>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php?act=list_order" class="dropdown-item">Danh Sách Đơn Hàng</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Đơn Hàng</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"> <?php if(is_array($load_order))
                                                {extract($load_order);}
                                                echo COUNT($load_order);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                        <span class="nav-link-icon">
                       <img src="../upload/sport-shoe.png" alt="" style="width:50px ; height: 50px;">
                    </span>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php?act=list_order" class="dropdown-item">Danh Sách Sản Phẩm</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Sản Phẩm</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"><?php if(is_array($load_product))
                                                {extract($load_product);}
                                                echo COUNT($load_product);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                        <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php?act=list_order" class="dropdown-item">Danh Sách Tài Khoản</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Tài Khoản</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"> <?php if(is_array($list_account))
                                                {extract($list_account);}
                                                echo COUNT($list_account);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                        <i class="bi bi-receipt"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php?act=list_order" class="dropdown-item">Danh Sách Danh Mục</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Categoey</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"><?php if(is_array($load_category))
                                                {extract($load_category);}
                                                echo COUNT($load_category);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="canvas" style="width:40%; height:410px;border-radius:10px;margin-left:30px;"><canvas  id="myChart" ></canvas></div>
</div>
<div class="view">
    <div class="myChartone" id="myChartone"></div>
</div>
<div class="product_day">
    <div class="list_view">
            <div class="d-flex mb-4">
                <h6 class="card-title mb-0">Trung Bình Đánh Giá</h6>
                <div class="dropdown ms-auto">
                    <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">Danh Sách Đánh Giá</a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="display-6"><?php if(is_array($list_star))
                                        {extract($list_star);}
                                        $sum=0;
                                        $count=COUNT($list_star);
                                    foreach($list_star as $star){
                                    ?><?php $star['number_stars'] ; 
                                    $sum += $star['number_stars']?>
                                    <?php  } echo $avg= $sum/$count ;?></div>
                <div class="d-flex justify-content-center gap-3 my-3">
                    <?php $floor=floor($avg);
                    for($i=1;$i<=$floor;$i++){
                    echo' <i class="bi bi-star-fill icon-lg text-warning"></i>';
                    }
                    for($j=$floor;$j<5;$j++){
                        echo'<i class="bi bi-star-fill icon-lg text-muted"></i> ';
                    }?>
                    <span>(<?php if(is_array($list_evaluation))
                            {extract($list_evaluation);}
                            echo COUNT($list_evaluation);?>)
                            </span>
                </div>
            </div>
        </div>
    <div class="list_product_day">
        <div class="table-responsive">
            <h5>Sản Phẩm Được Thêm Vào Hôm Nay</h5>
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
                            <th class="text-end">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            foreach($product_day as $product){
                                extract($product);
                                $product_image=load_image($product_id);
                                extract($product_image);
                                $edit_product="index.php?act=edit_product&product_id=".$product_id;
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
                                                <td class="text-end"><a href="<?=$edit_product?>"><button>Sửa</button></a>
                                                <a href="<?= $show_detail?>"><button>Biến thể</button></a>
                                                </td>
                                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                
                        
                        
                    
                    
        </div>
    </div>
</div>
    <!-- <div id="piechart">
        <div> -->
<!-- </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
        <?php
            $all_category=COUNT($load_tk);
            $i=1;
            foreach($load_tk as $tk){
                extract($tk);
                if($i==$all_category){
                    $space="";
                }
                else{
                    $space=",";
                }
                echo "['".$tk['CATEGORY_NAME']."',".$tk['COUNTPRODUCT']."],";
                $i+=1;
            }
        ?>
        ]);

       // Optional; add a title and set the width and height of the chart
            var options = {'title':'THỐNG KÊ SẢN PHẨM THEO DANH MỤC', 'width':1070, 'height':450,is3D:true};

// Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
        </script> -->
        
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   
const data = {
    labels :[ <?php
            $all_category=COUNT($load_tk);
            $i=1;
            foreach($load_tk as $tk){
                extract($tk);
                if($i==$all_category){
                    $space="";
                }
                else{
                    $space=",";
                }
                echo "'".$tk['CATEGORY_NAME']."',";
                $i+=1;
            }
        ?>],
//   labels: [
//     'Red',
//     'Blue',
//     'Yellow'
//   ],
  datasets : [{
    label: 'Số Lượng',
    data: [<?php
            $all_category=COUNT($load_tk);
            $i=1;
            foreach($load_tk as $tk){
                extract($tk);
                if($i==$all_category){
                    $space="";
                }
                else{
                    $space=",";
                }
                echo "'".$tk['COUNTPRODUCT']."',";
                $i+=1;
            }
        ?>],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(0 ,255 ,0)',
      'rgb(139, 101, 8)',
      'rgb(85, 26, 139))',
      'rgb(0,128,128)',
      'rgb((139, 0 ,0)',
      'rgb(25, 25 ,112)',
      'rgb(255 ,240 ,245)',
      'rgb(139, 69 ,19)',
    ],
  }],
  styling: {
    weight: 200,
  }
};
const config = {
  type: 'doughnut',
  data: data,
};
const ctx = document.getElementById('myChart');

  new Chart(ctx,config);

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
const data = google.visualization.arrayToDataTable([
  ['Price', 'Size'],
  [50,7],[60,8],[70,8],[80,9],[90,9],
  [100,9],[110,10],[120,11],
  [130,14],[140,14],[150,15]
]);
// Set Options
const options = {
  title: 'House Prices vs. Size',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};
// Draw
const chart = new google.visualization.LineChart(document.getElementById('myChartone'));
chart.draw(data, options);
}
</script>
    
</div>
<style>
    .content{
        width: 100%;
        display: flex;
    }
    .row{
        width: 60%;
        display: flex;
        flex-wrap: wrap;
    }
    .col-lg-4{
        width: 50%;
        height: 200px;
        margin-bottom: 10px;
    }
    .canvas{
        width: 40%;
        background-color: #fff;
        
    }
    .view{
        width: 100%;
    }
    .myChartone{
        margin-bottom: 20px;
    }
    

    .col-md-8{
        width: 98%;
    }
    /* .view{
        width: 100%;
        display:flex;
        border: solid 1px black;
        flex-wrap: wrap;
        margin-bottom:20px;

    } */
    .piechart{
        width: 100%;
    }
    .view_item{
        width: 25%;
        border-radius:20px;
        text-align: center;
        margin-left: 10px;
        margin-top:5px
        /* color:#fff; */
    }.view_item h3{
        margin-top:5px;
    }
    .product_day{
        width: 100%;
        display: flex;
        margin-bottom: 20px;
    }
    .list_view{
        background-color: #fff;
        padding: 20px;
        width: 30%;
        border-radius: 20px;
    }
    .list_product_day{
        background-color: #CCFFFF;
        width: 68%;
        margin-left: 10px;
        border-radius: 20px;
        padding: 10px;
    }
</style>