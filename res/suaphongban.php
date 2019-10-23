<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Huyện Ứng Hòa - Sửa thông tin phòng ban</title>
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
                            <h4 class="page-title pull-left">Sửa thông tin nhân viên</b></u></h4>
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
                                <?php 
                                    foreach ($data as $key => $value) {
                                ?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="tenpb" class="col-form-label">Tên phòng ban</label>
                                                <input class="form-control" type="text" name="tenpb" value="<?php echo $value['tenpb']; ?>" id="tenpb">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="dc" class="col-form-label">Địa chỉ văn phòng</label>
                                                <input class="form-control" type="text" name="dc" id="dc" value="<?php echo $value['dc'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="sdt" class="col-form-label">Số điện thoại văn phòng</label>
                                                <input class="form-control" type="text" name="sdt" id="sdt" value="<?php echo $value['sdt'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-rounded btn-info" name="edit" value="submit" type="submit">Xác nhận sửa</button>
                                </form>
                                <?php } ?>
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
