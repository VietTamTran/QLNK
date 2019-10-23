<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Huyện Ứng Hòa - Danh sách nhân khẩu</title>
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
                            <h4 class="page-title pull-left">Quản lý nhân khẩu</h4>
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
                				<div class="data-tables">
                					<table id="dataTable" class="text-center table-hover">
                						<thead class="bg-light text-capitalize">
                							<tr>
                								<th></th>
                                                <th>Số CMND</th>
                                                <th>Họ và tên</th>
                                                <th>Giới tính</th>
                                                <th>Ngày sinh</th>
                                                <th>Mã hộ khẩu</th>
                                                <th>QH với chủ hộ</th>
                                                <th>Thao tác</th>
                							</tr>
                						</thead>
                						<tbody>
                                            <?php if ($data_table != NULL) { $i = 0;
                                                foreach ($data_table as $key => $value) { $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value['socmnd']; ?></td>
                                                <td><?php echo $value['hvt']; ?></td>
                                                <td>
                                                    <?php 
                                                        if ($value['gt'] == 0) {
                                                            echo "Nữ";
                                                        }
                                                        else if ($value['gt'] == 1) {
                                                            echo "Nam";
                                                        }
                                                        else{
                                                            echo "Không xác định";
                                                        }

                                                    ?>
                                                </td>
                                                <td><?php echo $value['ns']; ?></td>
                                                <td><?php echo $value['mahk']; ?></td>
                                                <td><?php echo $value['qhvchuho']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/xemnhankhau/').$value['socmnd']; ?>" class="btn btn-primary" style="padding: .375rem .75rem;"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo base_url('admin/suanhankhau/').$value['socmnd']; ?>" class="btn btn-success" style="padding: .375rem .75rem;"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $value['socmnd']; ?>" style="padding: .375rem .75rem;"><i class="fa fa-trash"></i></button>
                                                    <div class="modal fade" id="<?php echo $value['socmnd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="" method="post">
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <b>Lưu ý! </b>Việc xóa này sẽ không được hoàn tác.<br>Có thể chọn <a href="">tạm trú/tạm vắng?</a>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="socmnd-<?php echo $value['socmnd']; ?>">Mã nhân khẩu</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="socmnd-<?php echo $value['socmnd']; ?>" name="socmnd" value="<?php echo $value['socmnd']; ?>" readonly="">
                                                                    </div>
                                                                    <br>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="lydo-<?php echo $value['socmnd']; ?>">Lý do</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" aria-describedby="lydo-<?php echo $value['socmnd']; ?>" name="lydo">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng lại</button>
                                                                    <button name="delete" value="submit" type="submit" class="btn btn-primary">Xác nhận xóa</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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
</body>

</html>
