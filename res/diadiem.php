<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Huyện Ứng Hòa - Danh sách địa điểm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('res/') ?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url('res/') ?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo base_url('res/') ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include 'includes/sidebar-menu.php'; ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include 'includes/header-area.php' ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Quản lý địa bàn</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="<?php echo base_url('res/') ?>assets/images/author/avatar.png" alt="avatar">
                            <a href="<?php echo base_url('auth/logout') ?>"><h4 class="user-name"><?php echo $_SESSION['hvt']; ?> <i class="fa fa-sign-out"></i></h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                	<!-- data table start -->
                	<div class="col-12 mt-5">
                		<div class="card">
                			<div class="card-body">
                                <div class="noti">
                                    <p style="color: red;">
                                        <?php if (isset($_SESSION['error'])) {
                                            echo $_SESSION['error'];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="input-group">
                                      <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Bạn cần hướng dẫn?</button>

                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hướng dẫn nhập file Excel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            1. Đầu tiên, file của bạn phải là file Excel (.xlsx, .xls). <br>
                                            2. Thứ hai, file của bạn phải đúng định dạng như <strong><a href="<?php echo base_url('res/uploads/file.xlsx') ?>">file của chúng tôi</a></strong> cho sẵn. <br>
                                            3. Tiếp theo, bạn sửa lại file Excel chúng tôi cho sẵn sau đó lưu lại. <br>
                                            4. Cuối cùng, thực hiện chọn file vừa lưu rồi <strong>Nhập File</strong>. <br>
                                            Chú thích: Bạn có thể xóa tất cả cơ sở dữ liệu cũ <a href="<?php echo base_url('admin/xoadiadiem') ?>" onclick="return confirm('LƯU Ý! \n- Bạn có chắc chắn muốn xóa hết dữ liệu địa điểm hiện có?')">Tại đây</a>!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="userfile" aria-describedby="userfile" name="userfile" accept=".xlsx, .xls">
                                        <label class="custom-file-label" for="userfile">Nhập dữ liệu địa điểm bằng file Excel</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="userfile" name="importfile" value="submit">Nhập File</button>
                                    </div>
                                </div>
                                </form>
                                <br>
                				<div class="data-tables">
                					<table id="dataTable" class="text-center table-hover">
                						<thead class="bg-light text-capitalize">
                							<tr>
                								<th></th>
                                                <th>Mã địa điểm</th>
                                                <th>Tên địa điểm</th>
                							</tr>
                						</thead>
                						<tbody>
                                            <?php if ($data_table != NULL) { $i = 0;
                                                foreach ($data_table as $key => $value) { $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value['madd']; ?></td>
                                                <td><?php echo $value['tendd']; ?></td>
                                            </tr>
                                            <?php }} else{ echo "Không tìm thấy dữ liệu!"; } ?>
                                        </tbody>
                					</table>
                				</div>
                			</div>
                		</div>
                	</div>
                	<!-- data table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <?php include 'res/includes/footer.php' ?>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="<?php echo base_url('res/') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url('res/') ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="<?php echo base_url('res/') ?>js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="<?php echo base_url('res/') ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/scripts.js"></script>
    <script>
        $('#userfile').on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
</body>

</html>
