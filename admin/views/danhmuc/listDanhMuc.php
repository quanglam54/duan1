<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>
<?php include './views/layout/sidebar.php' ?>

<div class="content-wrapper">
    <div class="card">
        
        <div class="card-header">
            <h1>Quản lý danh mục</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">  
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <a href="<?= BASE_URL_ADMIN. '?act=form-them-danh-muc'?>"><button class="btn btn-success">Thêm mới</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead class="thead-dark">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listDanhMuc as $key=>$danhMuc) { ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $danhMuc['ten_danh_muc']?></td>
                                    <td><?= $danhMuc['mo_ta']?></td>
                                    <td>
                                        <a href="<?=BASE_URL_ADMIN.'?act=form-sua-danh-muc&id_danh_muc='.$danhMuc['id']?>"><button class="btn btn-warning">Sửa</button></a>
                                        <a href="<?=BASE_URL_ADMIN.'?act=xoa-danh-muc&id_danh_muc='.$danhMuc['id']?>"><button class="btn btn-danger" onclick=" return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
                                    </td>
                                </tr>
                                <?php }?>
                             
                             
                        </table>
                    </div>
                </div>
         
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<?php include './views/layout/footer.php' ?>
<script src="./asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
$(function() {
    $("#example1").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        paging: true,
        searching: true 
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
<style>
.dataTables_wrapper .dataTables_filter {
    float: right; /* Đặt ô tìm kiếm ở bên phải */
}

</style>
</body>

</html>