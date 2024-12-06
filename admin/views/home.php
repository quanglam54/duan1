<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>
<?php include './views/layout/sidebar.php' ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Thống kê</h1>
        </div><!-- /.col -->
       
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?=$newOrderCount?></h3>

              <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= formatPrice($total)?><sup style="font-size: 20px">VND</sup></h3>

              <p>Doanh thu</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?=$countUser?></h3>

              <p>Người dùng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?=$toltalProduct?></h3>

              <p>Sản phẩm bán ra</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6">
          <div class="card-body ">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listThongKe as $index=>$thongKe) { ?>
                    <tr>
                      <td><?=  $index +1 ?></td>
                      <td><?= $thongKe['ten_danh_muc'] ?></td>
                      <td><?= $thongKe['countSp'] ?></td>
                      <td><?= formatPrice( $thongKe['maxPrice'] )?></td>
                      <td><?= formatPrice($thongKe['minPrice'] )?></td>
                      <td><?= formatPrice($thongKe['avgPrice'] ) ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
  <div class="row justify-content-center">
    <!-- Left col -->
    <section class="col-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs) -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Biểu đồ thống kê</h3>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-12">
              <div id="myChart" style="width: 100%; max-width: 700px; height: 350px;">
                <!-- Chart will be rendered here -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.Left col -->
  </div>
</div>
      </div>

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php' ?>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    // Set Data
    const data = google.visualization.arrayToDataTable([
      ['Danh mục', 'Số lượng sản phẩm'],
      <?php
      $tongDanhMuc = count($listThongKe);
      for ($i = 0; $i < $tongDanhMuc; $i++) {
        $dauPhay = ($i < $tongDanhMuc - 1) ? ',' : '';
      ?>['<?= $listThongKe[$i]['ten_danh_muc'] ?>', <?= $listThongKe[$i]['countSp'] ?>] <?= $dauPhay ?>
      <?php } ?>
    ]);

    // Set Options
    const options = {
      title: 'Thống kê sản phẩm theo danh mục'
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);

  }
</script>

</body>

</html>