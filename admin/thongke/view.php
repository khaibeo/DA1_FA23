<div class="col" >
    <h1>Thống kê doanh thu</h1>
    <hr>
    <div class="doanhthu">
            <div class="card h-100" style="width: 50%;">
                <div class="card-body" >
                    <div class="d-flex mb-3" style="display:flex ; justify-content: space-between;">
                        <div class="display-7"><?php if(is_array($all_doanhthu))
                                                {extract($all_doanhthu);}
                                                // var_dump($all_doanhthu);
                                                echo number_format($all_doanhthu['total'],0,'.','.').'<u>đ</u>';
                                                ?>
                        </div>
                        <div class="display-7" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                        </svg>
                            
                        </div>
                    </div>
                    <div class="dropdown ms-auto">
                            <h6 class="mb-3">Tổng Doanh Thu </h6>
                        </div>
                </div>
            </div>
            <div class="card h-100" style="width: 50%;">
                <div class="card-body" >
                    <div class="d-flex mb-3" style="display:flex ; justify-content: space-between;">
                        <div class="display-7"><?php 
                                                // var_dump($month_total);
                                                foreach ( $month_total as $month){
                                                // $month= &$month_total["total_month"];
                                                extract($month);
                                                echo number_format($month['total_month'],0,'.','.').'<u>đ</u>';
                                                }
                                               
                                                ?>
                        </div>
                        <div class="display-7" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="dropdown ms-auto">
                            <h6 class="mb-3">Doanh Thu Tháng Này </h6>
                        </div>
                </div>
            </div>
        </div>
        </div>
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
                    <h4 class="mb-3">Danh Mục</h4>
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
                                                <td><?=number_format($product_price,0,'.','.'),'đ'?></td>
                                                <td class="text-end"><a href="<?=$edit_product?>"><button class="btn btn-primary">Sửa</button></a>
                                                <a href="<?= $show_detail?>"><button class="btn btn-primary">Biến thể</button ></a>
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
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
const data = google.visualization.arrayToDataTable([
  ['Tháng', 'Tiền'],
  [<?php 
    if(is_array($month_total)){
        extract($month_total);
    }
    foreach($month_total as $month_total){
    for($month=1;$month<=12;$month++){
            echo "'".$month."',".$month_total['total_month']."";
    }}
    // for($i=1;$i<=12;$i++){
    //     echo $i;
    // }
  ?>],
//   [1,35],[2,150],[3,45],[4,64],[5,40],[6,68],
//   [7,35],[8,50],[9,30],
//   [10,30],[11,80],[12,100]
]);
// Set Options
const options = {
  title: 'Thống kê doanh thu',
  hAxis: {title: 'Tháng'},
  vAxis: {title: 'Tiền (triệu)'},
  legend: 'none'
};
// Draw
const chart = new google.visualization.LineChart(document.getElementById('myChartone'));
chart.draw(data, options);
}
</script> -->
    
</div>
<style>
    .content{
        width: 100%;
        display: flex;
    }
    .row{
        width: 60%;
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
    .doanhthu{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
</style>