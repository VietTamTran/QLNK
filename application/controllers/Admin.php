<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));	
		$this->load->library("session");
		if ($this->session->has_userdata('manv') == false) {
			redirect(base_url('auth/login'));
		}
		$this->load->model('M_Admin');
		$this->load->view('V_Admin');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
	}
	public function index()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data = $model->get_number_dash();
		$dateNews = $model->dateNews();
		$view->index($data, $dateNews);
	}
	public function hokhau()
	{

		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('delete') == 'submit') {
			$delete_data['mahk'] = $this->input->post('mahk');
			$mot_hokhau = $model->mot_hokhau($delete_data['mahk']);
			foreach ($mot_hokhau as $key => $value){
				$delete_data = $value;
			}
			$delete_data['lydo'] = $this->input->post('lydo');
			$delete_data['type'] = 'Xóa';
			$delete_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
			$delete_data['ngay_th'] = date("Y-m-d H:i:s");
			$nhankhau = $model->get_nhankhau($delete_data['mahk']);
			foreach ($nhankhau as $key => $value){
				$model->delete_nhankhau($value['socmnd']);
			}
			$model->delete_hokhau($delete_data['mahk']);
			$model->insert_log_hokhau($delete_data);
            $this->session->set_flashdata('error', '- Xóa hộ khẩu thành công!');
		}
		$data_table = $model->hokhau();
		$view->hokhau($data_table);
	}
	public function suahokhau($mahk)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$mahk = $this->input->post('mahk');
			$socmnd = $this->input->post('socmnd');
			$tench = $this->input->post('tench');
			$dc = $this->input->post('dc');
			$check = $model->check_cmnd($socmnd, $tench);
			if ($check == 1) {
				// Check có thay đổi chủ hộ hay không
				$check2 = $model->show_once_hk($mahk);
				foreach ($check2 as $key => $value){
					$chuhocu = $value['tench'];

					$insert_log['mahk'] = $value['mahk'];
					$insert_log['tench'] = $value['tench'];
					$insert_log['dc'] = $value['dc'];
					$insert_log['ngay_tao_hk'] = $value['ngay_tao_hk'];
				}

				$insert_log['lydo'] = $this->input->post('lydo');
				$insert_log['type'] = 'Sửa';
				$insert_log['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
				$insert_log['ngay_th'] = date("Y-m-d H:i:s");
				$model->insert_log_hokhau($insert_log);

				if ($chuhocu != $tench) {
					$qhcu = $this->input->post('qhcu');
					$model->update_chuhocu($mahk, $qhcu);
					$model->update_chuhomoi($mahk, $tench, $dc);
					$model->update_nhankhau($mahk, $socmnd, $tench);
				}
				else{
					$model->update_chuhomoi($mahk, $tench, $dc);
				}
				
                $this->session->set_flashdata('error', '- Thanh đổi thông tin hộ khẩu thành công!');
			}
			else{
                $this->session->set_flashdata('error', '- Số cmnd và tên chủ hộ không hợp lệ!');
			}
		}
		$data = $model->show_once_hk($mahk);
		$view->suahokhau($data, $mahk);
	}
	public function themhokhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$detrong = $this->input->post('detrong');
			if ($detrong == 'false') {
				$add_data['socmnd'] = $this->input->post('socmnd');
				$add_data['tench'] = $this->input->post('tench');
				$add_data['mahk'] = $this->input->post('mahk');
				$add_data['dc'] = $this->input->post('dc');
				$add_data['ngay_tao_hk'] = date('Y-m-d');

				$check_mahk = $model->check_mahk($add_data['mahk']);
				if ($check_mahk == 1) {
					$this->session->set_flashdata('error', '- Mã hộ khẩu vừa nhập đã bị trùng!');
				} else {
					$check = $model->check_cmnd($add_data['socmnd'], $add_data['tench']);
					if ($check == 1) {
						$model->them_ho_khau($add_data);
						$model->thay_chu_ho($add_data);
						$add_data['lydo'] = 'Thêm mới hộ khẩu có chủ hộ';
						$add_data['type'] = 'Thêm';
						$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
						$add_data['ngay_th'] = date("Y-m-d H:i:s");
						$model->insert_log_hokhau($add_data);
						$this->session->set_flashdata('error', '- Thêm hộ khẩu mới thành công!');
					}
					else{
						$this->session->set_flashdata('error', '- Số cmnd và tên chủ hộ không hợp lệ!');
					}
				}
			}
			else{
				$add_data['mahk'] = $this->input->post('mahk');
				$add_data['dc'] = $this->input->post('dc');
				$add_data['ngay_tao_hk'] = date('Y-m-d');

				$check_mahk = $model->check_mahk($add_data['mahk']);
				if ($check_mahk == 1) {
					$this->session->set_flashdata('error', '- Mã hộ khẩu vừa nhập đã bị trùng!');
				} else {
					$model->them_ho_khau($add_data);
					$add_data['lydo'] = 'Thêm mới hộ khẩu chưa có chủ hộ';
					$add_data['type'] = 'Thêm';
					$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
					$add_data['ngay_th'] = date("Y-m-d H:i:s");
					$model->insert_log_hokhau($add_data);

					$this->session->set_flashdata('error', '- Thêm hộ khẩu mới thành công! Vui lòng chọn 1 <strong>chủ hộ</strong> mới!');
				}
			}
			
		}
		$view->themhokhau();
	}
	public function xemhokhau($mahk)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->xemhokhau($mahk);
		$view->xemhokhau($mahk, $data_table);
	}
	public function nhatkyhokhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhatkyhokhau();
		$view->nhatkyhokhau($data_table);
	}
	public function nhankhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('delete') == 'submit') {
			$delete_data['socmnd'] = $this->input->post('socmnd');
			$mot_nhankhau = $model->mot_nhankhau($delete_data['socmnd']);
			foreach ($mot_nhankhau as $key => $value){
				$delete_data = $value;
			}
			$delete_data['lydo'] = $this->input->post('lydo');
			$delete_data['type'] = 'Xóa';
			$delete_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
			$delete_data['ngay_th'] = date("Y-m-d H:i:s");
			$model->insert_log_nhankhau($delete_data);
			$model->delete_nhankhau($delete_data['socmnd']);
			$this->session->set_flashdata('error', '- Xóa nhân khẩu thành công!');
		}
		$data_table = $model->nhankhau();
		$view->nhankhau($data_table);
	}
	public function xemnhankhau($socmnd)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_nhankhau = $model->mot_nhankhau($socmnd);
		$view->xemnhankhau($socmnd, $data_nhankhau);
	}
	public function suanhankhau($socmnd)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('update') == 'submit') {
			$update_data['hvt'] = $this->input->post('hvt');
			$update_data['tenkhac'] = $this->input->post('tenkhac');
			$update_data['gt'] = $this->input->post('gt');
			$update_data['ns'] = $this->input->post('ns');
			$update_data['dt'] = $this->input->post('dt');
			$update_data['tg'] = $this->input->post('tg');
			$update_data['dc'] = $this->input->post('dc');
			$update_data['trinhdonn'] = $this->input->post('trinhdonn');
			$update_data['noilamviec'] = $this->input->post('noilamviec');
			$update_data['choohiennay'] = $this->input->post('choohiennay');
			$update_data['quequan'] = $this->input->post('quequan');
			$update_data['tdhocvan'] = $this->input->post('tdhocvan');
			$update_data['nghenghiep'] = $this->input->post('nghenghiep');
			$update_data['qhvchuho'] = $this->input->post('qhvchuho');
			$mot_nhankhau = $model->mot_nhankhau($socmnd);
			foreach ($mot_nhankhau as $key => $value){
				$insert_log = $value;
			}
			$insert_log['lydo'] = $this->input->post('lydo');
			$insert_log['type'] = 'Sửa';
			$insert_log['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
			$insert_log['ngay_th'] = date("Y-m-d H:i:s");
			$model->insert_log_nhankhau($insert_log);

			$model->suanhankhau($socmnd, $update_data);

			$this->session->set_flashdata('error', '- Sửa nhân khẩu thành công!');
			
		}
		$data_nhankhau = $model->mot_nhankhau($socmnd);
		$view->suanhankhau($socmnd, $data_nhankhau);
	}
	public function themnhankhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$add_data['socmnd'] = $this->input->post('socmnd');
			$add_data['hvt'] = $this->input->post('hvt');
			$add_data['tenkhac'] = $this->input->post('tenkhac');
			$add_data['gt'] = $this->input->post('gt');
			$add_data['ns'] = $this->input->post('ns');
			$add_data['dt'] = $this->input->post('dt');
			$add_data['tg'] = $this->input->post('tg');
			$add_data['dc'] = $this->input->post('dc');
			$add_data['trinhdonn'] = $this->input->post('trinhdonn');
			$add_data['noilamviec'] = $this->input->post('noilamviec');
			$add_data['choohiennay'] = $this->input->post('choohiennay');
			$add_data['quequan'] = $this->input->post('quequan');
			$add_data['tdhocvan'] = $this->input->post('tdhocvan');
			$add_data['nghenghiep'] = $this->input->post('nghenghiep');
			$add_data['mahk'] = $this->input->post('mahk');
			$add_data['qhvchuho'] = $this->input->post('qhvchuho');
			$add_data['ngay_tao_nk'] = date("Y-m-d");
			$check_only_cmnd = $model->check_only_cmnd($add_data['socmnd']);
			if ($check_only_cmnd == 1) {
				$this->session->set_flashdata('error', '- Số CMND vừa nhập đã bị trùng!');
			}
			else{
				$model->addnhankhau($add_data);
				if ($add_data['qhvchuho'] == 'Chủ hộ') {
					$model->set_chu_ho($add_data['mahk'], $add_data['hvt']);
				}
				$add_data['lydo'] = 'Thêm mới';
				$add_data['type'] = 'Thêm';
				$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
				$add_data['ngay_th'] = date("Y-m-d H:i:s");
				$model->insert_log_nhankhau($add_data);
				$this->session->set_flashdata('error', '- Thêm nhân khẩu thành công!');
				redirect(base_url('admin/nhankhau'));
			}
		}
		$data_hokhau = $model->hokhau();
		$view->themnhankhau($data_hokhau);
	}
	public function nhatkynhankhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhatkynhankhau();
		$view->nhatkynhankhau($data_table);
	}
	public function tamtru()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->tamtru();
		$view->tamtru($data_table);
	}
	public function suatamtru($id)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$update_data['socmnd'] = $this->input->post('socmnd');
			$update_data['dc'] = $this->input->post('dc');
			$update_data['khaucu'] = $this->input->post('khaucu');
			$update_data['ngaybd'] = $this->input->post('ngaybd');
			$update_data['ngaykt'] = $this->input->post('ngaykt');
			$update_data['lydo'] = $this->input->post('lydo');
			if ($update_data['socmnd'] == NULL || $update_data['dc'] == NULL || $update_data['khaucu'] == NULL || $update_data['ngaybd'] == NULL || $update_data['ngaykt'] == NULL || $update_data['lydo'] == NULL) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				$show_tamtru = $model->show_tamtru($id);
				foreach ($show_tamtru as $key => $value){
					$update_log = $value;
				}
				$update_log['type'] = 'Sửa';
				$update_log['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
				$update_log['ngay_th'] = date("Y-m-d H:i:s");
				$model->insert_log_tttv($update_log);
				$model->suatamtru($id, $update_data);
				$this->session->set_flashdata('error', '- Sửa thông tin tạm trú thành công!');
			}
		}

		$nguoi = $model->nhankhau();
		$data = $model->show_tamtru($id);
		$view->suatamtru($nguoi, $data);
	}
	public function xoatamtru($id)
	{
		$model = new M_Admin();
		$show_tamtru = $model->show_tamtru($id);
		foreach ($show_tamtru as $key => $value){
			$delete_data = $value;
		}
		$delete_data['type'] = 'Xóa';
		$delete_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
		$delete_data['ngay_th'] = date("Y-m-d H:i:s");
		$model->insert_log_tttv($delete_data);
		$model->xoatamtru($id);
		$this->session->set_flashdata('error', '- Xóa thông tin tạm trú thành công!');
		redirect(base_url('admin/tamtru'));
	}
	public function themtamtru()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$socmnd = $this->input->post('socmnd');
			$count = count($socmnd);
			$add_data['dc'] = $this->input->post('dc');
			$add_data['ngaybd'] = $this->input->post('ngaybd');
			$add_data['ngaykt'] = $this->input->post('ngaykt');
			$add_data['lydo'] = $this->input->post('lydo');
			$add_data['loai'] = 'Tạm trú';
			$add_data['ngay_tao_tttv'] = date('Y-m-d');
			if ($socmnd == NULL || $add_data['dc'] == NULL || $add_data['ngaybd'] == NULL || $add_data['ngaykt'] == NULL || $add_data['lydo'] == NULL) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				for ($i=0; $i < $count; $i++) {
					$add_data['socmnd'] = $socmnd[$i];
					$khaucu = $model->mot_nhankhau($add_data['socmnd']);
					foreach ($khaucu as $key => $value){
						$add_data['khaucu'] = $value['mahk'];
					}
					$model->themtamtru($add_data);
					$add_data['type'] = 'Thêm';
					$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
					$add_data['ngay_th'] = date("Y-m-d H:i:s");
					$model->insert_log_tttv($add_data);
					$this->session->set_flashdata('error', '- Thêm thông tin tạm trú thành công!');
					redirect(base_url('admin/tamtru'));
				}
			}
		}
		$nhankhau = $model->nhankhau();
		$view->themtamtru($nhankhau);
	}
	public function nhatkytamtru()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhatkytamtru();
		$view->nhatkytamtru($data_table);
	}
	public function tamvang()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->tamvang();
		$view->tamvang($data_table);
	}
	public function suatamvang($id)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$update_data['socmnd'] = $this->input->post('socmnd');
			$update_data['dc'] = $this->input->post('dc');
			$update_data['khaucu'] = $this->input->post('khaucu');
			$update_data['khaumoi'] = $this->input->post('khaumoi');
			$update_data['ngaybd'] = $this->input->post('ngaybd');
			$update_data['ngaykt'] = $this->input->post('ngaykt');
			$update_data['lydo'] = $this->input->post('lydo');
			if ($update_data['socmnd'] == NULL || $update_data['dc'] == NULL || $update_data['khaucu'] == NULL || $update_data['ngaybd'] == NULL || $update_data['ngaykt'] == NULL || $update_data['lydo'] == NULL) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				$show_tamvang = $model->show_tamvang($id);
				foreach ($show_tamvang as $key => $value){
					$update_log = $value;
				}
				$update_log['type'] = 'Sửa';
				$update_log['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
				$update_log['ngay_th'] = date("Y-m-d H:i:s");
				$model->insert_log_tttv($update_log);
				$model->suatamvang($id, $update_data);
				$this->session->set_flashdata('error', '- Sửa thông tin tạm vắng thành công!');
			}
		}

		$nguoi = $model->nhankhau();
		$data = $model->show_tamvang($id);
		$view->suatamvang($nguoi, $data);
	}
	public function xoatamvang($id)
	{
		$model = new M_Admin();
		$show_tamvang = $model->show_tamvang($id);
		foreach ($show_tamvang as $key => $value){
			$delete_data = $value;
		}
		$delete_data['type'] = 'Xóa';
		$delete_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
		$delete_data['ngay_th'] = date("Y-m-d H:i:s");
		$model->insert_log_tttv($delete_data);
		$model->xoatamvang($id);
		$this->session->set_flashdata('error', '- Xóa thông tin tạm vắng thành công!');
		redirect(base_url('admin/tamvang'));
	}
	public function themtamvang()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$socmnd = $this->input->post('socmnd');
			$count = count($socmnd);
			$add_data['dc'] = $this->input->post('dc');
			$add_data['ngaybd'] = $this->input->post('ngaybd');
			$add_data['ngaykt'] = $this->input->post('ngaykt');
			$add_data['lydo'] = $this->input->post('lydo');
			$add_data['loai'] = 'Tạm vắng';
			$add_data['ngay_tao_tttv'] = date('Y-m-d');
			if ($socmnd == NULL || $add_data['dc'] == NULL || $add_data['ngaybd'] == NULL || $add_data['ngaykt'] == NULL || $add_data['lydo'] == NULL) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				for ($i=0; $i < $count; $i++) { 
					$add_data['socmnd'] = $socmnd[$i];
					$khaucu = $model->mot_nhankhau($add_data['socmnd']);
					foreach ($khaucu as $key => $value){
						$add_data['khaucu'] = $value['mahk'];
					}
					$model->themtamvang($add_data);
					$add_data['type'] = 'Thêm';
					$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
					$add_data['ngay_th'] = date("Y-m-d H:i:s");
					$model->insert_log_tttv($add_data);
					$this->session->set_flashdata('error', '- Thêm thông tin tạm vắng thành công!');
				}
			}
		}
		$nhankhau = $model->nhankhau();
		$hokhau = $model->hokhau();
		$view->themtamvang($nhankhau);
	}
	public function nhatkytamvang()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhatkytamvang();
		$view->nhatkytamvang($data_table);
	}
	public function chuyenkhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->chuyenkhau();
		$view->chuyenkhau($data_table);
	}
	public function themchuyenkhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$socmnd = $this->input->post('socmnd');
			$count = count($socmnd);
			$add_data['khaumoi'] = $this->input->post('khaumoi');
			$add_data['qhvchuho'] = $this->input->post('qhvchuho');
			$add_data['lydo'] = $this->input->post('lydo');
			$add_data['loai'] = 'Chuyển khẩu';
			$add_data['ngayth'] = date("Y-m-d");
			if ($socmnd == NULL || $add_data['khaumoi'] == NULL || $add_data['lydo'] == NULL || $add_data['qhvchuho'] == NULL) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				for ($i=0; $i < $count; $i++) { 
					$add_data['socmnd'] = $socmnd[$i];
					$khaucu = $model->mot_nhankhau($socmnd[$i]);
					foreach ($khaucu as $key => $value){
						$add_data['khaucu'] = $value['mahk'];
						$qhvchuho_cu = $value['qhvchuho'];
					}
					if ($add_data['khaucu'] == $add_data['khaumoi']) {
						$this->session->set_flashdata('error', '- Giá trị khẩu cũ và khẩu mới trùng nhau!');
					}
					else{
						// Check khẩu cá nhân
						$check_only = $model->check_khau_ca_nhan($add_data['khaucu']);
						if ($check_only == 1) {
							$mot_nhankhau = $model->mot_nhankhau($add_data['socmnd']);
							foreach ($mot_nhankhau as $key => $value){
								$nhankhau_data = $value;
							}
							$nhankhau_data['lydo'] = 'Chuyển khẩu';
							$nhankhau_data['type'] = 'Sửa';
							$nhankhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$nhankhau_data['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_nhankhau($nhankhau_data);

							$nhankhau_data['mahk'] = $add_data['khaumoi'];
							$nhankhau_data['qhvchuho'] = $add_data['qhvchuho'];
							unset($nhankhau_data['lydo'], $nhankhau_data['type'], $nhankhau_data['nguoi_th'], $nhankhau_data['ngay_th']);
							$model->suanhankhau($add_data['socmnd'], $nhankhau_data);

							// Xóa hộ khẩu cũ
							$mot_hokhau = $model->mot_hokhau($add_data['khaucu']);
							foreach ($mot_hokhau as $key => $value){
								$delete_data = $value;
							}
							$delete_data['lydo'] = 'Chuyển khẩu';
							$delete_data['type'] = 'Xóa';
							$delete_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$delete_data['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_hokhau($delete_data);

							$model->delete_hokhau($add_data['khaucu']);
							unset($add_data['qhvchuho']);
							$model->themchuyenkhau($add_data);
							$add_data['type'] = 'Thêm';
							$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$add_data['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_cktk($add_data);
						}
						else{
							// Đây không phải là hộ khẩu cá nhân
							$cmnd_chuhomoi = $this->input->post('chuhomoi');


// Sửa thằng chuyển đi
							$mot_nhankhau = $model->mot_nhankhau($add_data['socmnd']);
							foreach ($mot_nhankhau as $key => $value){
								$nhankhau_data = $value;
							}
							$nhankhau_data['lydo'] = 'Chuyển khẩu';
							$nhankhau_data['type'] = 'Sửa';
							$nhankhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$nhankhau_data['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_nhankhau($nhankhau_data);

							$nhankhau_data['mahk'] = $add_data['khaumoi'];
							$nhankhau_data['qhvchuho'] = $add_data['qhvchuho'];
							unset($nhankhau_data['lydo'], $nhankhau_data['type'], $nhankhau_data['nguoi_th'], $nhankhau_data['ngay_th']);
							$model->suanhankhau($add_data['socmnd'], $nhankhau_data);

// Sửa thằng chủ hộ mới
							$mot_nhankhau = $model->mot_nhankhau($cmnd_chuhomoi);
							foreach ($mot_nhankhau as $key => $value){
								$nhankhau_data = $value;
							}
							$nhankhau_data['lydo'] = 'Chủ hộ chuyển khẩu';
							$nhankhau_data['type'] = 'Sửa';
							$nhankhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$nhankhau_data['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_nhankhau($nhankhau_data);

							$nhankhau_data['qhvchuho'] = 'Chủ hộ';
							unset($nhankhau_data['lydo'], $nhankhau_data['type'], $nhankhau_data['nguoi_th'], $nhankhau_data['ngay_th']);
							$model->suanhankhau($cmnd_chuhomoi, $nhankhau_data);

// Đổi tên chủ hộ mới
							// Insert Log
							$doiten_chuho = $model->mot_hokhau($add_data['khaucu']);
							foreach ($doiten_chuho as $key => $value){
								$hokhau_cu = $value;
							}

							$hokhau_cu['lydo'] = 'Chủ hộ chuyển khẩu';
							$hokhau_cu['type'] = 'Sửa';
							$hokhau_cu['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$hokhau_cu['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_hokhau($hokhau_cu);

							// Đổi tên

							$hokhau_cu['tench'] = $nhankhau_data['hvt'];
							$model->doiten_chuho($hokhau_cu['tench'], $add_data['khaucu']);

// Thêm chuyển khẩu vào bảng
							unset($add_data['qhvchuho']);
							$model->themchuyenkhau($add_data);
							$add_data['type'] = 'Thêm';
							$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
							$add_data['ngay_th'] = date("Y-m-d H:i:s");
							$model->insert_log_cktk($add_data);
						}
						$this->session->set_flashdata('error', '- Thêm thông tin chuyển khẩu thành công!');
					}
				}
				// redirect(base_url('admin/chuyenkhau'));
			}
		}
		$nhankhau = $model->nhankhau();
		$hokhau = $model->hokhau();
		$view->themchuyenkhau($nhankhau, $hokhau);
	}
	public function xoachuyenkhau($id)
	{
		$model = new M_Admin();
		$data_fetch = $model->show_chuyenkhau($id);
		foreach ($data_fetch as $key => $value){
			$chuyenkhau_data = $value;
		}
		$chuyenkhau_data['type'] = 'Xóa';
		$chuyenkhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
		$chuyenkhau_data['ngay_th'] = date("Y-m-d H:i:s");
		$model->insert_log_cktk($chuyenkhau_data);

		$model->xoachuyenkhau($id);
		$this->session->set_flashdata('error', '- Xóa thông tin chuyển khẩu thành công!');
		redirect(base_url('admin/chuyenkhau'));
	}
	// Sửa chuyển khẩu hiện tại không làm
	private function suachuyenkhau($id)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$update_data['socmnd'] = $this->input->post('socmnd');
			$update_data['khaumoi'] = $this->input->post('khaumoi');
			$update_data['lydo'] = $this->input->post('lydo');
			$update_data['loai'] = 'Chuyển khẩu';
			$update_data['ngayth'] = date("Y-m-d");
			if ($update_data['socmnd'] == NULL || $update_data['khaumoi'] == NULL || $update_data['lydo'] == NULL) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				$khaucu = $model->mot_nhankhau($update_data['socmnd']);
				foreach ($khaucu as $key => $value){
					$update_data['khaucu'] = $value['mahk'];
					// $qhvchuho = $value['qhvchuho'];
				}
				if ($update_data['khaucu'] == $update_data['khaumoi']) {
					$this->session->set_flashdata('error', '- Giá trị khẩu cũ và khẩu mới trùng nhau!');
				}
				else{
					$model->suachuyenkhau($id, $update_data);
					$model->update_suachuyenkhau_nhankhau($update_data);
					$this->session->set_flashdata('error', '- Sửa thông tin chuyển khẩu thành công!');
					redirect(base_url('admin/chuyenkhau'));
				}
			}
		}
		$data = $model->show_chuyenkhau($id);
		$nhankhau = $model->nhankhau();
		$hokhau = $model->hokhau();
		$view->suachuyenkhau($data, $nhankhau, $hokhau);
	}
	public function nhatkychuyenkhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhatkychuyenkhau();
		$view->nhatkychuyenkhau($data_table);
	}
	public function tachkhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->tachkhau();
		$view->tachkhau($data_table);
	}
	public function themtachkhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$socmnd = $this->input->post('socmnd');
			$count = count($socmnd);
			$add_data['dc'] = $this->input->post('dc');
			$add_data['khaumoi'] = $this->input->post('khaumoi');
			$add_data['lydo'] = $this->input->post('lydo');
			$add_data['loai'] = 'Tách khẩu';
			$add_data['ngayth'] = date("Y-m-d");
			if ($socmnd == NULL || $add_data['khaumoi'] == NULL || $add_data['lydo'] == NULL || $add_data['dc'] == NULL ) {
				$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
			}
			else{
				for ($i=0; $i < $count; $i++) {
					$add_data['socmnd'] = $socmnd[$i];
					$khaucu = $model->mot_nhankhau($add_data['socmnd']);
					foreach ($khaucu as $key => $value){
						$add_data['tench'] = $value['hvt'];
						$add_data['khaucu'] = $value['mahk'];
					}
					if ($add_data['khaucu'] == $add_data['khaumoi']) {
						$this->session->set_flashdata('error', '- Giá trị khẩu cũ và khẩu mới trùng nhau!');
					}
					else{
						$check_mahk = $model->check_mahk($add_data['khaumoi']);
						if ($check_mahk == 1) {
							$this->session->set_flashdata('error', '- Mã hộ khẩu đã tồn tại!');
						}
						else{
							// Phân biệt khẩu cá nhân
							$check_only = $model->check_khau_ca_nhan($add_data['khaucu']);
							if ($check_only == 1) {
								// Thêm khẩu mới
								$data_them['mahk'] = $add_data['khaumoi'];
								$data_them['tench'] = $add_data['tench'];
								$data_them['dc'] = $add_data['dc'];
								$data_them['ngay_tao_hk'] = $add_data['ngayth'];
								$model->them_ho_khau($data_them);

								$data_them['lydo'] = 'Tách khẩu';
								$data_them['type'] = 'Thêm';
								$data_them['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$data_them['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_hokhau($data_them);

								// Sửa nhân khẩu
								$mot_nhankhau = $model->mot_nhankhau($add_data['socmnd']);
								foreach ($mot_nhankhau as $key => $value){
									$nhankhau_data = $value;
								}
								$nhankhau_data['lydo'] = 'Tách khẩu';
								$nhankhau_data['type'] = 'Sửa';
								$nhankhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$nhankhau_data['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_nhankhau($nhankhau_data);

								$nhankhau_data['mahk'] = $add_data['khaumoi'];
								$nhankhau_data['qhvchuho'] = 'Chủ hộ';
								unset($nhankhau_data['lydo'], $nhankhau_data['type'], $nhankhau_data['nguoi_th'], $nhankhau_data['ngay_th']);
								$model->suanhankhau($add_data['socmnd'], $nhankhau_data);

								// Xóa khẩu cũ
								$mot_hokhau = $model->mot_hokhau($add_data['khaucu']);
								foreach ($mot_hokhau as $key => $value){
									$delete_data = $value;
								}
								$delete_data['lydo'] = 'Tách khẩu';
								$delete_data['type'] = 'Xóa';
								$delete_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$delete_data['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_hokhau($delete_data);

								$model->delete_hokhau($add_data['khaucu']);

								// Thêm vào bảng tách khẩu
								unset($add_data['tench'], $add_data['dc']);
								$model->themtachkhau($add_data);
								$add_data['type'] = 'Thêm';
								$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$add_data['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_cktk($add_data);
							}
							else{
								// Thêm hộ khẩu mới
								$data_them['mahk'] = $add_data['khaumoi'];
								$data_them['tench'] = $add_data['tench'];
								$data_them['dc'] = $add_data['dc'];
								$data_them['ngay_tao_hk'] = $add_data['ngayth'];
								$model->them_ho_khau($data_them);

								$data_them['lydo'] = 'Tách khẩu';
								$data_them['type'] = 'Thêm';
								$data_them['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$data_them['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_hokhau($data_them);
								// Đã xong thêm hộ khẩu mới

								$cmnd_chuhomoi = $this->input->post('chuhomoi');
								// Sửa người tách khẩu
								$mot_nhankhau = $model->mot_nhankhau($add_data['socmnd']);
								foreach ($mot_nhankhau as $key => $value){
									$nhankhau_data = $value;
								}
								$nhankhau_data['lydo'] = 'Tách khẩu';
								$nhankhau_data['type'] = 'Sửa';
								$nhankhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$nhankhau_data['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_nhankhau($nhankhau_data);

								$nhankhau_data['mahk'] = $add_data['khaumoi'];
								$nhankhau_data['qhvchuho'] = 'Chủ hộ';
								unset($nhankhau_data['lydo'], $nhankhau_data['type'], $nhankhau_data['nguoi_th'], $nhankhau_data['ngay_th']);
								$model->suanhankhau($add_data['socmnd'], $nhankhau_data);

								// Sửa chủ hộ mới
								$mot_nhankhau = $model->mot_nhankhau($cmnd_chuhomoi);
								foreach ($mot_nhankhau as $key => $value){
									$nhankhau_data = $value;
								}
								$nhankhau_data['lydo'] = 'Chủ hộ tách khẩu';
								$nhankhau_data['type'] = 'Sửa';
								$nhankhau_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$nhankhau_data['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_nhankhau($nhankhau_data);

								$nhankhau_data['qhvchuho'] = 'Chủ hộ';
								unset($nhankhau_data['lydo'], $nhankhau_data['type'], $nhankhau_data['nguoi_th'], $nhankhau_data['ngay_th']);
								$model->suanhankhau($cmnd_chuhomoi, $nhankhau_data);

								// Sửa tên chủ hộ ở hộ khẩu cũ
								$doiten_chuho = $model->mot_hokhau($add_data['khaucu']);
								foreach ($doiten_chuho as $key => $value){
									$hokhau_cu = $value;
								}
								$hokhau_cu['lydo'] = 'Chủ hộ tách khẩu';
								$hokhau_cu['type'] = 'Sửa';
								$hokhau_cu['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$hokhau_cu['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_hokhau($hokhau_cu);


								$ten_ch_moi = $nhankhau_data['hvt'];
								$model->doiten_chuho($hokhau_cu['tench'], $add_data['khaucu']);

								// Thêm vào bảng tách khẩu
								unset($add_data['tench'], $add_data['dc']);
								$model->themtachkhau($add_data);
								$add_data['type'] = 'Thêm';
								$add_data['nguoi_th'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
								$add_data['ngay_th'] = date("Y-m-d H:i:s");
								$model->insert_log_cktk($add_data);
							}
							$this->session->set_flashdata('error', '- Thêm thông tin tách khẩu thành công!');
						}
					}
				}
			}
		}
		$nhankhau = $model->nhankhau();
		$view->themtachkhau($nhankhau);
	}
	public function nhatkytachkhau()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhatkytachkhau();
		$view->nhatkytachkhau($data_table);
	}
	public function qldd()
	{
		$this->load->library('excel');
		$model = new M_Admin();
		$view = new V_Admin();

		if ($this->input->post('importfile')) {
			$path = '././res/uploads/';

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			// $this->upload->initialize($config);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}

			if (!empty($data['upload_data']['file_name'])) {
				$import_xls_file = $data['upload_data']['file_name'];
			} else {
				$import_xls_file = 0;
			}
			$inputFileName = $path . $import_xls_file;
			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
					. '": ' . $e->getMessage());
			}
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

			$arrayCount = count($allDataInSheet);
			$flag = 0;
			$createArray = array('Ma_DD', 'Ten_DD');
            $makeArray = array('Ma_DD' => 'Ma_DD', 'Ten_DD' => 'Ten_DD');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
				foreach ($dataInSheet as $key => $value) {
					if (in_array(trim($value), $createArray)) {
						$value = preg_replace('/\s+/', '', $value);
						$SheetDataKey[trim($value)] = $key;
					} else {

					}
				}
			}
			$data = array_diff_key($makeArray, $SheetDataKey);

			if (empty($data)) {
				$flag = 1;
			}
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$addresses = array();
					$Ma_DD = $SheetDataKey['Ma_DD'];
					$Ten_DD = $SheetDataKey['Ten_DD'];
					$Ma_DD = filter_var(trim($allDataInSheet[$i][$Ma_DD]), FILTER_SANITIZE_STRING);
					$Ten_DD = filter_var(trim($allDataInSheet[$i][$Ten_DD]), FILTER_SANITIZE_STRING);
					$fetchData[] = array('madd' => $Ma_DD, 'tendd' => $Ten_DD);
				}              
				// $data['employeeInfo'] = $fetchData;
				$model->importData($fetchData);
				$this->session->set_flashdata('error', '- Nhập dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('error', '- Lỗi sai file nhập vào!');
			}
		}

		$data_table = $model->diadiem();
		$view->qldd($data_table);
	}
	public function xoadiadiem()
	{
		$model = new M_Admin();
		$model->xoadiadiem();
	}
	public function vipham()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->vipham();
		$view->vipham($data_table);
	}
	public function xoavipham($id)
	{
		$model = new M_Admin();
		$model->xoavipham($id);
		$this->session->set_flashdata('error', '- Xóa thông tin tội danh thành công!');
		redirect(base_url('admin/vipham'));
	}
	public function suavipham($id)
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$update_data['mavp'] = $this->input->post('mavp');
			$update_data['toidanh'] = $this->input->post('toidanh');
			$update_data['hinhphat'] = $this->input->post('hinhphat');
			$update_data['dvlap'] = $this->input->post('dvlap');
			$update_data['ngay'] = $this->input->post('ngay');

			$model->update_vipham($update_data);
			$this->session->set_flashdata('error', '- Sửa thông tin tội danh thành công!');
			redirect(base_url('admin/vipham'));
		}
		$data = $model->show_vipham($id);
		$view->suavipham($data);
	}
	public function themvipham()
    {
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$add_data['mavp'] = $this->input->post('mavp');
			$add_data['socmnd'] = $this->input->post('socmnd');
			$add_data['toidanh'] = $this->input->post('toidanh');
			$add_data['hinhphat'] = $this->input->post('hinhphat');
			$add_data['dvlap'] = $this->input->post('dvlap');
			$add_data['nguoilap'] = $this->session->userdata('manv').' - '.$this->session->userdata('hvt');
			$add_data['ngay'] = $this->input->post('ngay');
			$add_data['ngaylap'] = date("Y-m-d");

			$model->themvipham($add_data);
			$this->session->set_flashdata('error', '- Thêm thông tin tội danh thành công!');
			redirect(base_url('admin/vipham'));
		}
		$nhankhau = $model->nhankhau();
		$view->themvipham($nhankhau);
    }
    public function nhanvien()
    {
    	$model = new M_Admin();
		$view = new V_Admin();
		$data_table = $model->nhanvien();
		$view->nhanvien($data_table);
    }
    public function xoanhanvien($manv)
    {
    	$model = new M_Admin();
		$model->xoanhanvien($manv);
		$this->session->set_flashdata('error', '- Xóa thông tin nhân viên thành công!');
		redirect(base_url('admin/nhanvien'));
    }
    public function suanhanvien($manv)
    {
    	$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$update_data['hvt'] = $this->input->post('hvt');
			$update_data['gt'] = $this->input->post('gt');
			$update_data['ns'] = $this->input->post('ns');
			$update_data['sdt'] = $this->input->post('sdt');
			$update_data['email'] = $this->input->post('email');
			$update_data['capbac'] = $this->input->post('capbac');
			$update_data['chucvu'] = $this->input->post('chucvu');
			$update_data['donvi'] = $this->input->post('donvi');
			$update_data['quyenhan'] = $this->input->post('quyenhan');

			$model->update_nhanvien($update_data, $manv);
			$this->session->set_flashdata('error', '- Sửa thông tin nhân viên thành công!');
			redirect(base_url('admin/nhanvien'));
		}
		$data = $model->mot_nhanvien($manv);
		$view->suanhanvien($data);
    }
    public function themnhanvien()
    {
    	$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add') == 'submit') {
			$add_data['manv'] = $this->input->post('manv');
			$add_data['hvt'] = $this->input->post('hvt');
			$add_data['gt'] = $this->input->post('gt');
			$add_data['ns'] = $this->input->post('ns');
			$add_data['sdt'] = $this->input->post('sdt');
			$add_data['email'] = $this->input->post('email');
			$add_data['capbac'] = $this->input->post('capbac');
			$add_data['chucvu'] = $this->input->post('chucvu');
			$add_data['donvi'] = $this->input->post('donvi');
			$add_data['quyenhan'] = $this->input->post('quyenhan');
			$add_data['ngay_tao_nv'] = date('Y-m-d');

			$model->themnhanvien($add_data);
			$this->session->set_flashdata('error', '- Thêm thông tin nhân viên thành công!');
			redirect(base_url('admin/nhanvien'));
		}
		$view->themnhanvien();
    }
  //   public function phongban()
  //   {
  //   	$model = new M_Admin();
		// $view = new V_Admin();
		// $data_table = $model->phongban();
		// $view->phongban($data_table);
  //   }
  //   public function themphongban()
  //   {
  //   	$model = new M_Admin();
		// $view = new V_Admin();
		// if ($this->input->post('add') == 'submit') {
		// 	$add_data['tenpb'] = $this->input->post('tenpb');
		// 	$add_data['dc'] = $this->input->post('dc');
		// 	$add_data['sdt'] = $this->input->post('sdt');
		// 	if ($add_data['tenpb'] == NULL || $add_data['dc'] == NULL || $add_data['sdt'] == NULL) {
		// 		$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
		// 	}
		// 	else{
		// 		$model->themphongban($add_data);
		// 		$this->session->set_flashdata('error', '- Thêm thông tin phòng ban thành công!');
		// 		redirect(base_url('admin/phongban'));
		// 	}
		// }
		// $view->themphongban();
  //   }
  //   public function suaphongban($mapb)
  //   {
  //   	$model = new M_Admin();
		// $view = new V_Admin();
		// if ($this->input->post('edit') == 'submit') {
		// 	$update_data['tenpb'] = $this->input->post('tenpb');
		// 	$update_data['dc'] = $this->input->post('dc');
		// 	$update_data['sdt'] = $this->input->post('sdt');
		// 	if ($update_data['tenpb'] == NULL || $update_data['dc'] == NULL || $update_data['sdt'] == NULL) {
		// 		$this->session->set_flashdata('error', '- Vui lòng điền đầy đủ thông tin!');
		// 	}
		// 	else{
		// 		$model->suaphongban($update_data, $mapb);
		// 		$this->session->set_flashdata('error', '- Sửa thông tin phòng ban thành công!');
		// 		redirect(base_url('admin/phongban'));
		// 	}
		// }
		// $data = $model->mot_phongban($mapb);
		// $view->suaphongban($data);
  //   }
  //   public function xoaphongban($mapb)
  //   {
  //   	$model = new M_Admin();
		// $model->xoaphongban($mapb);
		// $this->session->set_flashdata('error', '- Xóa thông tin phòng ban thành công!');
		// redirect(base_url('admin/phongban'));
  //   }
    public function thongtincanhan()
    {
    	$manv = $this->session->userdata('manv');

    	$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('edit') == 'submit') {
			$update_data['hvt'] = $this->input->post('hvt');
			$update_data['gt'] = $this->input->post('gt');
			$update_data['ns'] = $this->input->post('ns');
			$update_data['sdt'] = $this->input->post('sdt');
			$update_data['email'] = $this->input->post('email');
			$update_data['capbac'] = $this->input->post('capbac');
			$update_data['chucvu'] = $this->input->post('chucvu');
			$update_data['donvi'] = $this->input->post('donvi');
			$model->update_nhanvien($update_data, $manv);
			$this->session->set_flashdata('error', '- Sửa thông tin cá nhân thành công!');
		}
		$data = $model->mot_nhanvien($manv);
		foreach ($data as $key => $value){
			$new_session = array(
				'manv' => $value['manv'],
				'hvt' => $value['hvt'],
				'gt' => $value['gt'],
				'ns' => $value['ns'],
				'sdt' => $value['sdt'],
				'email' => $value['email'],
				'capbac' => $value['capbac'],
				'chucvu' => $value['chucvu'],
				'donvi' => $value['donvi'],
				'quyenhan' => $value['quyenhan'],
			);
		}
		$this->session->set_userdata($new_session);
		$view->suanhanvien($data);
    }
    public function thongke()
    {
    	$model = new M_Admin();
		$view = new V_Admin();
		$ngay = date('d');
		$thang = date('m');
		$nam = date('Y');
		$pre_ngay = '01';
		$pre_thang = '01';
		$pre_nam = '2000';
		if ($this->input->get('nam')) {
			$nam = $this->input->get('nam');
			$thang = '12';
			$ngay = '31';
			$pre_nam = $this->input->get('nam');
		}
		if ($this->input->get('thang')) {
			$thang = $this->input->get('thang');
			$ngay = '31';
			$pre_thang = $this->input->get('thang');
		}
		if ($this->input->get('ngay')) {
			$ngay = $this->input->get('ngay');
			$pre_ngay = $this->input->get('ngay');
		}

		$date = $nam.'-'.$thang.'-'.$ngay;
		$pre_date = $pre_nam.'-'.$pre_thang.'-'.$pre_ngay;
		// Danh sách thống kê theo huyện
			// Địa bàn
			$data['diaban'][] = 'Thị trấn Vân Đình';
		$data['diaban'][] = 'Xã Viên An';
		$data['diaban'][] = 'Xã Viên Nội';
		$data['diaban'][] = 'Xã Hoa Sơn';
		$data['diaban'][] = 'Xã Quảng Phú Cầu';
		$data['diaban'][] = 'Xã Trường Thịnh';
		$data['diaban'][] = 'Xã Cao Thành';
		$data['diaban'][] = 'Xã Liên Bạt';
		$data['diaban'][] = 'Xã Sơn Công';
		$data['diaban'][] = 'Xã Đồng Tiến';
		$data['diaban'][] = 'Xã Phương Tú';
		$data['diaban'][] = 'Xã Trung Tú';
		$data['diaban'][] = 'Xã Đồng Tân';
		$data['diaban'][] = 'Xã Tảo Dương Văn';
		$data['diaban'][] = 'Xã Vạn Thái';
		$data['diaban'][] = 'Xã Minh Đức';
		$data['diaban'][] = 'Xã Hòa Lâm';
		$data['diaban'][] = 'Xã Hòa Xá';
		$data['diaban'][] = 'Xã Trầm Lộng';
		$data['diaban'][] = 'Xã Kim Đường';
		$data['diaban'][] = 'Xã Hòa Nam';
		$data['diaban'][] = 'Xã Hòa Phú';
		$data['diaban'][] = 'Xã Đội Bình';
		$data['diaban'][] = 'Xã Đại Hùng';
		$data['diaban'][] = 'Xã Đông Lỗ';
		$data['diaban'][] = 'Xã Phù Lưu';
		$data['diaban'][] = 'Xã Đại Cường';
		$data['diaban'][] = 'Xã Lưu Hoàng';
		$data['diaban'][] = 'Xã Hồng Quang';
			// Nhân khẩu
		$data['nhankhau'][0] = $model->tk_huyen_nhankhau($data['diaban'][0], $date, $pre_date);
		$data['nhankhau'][1] = $model->tk_huyen_nhankhau($data['diaban'][1], $date, $pre_date);
		$data['nhankhau'][2] = $model->tk_huyen_nhankhau($data['diaban'][2], $date, $pre_date);
		$data['nhankhau'][3] = $model->tk_huyen_nhankhau($data['diaban'][3], $date, $pre_date);
		$data['nhankhau'][4] = $model->tk_huyen_nhankhau($data['diaban'][4], $date, $pre_date);
		$data['nhankhau'][5] = $model->tk_huyen_nhankhau($data['diaban'][5], $date, $pre_date);
		$data['nhankhau'][6] = $model->tk_huyen_nhankhau($data['diaban'][6], $date, $pre_date);
		$data['nhankhau'][7] = $model->tk_huyen_nhankhau($data['diaban'][7], $date, $pre_date);
		$data['nhankhau'][8] = $model->tk_huyen_nhankhau($data['diaban'][8], $date, $pre_date);
		$data['nhankhau'][9] = $model->tk_huyen_nhankhau($data['diaban'][9], $date, $pre_date);
		$data['nhankhau'][10] = $model->tk_huyen_nhankhau($data['diaban'][10], $date, $pre_date);
		$data['nhankhau'][11] = $model->tk_huyen_nhankhau($data['diaban'][11], $date, $pre_date);
		$data['nhankhau'][12] = $model->tk_huyen_nhankhau($data['diaban'][12], $date, $pre_date);
		$data['nhankhau'][13] = $model->tk_huyen_nhankhau($data['diaban'][13], $date, $pre_date);
		$data['nhankhau'][14] = $model->tk_huyen_nhankhau($data['diaban'][14], $date, $pre_date);
		$data['nhankhau'][15] = $model->tk_huyen_nhankhau($data['diaban'][15], $date, $pre_date);
		$data['nhankhau'][16] = $model->tk_huyen_nhankhau($data['diaban'][16], $date, $pre_date);
		$data['nhankhau'][17] = $model->tk_huyen_nhankhau($data['diaban'][17], $date, $pre_date);
		$data['nhankhau'][18] = $model->tk_huyen_nhankhau($data['diaban'][18], $date, $pre_date);
		$data['nhankhau'][19] = $model->tk_huyen_nhankhau($data['diaban'][19], $date, $pre_date);
		$data['nhankhau'][20] = $model->tk_huyen_nhankhau($data['diaban'][20], $date, $pre_date);
		$data['nhankhau'][21] = $model->tk_huyen_nhankhau($data['diaban'][21], $date, $pre_date);
		$data['nhankhau'][22] = $model->tk_huyen_nhankhau($data['diaban'][22], $date, $pre_date);
		$data['nhankhau'][23] = $model->tk_huyen_nhankhau($data['diaban'][23], $date, $pre_date);
		$data['nhankhau'][24] = $model->tk_huyen_nhankhau($data['diaban'][24], $date, $pre_date);
		$data['nhankhau'][25] = $model->tk_huyen_nhankhau($data['diaban'][25], $date, $pre_date);
		$data['nhankhau'][26] = $model->tk_huyen_nhankhau($data['diaban'][26], $date, $pre_date);
		$data['nhankhau'][27] = $model->tk_huyen_nhankhau($data['diaban'][27], $date, $pre_date);
		$data['nhankhau'][28] = $model->tk_huyen_nhankhau($data['diaban'][28], $date, $pre_date);
		
			// Hộ khẩu
		$data['hokhau'][0] = $model->tk_huyen_hokhau($data['diaban'][0], $date, $pre_date);
		$data['hokhau'][1] = $model->tk_huyen_hokhau($data['diaban'][1], $date, $pre_date);
		$data['hokhau'][2] = $model->tk_huyen_hokhau($data['diaban'][2], $date, $pre_date);
		$data['hokhau'][3] = $model->tk_huyen_hokhau($data['diaban'][3], $date, $pre_date);
		$data['hokhau'][4] = $model->tk_huyen_hokhau($data['diaban'][4], $date, $pre_date);
		$data['hokhau'][5] = $model->tk_huyen_hokhau($data['diaban'][5], $date, $pre_date);
		$data['hokhau'][6] = $model->tk_huyen_hokhau($data['diaban'][6], $date, $pre_date);
		$data['hokhau'][7] = $model->tk_huyen_hokhau($data['diaban'][7], $date, $pre_date);
		$data['hokhau'][8] = $model->tk_huyen_hokhau($data['diaban'][8], $date, $pre_date);
		$data['hokhau'][9] = $model->tk_huyen_hokhau($data['diaban'][9], $date, $pre_date);
		$data['hokhau'][10] = $model->tk_huyen_hokhau($data['diaban'][10], $date, $pre_date);
		$data['hokhau'][11] = $model->tk_huyen_hokhau($data['diaban'][11], $date, $pre_date);
		$data['hokhau'][12] = $model->tk_huyen_hokhau($data['diaban'][12], $date, $pre_date);
		$data['hokhau'][13] = $model->tk_huyen_hokhau($data['diaban'][13], $date, $pre_date);
		$data['hokhau'][14] = $model->tk_huyen_hokhau($data['diaban'][14], $date, $pre_date);
		$data['hokhau'][15] = $model->tk_huyen_hokhau($data['diaban'][15], $date, $pre_date);
		$data['hokhau'][16] = $model->tk_huyen_hokhau($data['diaban'][16], $date, $pre_date);
		$data['hokhau'][17] = $model->tk_huyen_hokhau($data['diaban'][17], $date, $pre_date);
		$data['hokhau'][18] = $model->tk_huyen_hokhau($data['diaban'][18], $date, $pre_date);
		$data['hokhau'][19] = $model->tk_huyen_hokhau($data['diaban'][19], $date, $pre_date);
		$data['hokhau'][20] = $model->tk_huyen_hokhau($data['diaban'][20], $date, $pre_date);
		$data['hokhau'][21] = $model->tk_huyen_hokhau($data['diaban'][21], $date, $pre_date);
		$data['hokhau'][22] = $model->tk_huyen_hokhau($data['diaban'][22], $date, $pre_date);
		$data['hokhau'][23] = $model->tk_huyen_hokhau($data['diaban'][23], $date, $pre_date);
		$data['hokhau'][24] = $model->tk_huyen_hokhau($data['diaban'][24], $date, $pre_date);
		$data['hokhau'][25] = $model->tk_huyen_hokhau($data['diaban'][25], $date, $pre_date);
		$data['hokhau'][26] = $model->tk_huyen_hokhau($data['diaban'][26], $date, $pre_date);
		$data['hokhau'][27] = $model->tk_huyen_hokhau($data['diaban'][27], $date, $pre_date);
		$data['hokhau'][28] = $model->tk_huyen_hokhau($data['diaban'][28], $date, $pre_date);
		
			// Tạm trú tạm vắng
		$data['tttv'][0] = $model->tk_huyen_tttv($data['diaban'][0], $date, $pre_date);
		$data['tttv'][1] = $model->tk_huyen_tttv($data['diaban'][1], $date, $pre_date);
		$data['tttv'][2] = $model->tk_huyen_tttv($data['diaban'][2], $date, $pre_date);
		$data['tttv'][3] = $model->tk_huyen_tttv($data['diaban'][3], $date, $pre_date);
		$data['tttv'][4] = $model->tk_huyen_tttv($data['diaban'][4], $date, $pre_date);
		$data['tttv'][5] = $model->tk_huyen_tttv($data['diaban'][5], $date, $pre_date);
		$data['tttv'][6] = $model->tk_huyen_tttv($data['diaban'][6], $date, $pre_date);
		$data['tttv'][7] = $model->tk_huyen_tttv($data['diaban'][7], $date, $pre_date);
		$data['tttv'][8] = $model->tk_huyen_tttv($data['diaban'][8], $date, $pre_date);
		$data['tttv'][9] = $model->tk_huyen_tttv($data['diaban'][9], $date, $pre_date);
		$data['tttv'][10] = $model->tk_huyen_tttv($data['diaban'][10], $date, $pre_date);
		$data['tttv'][11] = $model->tk_huyen_tttv($data['diaban'][11], $date, $pre_date);
		$data['tttv'][12] = $model->tk_huyen_tttv($data['diaban'][12], $date, $pre_date);
		$data['tttv'][13] = $model->tk_huyen_tttv($data['diaban'][13], $date, $pre_date);
		$data['tttv'][14] = $model->tk_huyen_tttv($data['diaban'][14], $date, $pre_date);
		$data['tttv'][15] = $model->tk_huyen_tttv($data['diaban'][15], $date, $pre_date);
		$data['tttv'][16] = $model->tk_huyen_tttv($data['diaban'][16], $date, $pre_date);
		$data['tttv'][17] = $model->tk_huyen_tttv($data['diaban'][17], $date, $pre_date);
		$data['tttv'][18] = $model->tk_huyen_tttv($data['diaban'][18], $date, $pre_date);
		$data['tttv'][19] = $model->tk_huyen_tttv($data['diaban'][19], $date, $pre_date);
		$data['tttv'][20] = $model->tk_huyen_tttv($data['diaban'][20], $date, $pre_date);
		$data['tttv'][21] = $model->tk_huyen_tttv($data['diaban'][21], $date, $pre_date);
		$data['tttv'][22] = $model->tk_huyen_tttv($data['diaban'][22], $date, $pre_date);
		$data['tttv'][23] = $model->tk_huyen_tttv($data['diaban'][23], $date, $pre_date);
		$data['tttv'][24] = $model->tk_huyen_tttv($data['diaban'][24], $date, $pre_date);
		$data['tttv'][25] = $model->tk_huyen_tttv($data['diaban'][25], $date, $pre_date);
		$data['tttv'][26] = $model->tk_huyen_tttv($data['diaban'][26], $date, $pre_date);
		$data['tttv'][27] = $model->tk_huyen_tttv($data['diaban'][27], $date, $pre_date);
		$data['tttv'][28] = $model->tk_huyen_tttv($data['diaban'][28], $date, $pre_date);
			// Vi phạm
		$data['vipham'][0] = $model->tk_huyen_vipham($data['diaban'][0], $date, $pre_date);
		$data['vipham'][1] = $model->tk_huyen_vipham($data['diaban'][1], $date, $pre_date);
		$data['vipham'][2] = $model->tk_huyen_vipham($data['diaban'][2], $date, $pre_date);
		$data['vipham'][3] = $model->tk_huyen_vipham($data['diaban'][3], $date, $pre_date);
		$data['vipham'][4] = $model->tk_huyen_vipham($data['diaban'][4], $date, $pre_date);
		$data['vipham'][5] = $model->tk_huyen_vipham($data['diaban'][5], $date, $pre_date);
		$data['vipham'][6] = $model->tk_huyen_vipham($data['diaban'][6], $date, $pre_date);
		$data['vipham'][7] = $model->tk_huyen_vipham($data['diaban'][7], $date, $pre_date);
		$data['vipham'][8] = $model->tk_huyen_vipham($data['diaban'][8], $date, $pre_date);
		$data['vipham'][9] = $model->tk_huyen_vipham($data['diaban'][9], $date, $pre_date);
		$data['vipham'][10] = $model->tk_huyen_vipham($data['diaban'][10], $date, $pre_date);
		$data['vipham'][11] = $model->tk_huyen_vipham($data['diaban'][11], $date, $pre_date);
		$data['vipham'][12] = $model->tk_huyen_vipham($data['diaban'][12], $date, $pre_date);
		$data['vipham'][13] = $model->tk_huyen_vipham($data['diaban'][13], $date, $pre_date);
		$data['vipham'][14] = $model->tk_huyen_vipham($data['diaban'][14], $date, $pre_date);
		$data['vipham'][15] = $model->tk_huyen_vipham($data['diaban'][15], $date, $pre_date);
		$data['vipham'][16] = $model->tk_huyen_vipham($data['diaban'][16], $date, $pre_date);
		$data['vipham'][17] = $model->tk_huyen_vipham($data['diaban'][17], $date, $pre_date);
		$data['vipham'][18] = $model->tk_huyen_vipham($data['diaban'][18], $date, $pre_date);
		$data['vipham'][19] = $model->tk_huyen_vipham($data['diaban'][19], $date, $pre_date);
		$data['vipham'][20] = $model->tk_huyen_vipham($data['diaban'][20], $date, $pre_date);
		$data['vipham'][21] = $model->tk_huyen_vipham($data['diaban'][21], $date, $pre_date);
		$data['vipham'][22] = $model->tk_huyen_vipham($data['diaban'][22], $date, $pre_date);
		$data['vipham'][23] = $model->tk_huyen_vipham($data['diaban'][23], $date, $pre_date);
		$data['vipham'][24] = $model->tk_huyen_vipham($data['diaban'][24], $date, $pre_date);
		$data['vipham'][25] = $model->tk_huyen_vipham($data['diaban'][25], $date, $pre_date);
		$data['vipham'][26] = $model->tk_huyen_vipham($data['diaban'][26], $date, $pre_date);
		$data['vipham'][27] = $model->tk_huyen_vipham($data['diaban'][27], $date, $pre_date);
		$data['vipham'][28] = $model->tk_huyen_vipham($data['diaban'][28], $date, $pre_date);
		$view->thongke($data);
    }
	public function GetCountryName(){
		$model = new M_Admin();
        $keyword=$this->input->post('keyword');
        $data = $model->GetRow($keyword);
        echo json_encode($data);
    }
    public function status_chart()
    {
    	$model = new M_Admin();
    	$all_data = $model->get_number_dash();
    	$sum = $all_data['nhankhau'] + $all_data['hokhau'] + $all_data['tttv'] + $all_data['cktk'];

		// Tinh Phan Tram
		$percent['nhankhau'] = round($all_data['nhankhau'] / $sum * 100,2);
		$percent['hokhau'] = round($all_data['hokhau'] / $sum * 100,2);
		$percent['tttv'] = round($all_data['tttv'] / $sum * 100,2);
		$percent['cktk'] = round($all_data['cktk'] / $sum * 100,2);
		echo json_encode($percent);
    }
    public function export_nhankhau() {
		// create file name
        $fileName = 'nhankhau-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->nhankhau();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Số CMND');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ và tên');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tên khác');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Giới tính');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Ngày sinh');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Dân tộc');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tôn giáo');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Hộ khẩu thường trú');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Trình độ ngoại ngữ');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Nơi làm việc');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Chỗ ở hiện nay');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Quê quán');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Trình độ học vấn');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Nghề nghiệp');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Mã hộ khẩu');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Quan hệ với chủ hộ');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['socmnd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['hvt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['tenkhac']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['gt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['ns']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['dt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['tg']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['dc']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['trinhdonn']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['noilamviec']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['choohiennay']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['quequan']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['tdhocvan']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['nghenghiep']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['mahk']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['qhvchuho']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['ngay_tao_nk']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_hokhau() {
		// create file name
        $fileName = 'hokhau-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->hokhau();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Mã hộ khẩu');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tên chủ hộ');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hộ khẩu thường trú');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['mahk']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['tench']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['dc']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['ngay_tao_hk']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_tamtru() {
		// create file name
        $fileName = 'tamtru-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->tamtru();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Số CMND');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Khẩu hiện tại');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lý do');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Ngày bắt đầu');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày kết thúc');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tạm trú tại');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['socmnd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['khaucu']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['lydo']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['ngaybd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['ngaykt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['dc']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['ngay_tao_tttv']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_tamvang() {
		// create file name
        $fileName = 'tamvang-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->tamvang();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Số CMND');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Khẩu hiện tại');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lý do');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Ngày bắt đầu');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày kết thúc');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tạm vắng tại');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['socmnd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['khaucu']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['lydo']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['ngaybd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['ngaykt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['dc']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['ngay_tao_tttv']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_chuyenkhau() {
		// create file name
        $fileName = 'chuyenkhau-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->chuyenkhau();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Số CMND');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Khẩu cũ');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Khẩu mới');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Lý do');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['socmnd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['khaucu']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['khaumoi']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['lydo']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['ngayth']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_tachkhau() {
		// create file name
        $fileName = 'tachkhau-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->tachkhau();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Số CMND');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Khẩu cũ');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Khẩu mới');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Lý do');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['socmnd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['khaucu']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['khaumoi']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['lydo']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['ngayth']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_vipham() {
		// create file name
        $fileName = 'vipham-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->vipham();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Mã vi phạm');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Số CMND');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tội danh');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Hình phạt');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Đơn vị lập');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Người lập');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Ngày quyết định');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['mavp']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['socmnd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['toidanh']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['hinhphat']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['dvlap']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['nguoilap']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['ngay']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['ngaylap']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_nhanvien() {
		// create file name
        $fileName = 'nhanvien-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->nhanvien();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Mã nhân viên');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ và tên');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Giới tính');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Ngày sinh');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Số điện thoại');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Cấp bậc');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Chức vụ');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Đơn vị');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Quyền hạn');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Ngày tạo');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['manv']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['hvt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['gt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['ns']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['sdt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['capbac']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['chucvu']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['donvi']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['quyenhan']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['ngay_tao_nv']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
    public function export_diaban() {
		// create file name
        $fileName = 'diaban-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->diadiem();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Mã địa bàn');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tên địa bàn');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['madd']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['tendd']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('././res/exports/'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url('res/exports/').$fileName);   
    }
}
