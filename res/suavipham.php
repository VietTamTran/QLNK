<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Huyện Ứng Hòa - Sửa thông tin vi phạm</title>
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
                            <h4 class="page-title pull-left">Sửa thông tin tội danh</b></u></h4>
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
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <!-- <div class="alert alert-warning" role="alert"><strong>LƯU Ý! </strong>Để thay đổi chủ hộ, vui lòng nhập đúng thông tin số CMND và tên chủ hộ.</div> -->
                                <div class="noti">
                                    <p style="color: red;">
                                        <?php if (isset($_SESSION['error'])) {
                                            echo $_SESSION['error'];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <?php if ($data != NULL) {
                                    foreach ($data as $key => $value) {
                                ?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="mavp" class="col-form-label">Mã tội danh</label>
                                                <input class="form-control" type="text" name="mavp" value="<?php echo $value['mavp']; ?>" id="mavp" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="doituong" class="col-form-label">Đối tượng</label>
                                                <input class="form-control" type="text" name="" value="<?php echo $value['socmnd'].' - '.$value['hvt']; ?>" id="doituong" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="toidanh" class="col-form-label">Tên tội danh</label>
                                                <input class="form-control" type="text" name="toidanh" value="<?php echo $value['toidanh']; ?>" id="toidanh">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="hinhphat" class="col-form-label">Hình phạt</label>
                                                <input class="form-control" type="text" name="hinhphat" value="<?php echo $value['hinhphat']; ?>" id="hinhphat">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="dvlap" class="col-form-label">Đơn vị lập</label>
                                                <input class="form-control" type="text" name="dvlap" value="<?php echo $value['dvlap']; ?>" id="dvlap">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="ngay" class="col-form-label">Ngày thêm</label>
                                                <input class="form-control" type="date" name="ngay" value="<?php echo $value['ngay']; ?>" id="ngay">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-rounded btn-info" name="edit" value="submit" type="submit">Xác nhận sửa</button>
                                </form>
                                <?php }} else{ echo "Không tìm thấy dữ liệu!"; } ?>
                            </div>
                        </div>
                    </div>
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
    <!-- others plugins -->
    <script src="<?php echo base_url('res/') ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/scripts.js"></script>
</body>

</html>
