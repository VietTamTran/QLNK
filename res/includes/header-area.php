<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <?php switch ($_SESSION['quyenhan']) {
                    case '2':
                        $per = 'Quản trị viên';
                        break;
                    case '1':
                        $per = 'Nhân viên';
                        break;
                    
                    default:
                        $per = 'Nhân viên thống kê';
                        break;
                } ?>
                <form action="#">
                    <input type="text" name="search" placeholder="<?php echo 'Xin chào, '.$per.' !'; ?>" readonly="" style="cursor: auto;">
                    <i class="ti-medall"></i>
                </form>
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
            </ul>
        </div>
    </div>
</div>