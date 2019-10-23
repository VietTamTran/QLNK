<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Huyện Ứng Hòa - Trang tổng quan</title>
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
                            <h4 class="page-title pull-left">Trang tổng quan</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="<?php echo base_url('res/') ?>assets/images/author/avatar.png" alt="avatar">
                            <a href="<?php echo base_url('auth/logout') ?>" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')"><h4 class="user-name"><?php echo $_SESSION['hvt'] ?> <i class="fa fa-sign-out"></i></h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-menu-alt"></i> Nhân khẩu</div>
                                            <h2><?php echo number_format($data['nhankhau']); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-check-box"></i> Hộ khẩu</div>
                                            <h2><?php echo number_format($data['hokhau']); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-shopping-cart"></i> Chuyển/Tách khẩu</div>
                                            <h2><?php echo number_format($data['cktk']); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-time"></i> Tạm trú/Tạm vắng</div>
                                            <h2><?php echo number_format($data['tttv']); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                    <!-- Social Campain area start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h4 class="header-title">Số liệu mới nhất</h4>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        Nhân khẩu mới
                                        <span class="pull-right small"><em><?php if($dateNews['nhankhau']==0){echo "Hôm nay";} else{ echo $dateNews['nhankhau'].' ngày trước'; } ?></em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Hộ khẩu mới
                                        <span class="pull-right small"><em><?php if($dateNews['hokhau']==0){echo "Hôm nay";} else{ echo $dateNews['hokhau'].' ngày trước'; } ?></em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Chuyển/tách khẩu mới
                                        <span class="pull-right small"><em><?php if($dateNews['cktk']==0){echo "Hôm nay";} else{ echo $dateNews['cktk'].' ngày trước'; } ?></em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Tạm trú/Tạm vắng mới
                                        <span class="pull-right small"><em><?php if($dateNews['tttv']==0){echo "Hôm nay";} else{ echo $dateNews['tttv'].' ngày trước'; } ?></em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Nhân viên mới
                                        <span class="pull-right small"><em><?php if($dateNews['nhanvien']==0){echo "Hôm nay";} else{ echo $dateNews['nhanvien'].' ngày trước'; } ?></em>
                                        </span>
                                    </a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- Social Campain area end -->
                    <!-- Advertising area start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card h-full">
                            <div class="card-body">
                                <h4 class="header-title">Số liệu tổng quát (%)</h4>
                                <canvas id="seolinechart8" height="233"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Advertising area end -->
                    <!-- sales area start -->
                    <div class="col-xl-9 col-ml-8 col-lg-8 mt-5">
                        <div class="card">
                            <div class="card-body bg1">
                                <h4 class="header-title text-white">Chịu trách nhiệm website</h4>
                                <div class="testimonial-carousel owl-carousel">
                                    <div class="tst-item">
                                        <div class="tstu-img">
                                            <img src="<?php echo base_url('res/') ?>assets/images/team/team-author1.jpg" alt="author image">
                                        </div>
                                        <div class="tstu-content">
                                            <h4 class="tstu-name">Lê Hồng An</h4>
                                            <span class="profsn">Trưởng phòng</span>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laborum ut nihil numquam a aliquam alias necessitatibus ipsa soluta quam!</p>
                                        </div>
                                    </div>
                                    <div class="tst-item">
                                        <div class="tstu-img">
                                            <img src="<?php echo base_url('res/') ?>assets/images/team/team-author2.jpg" alt="author image">
                                        </div>
                                        <div class="tstu-content">
                                            <h4 class="tstu-name">Hoàng Thị Loan</h4>
                                            <span class="profsn">Phó phòng</span>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laborum ut nihil numquam a aliquam alias necessitatibus ipsa soluta quam!</p>
                                        </div>
                                    </div>
                                    <div class="tst-item">
                                        <div class="tstu-img">
                                            <img src="<?php echo base_url('res/') ?>assets/images/team/team-author3.jpg" alt="author image">
                                        </div>
                                        <div class="tstu-content">
                                            <h4 class="tstu-name">Nguyễn Lan Anh</h4>
                                            <span class="profsn">Phó phòng</span>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laborum ut nihil numquam a aliquam alias necessitatibus ipsa soluta quam!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sales area end -->
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

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all pie chart -->
    <script src="<?php echo base_url('res/') ?>assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="<?php echo base_url('res/') ?>assets/js/bar-chart.js"></script>
    <!-- others plugins -->
    <script src="<?php echo base_url('res/') ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url('res/') ?>assets/js/scripts.js"></script>
</body>

</html>
