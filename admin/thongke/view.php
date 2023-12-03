<div class="content">
    <div class="row mb-3">
    <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <i class="bi bi-basket"></i>
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
                    <h4 class="mb-3">Đơn hàng</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"><?php if(is_array($load_order))
                                                {extract($load_order);}
                                                echo COUNT($load_order);?></div>
                        <!-- <div class="ms-auto" id="total-orders"></div> -->
                    </div>
                    <!-- <div class="text-success">
                        Over last month 1.4% <i class="small bi bi-arrow-up"></i>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <i class="bi bi-credit-card-2-front"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Doanh thu</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"><?= number_format($revenue, 0, ',', '.') . ' đ'?></div>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                <div class="d-flex mb-4">
                <h6 class="card-title mb-0">Đánh giá trung bình</h6>
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
            </div>
        </div>


    </div>
    <div class="row mt-3">
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
                    <h4 class="mb-3">Danh mục sản phẩm</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"><?php if(is_array($load_category))
                                                {extract($load_category);}
                                                echo COUNT($load_category);?>
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
                        <i class="bi bi-person-square"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php?act=list_account" class="dropdown-item">Danh sách</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Khách hàng</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"><?php if(is_array($load_tk))
                                                {extract($load_tk);}
                                                echo COUNT($load_tk);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
        <!-- <div class="canvas" style="width:40%; height:410px;border-radius:10px;margin-left:30px;"><canvas  id="myChart" ></canvas></div> -->


<!-- <div class="view">
    <div class="myChartone" id="myChartone"></div>
</div> -->
<div class="row mt-4">
<div class="col-lg-5 col-md-12">
            <div class="card widget">
                <div class="card-header">
                    <h5 class="card-title">Tổng quan</h5>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-truck text-secondary"></i>
                                </div>
                                <h5 class="my-3">Đang vận chuyển</h5>
                                <div class="text-muted"><?= $shiped ?> đơn</div>
                                <!-- <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-receipt text-warning"></i>
                                </div>
                                <h5 class="my-3">Giao thành công</h5>
                                <div class="text-muted"><?= $delivered ?> đơn</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-bar-chart text-info"></i>
                                </div>
                                <h5 class="my-3">Đơn hủy</h5>
                                <div class="text-muted"><?= $canceled ?> đơn</div>
                                <!-- <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-cursor text-success"></i>
                                </div>
                                <h5 class="my-3">Đang xử lý</h5>
                                <div class="text-muted"><?= $pending ?> đơn</div>
                                <!-- <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 55%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Sản phẩm bán chạy</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Top sản phẩm bán chạy</p>
                    <div class="table-responsive">
                        <table class="table table-custom mb-0" id="recent-products">
                            <thead>    
                            <tr>
                                <th>
                                    Top
                                </th>
                                <th>
                                    ID
                                </th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Doanh thu</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; foreach ($selling_pro as $pro) { $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <?= '#'.$pro['product_id'] ?>
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="../upload/<?= $pro['img_name'] ?>" class="rounded" width="40"
                                             alt="...">
                                    </a>
                                </td>
                                <td><?= $pro['product_name'] ?></td>
                                <td>
                                    <?= $pro['total_sold'] ?>
                                </td>
                                <td><?= number_format($pro['total_revenue'], 0, ',', '.') . ' đ' ?></td>
                            </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    

    /* .col-md-8{
        width: 98%;
    } */
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
        /* background-color: #CCFFFF; */
        width: 68%;
        margin-left: 10px;
        border-radius: 20px;
        padding: 10px;
    }
</style>