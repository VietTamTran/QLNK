<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('res/') ?>assets/images/icon/logo6.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <?php if($_SESSION['quyenhan'] == 2){ // ADMIN ?>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="<?php echo base_url('admin'); ?>"><i class="ti-dashboard"></i> <span>Trang tổng quan</span></a></li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Quản lý hộ khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/hokhau'); ?>">Tất cả hộ khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themhokhau'); ?>">Thêm hộ khẩu mới</a></li>
                            <li><a href="<?php echo base_url('admin/nhatkyhokhau'); ?>">Nhật ký hộ khẩu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-id-badge"></i><span>Quản lý nhân khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/nhankhau'); ?>">Tất cả nhân khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themnhankhau'); ?>">Thêm nhân khẩu mới</a></li>
                            <li><a href="<?php echo base_url('admin/nhatkynhankhau'); ?>">Nhật ký nhân khẩu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-time"></i><span>Quản lý tạm trú</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/tamtru'); ?>">Danh sách tạm trú</a></li>
                            <li><a href="<?php echo base_url('admin/themtamtru'); ?>">Thêm tạm trú mới</a></li>
                            <li><a href="<?php echo base_url('admin/nhatkytamtru'); ?>">Nhật ký tạm trú</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-share"></i><span>Quản lý tạm vắng</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/tamvang'); ?>">Danh sách tạm vắng</a></li>
                            <li><a href="<?php echo base_url('admin/themtamvang'); ?>">Thêm tạm vắng mới</a></li>
                            <li><a href="<?php echo base_url('admin/nhatkytamvang'); ?>">Nhật ký tạm vắng</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-media-overlay"></i><span>Quản lý chuyển khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/chuyenkhau'); ?>">Danh sách chuyển khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themchuyenkhau'); ?>">Thêm chuyển khẩu mới</a></li>
                            <li><a href="<?php echo base_url('admin/nhatkychuyenkhau'); ?>">Nhật ký chuyển khẩu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-support"></i><span>Quản lý tách khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/tachkhau'); ?>">Danh sách tách khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themtachkhau'); ?>">Thêm tách khẩu mới</a></li>
                            <li><a href="<?php echo base_url('admin/nhatkytachkhau'); ?>">Nhật ký tách khẩu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark-alt"></i><span>Quản lý vi phạm</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/vipham'); ?>">Danh sách vi phạm</a></li>
                            <li><a href="<?php echo base_url('admin/themvipham'); ?>">Thêm vi phạm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Quản lý nhân viên</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/nhanvien'); ?>">Danh sách nhân viên</a></li>
                            <li><a href="<?php echo base_url('admin/themnhanvien'); ?>">Thêm nhân viên mới</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('admin/qldd'); ?>"><i class="ti-location-pin"></i> <span>Quản lý địa điểm</span></a></li>
                    <li><a href="<?php echo base_url('admin/thongke'); ?>"><i class="ti-location-pin"></i> <span>Báo cáo thống kê</span></a></li>
                    <li><a href="<?php echo base_url('admin/thongtincanhan'); ?>"><i class="ti-info-alt"></i> <span>Thông tin cá nhân</span></a></li>
                    <li><a onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" href="<?php echo base_url('auth/logout'); ?>"><i class="ti-power-off"></i> <span>Đăng xuất hệ thống</span></a></li>
                </ul>
                <?php } ?>
                <?php if($_SESSION['quyenhan'] == 1){ // NHÂN VIÊN ?>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="<?php echo base_url('admin'); ?>"><i class="ti-dashboard"></i> <span>Trang tổng quan</span></a></li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Quản lý hộ khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/hokhau'); ?>">Tất cả hộ khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themhokhau'); ?>">Thêm hộ khẩu mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-id-badge"></i><span>Quản lý nhân khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/nhankhau'); ?>">Tất cả nhân khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themnhankhau'); ?>">Thêm nhân khẩu mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-time"></i><span>Quản lý tạm trú</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/tamtru'); ?>">Danh sách tạm trú</a></li>
                            <li><a href="<?php echo base_url('admin/themtamtru'); ?>">Thêm tạm trú mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-share"></i><span>Quản lý tạm vắng</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/tamvang'); ?>">Danh sách tạm vắng</a></li>
                            <li><a href="<?php echo base_url('admin/themtamvang'); ?>">Thêm tạm vắng mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-media-overlay"></i><span>Quản lý chuyển khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/chuyenkhau'); ?>">Danh sách chuyển khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themchuyenkhau'); ?>">Thêm chuyển khẩu mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-support"></i><span>Quản lý tách khẩu</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/tachkhau'); ?>">Danh sách tách khẩu</a></li>
                            <li><a href="<?php echo base_url('admin/themtachkhau'); ?>">Thêm tách khẩu mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark-alt"></i><span>Quản lý vi phạm</span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('admin/vipham'); ?>">Danh sách vi phạm</a></li>
                            <li><a href="<?php echo base_url('admin/themvipham'); ?>">Thêm vi phạm mới</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('admin/thongtincanhan'); ?>"><i class="ti-info-alt"></i> <span>Thông tin cá nhân</span></a></li>
                    <li><a onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" href="<?php echo base_url('auth/logout'); ?>"><i class="ti-power-off"></i> <span>Đăng xuất hệ thống</span></a></li>
                </ul>
                <?php } ?>
                <?php if($_SESSION['quyenhan'] == 0){ // NHÂN VIÊN THỐNG KÊ ?>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="<?php echo base_url('admin'); ?>"><i class="ti-dashboard"></i> <span>Trang tổng quan</span></a></li>
                    <li><a href="<?php echo base_url('admin/thongke'); ?>"><i class="ti-location-pin"></i> <span>Báo cáo thống kê</span></a></li>
                    <li><a href="<?php echo base_url('admin/thongtincanhan'); ?>"><i class="ti-info-alt"></i> <span>Thông tin cá nhân</span></a></li>
                    <li><a onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" href="<?php echo base_url('auth/logout'); ?>"><i class="ti-power-off"></i> <span>Đăng xuất hệ thống</span></a></li>
                </ul>
                <?php } ?>
            </nav>
        </div>
    </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    
</div>
<div class="col s1x`2 m6 l6">
    
</div>
<div class="row">
    <div class="col-md-6">
        
    </div>
    <div class="col-md-6"></div>
</div>