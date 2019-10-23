<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
	public function get_number_dash()
	{
		$this->db->from('nhankhau');
		$data['nhankhau'] = $this->db->count_all_results();
		$this->db->from('hokhau');
		$data['hokhau'] = $this->db->count_all_results();
		$this->db->from('tttv');
		$data['tttv'] = $this->db->count_all_results();
		$this->db->from('cktk');
		$data['cktk'] = $this->db->count_all_results();
		return $data;
	}
	public function dateNews()
    {
    	// SELECT ngay_tao_nk FROM nhankhau ORDER BY ngay_tao_nk DESC LIMIT 0,1
    	$this->db->select('ngay_tao_nk')->from('nhankhau')->order_by('ngay_tao_nk', 'DESC')->limit(1);
    	$nhankhau = $this->db->get();
    	$i = 0;
    	foreach ($nhankhau->result_array() as $row) {
    		$date['ngay_tao_nk'] = $row['ngay_tao_nk'];
    		$i++;
    	}
    	if ($i > 0) {
    		$newTime['nhankhau'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($date['ngay_tao_nk'])) / (60*60*24));
    	}
    	else{
    		$newTime['nhankhau'] = 'Chưa có dữ liệu';
    	}

    	$this->db->select('ngay_tao_hk')->from('hokhau')->order_by('ngay_tao_hk', 'DESC')->limit(1);
    	$hokhau = $this->db->get();
    	$i = 0;
    	foreach ($hokhau->result_array() as $row) {
    		$date['ngay_tao_hk'] = $row['ngay_tao_hk'];
    		$i++;
    	}
    	if ($i > 0) {
    		$newTime['hokhau'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($date['ngay_tao_hk'])) / (60*60*24));
    	}
    	else{
    		$newTime['hokhau'] = 'Chưa có dữ liệu';
    	}

    	$this->db->select('ngayth')->from('cktk')->order_by('ngayth', 'DESC')->limit(1);
    	$cktk = $this->db->get();
    	$i = 0;
    	foreach ($cktk->result_array() as $row) {
    		$date['ngayth'] = $row['ngayth'];
    		$i++;
    	}
    	if ($i > 0) {
    		$newTime['cktk'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($date['ngayth'])) / (60*60*24));
    	}
    	else{
    		$newTime['cktk'] = 'Chưa có dữ liệu';
    	}

    	$this->db->select('ngay_tao_tttv')->from('tttv')->order_by('ngay_tao_tttv', 'DESC')->limit(1);
    	$tttv = $this->db->get();
    	$i = 0;
    	foreach ($tttv->result_array() as $row) {
    		$date['ngay_tao_tttv'] = $row['ngay_tao_tttv'];
    		$i++;
    	}
    	if ($i > 0) {
    		$newTime['tttv'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($date['ngay_tao_tttv'])) / (60*60*24));
    	}
    	else{
    		$newTime['tttv'] = 'Chưa có dữ liệu';
    	}
    	$this->db->select('ngay_tao_nv')->from('nhanvien')->order_by('ngay_tao_nv', 'DESC')->limit(1);
    	$nhanvien = $this->db->get();
    	foreach ($nhanvien->result_array() as $row) {
    		$date['ngay_tao_nv'] = $row['ngay_tao_nv'];
    	}
    	$newTime['nhanvien'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($date['ngay_tao_nv'])) / (60*60*24));
		return $newTime;
    }
    public function nhatkyhokhau()
	{
		$this->db->order_by('ngay_th', 'DESC');
		$query = $this->db->get('log_hokhau');
        return $query->result_array();
	}
	public function nhatkynhankhau()
	{
		$this->db->order_by('ngay_th', 'DESC');
		$query = $this->db->get('log_nhankhau');
        return $query->result_array();
	}
	public function nhatkytamtru()
	{
		$this->db->order_by('ngay_th', 'DESC');
		$this->db->where('loai', 'Tạm trú');
		$query = $this->db->get('log_tttv');
        return $query->result_array();
	}
	public function nhatkytamvang()
	{
		$this->db->order_by('ngay_th', 'DESC');
		$this->db->where('loai', 'Tạm vắng');
		$query = $this->db->get('log_tttv');
        return $query->result_array();
	}
	public function nhatkychuyenkhau()
	{
		$this->db->order_by('ngay_th', 'DESC');
		$this->db->where('loai', 'Chuyển khẩu');
		$query = $this->db->get('log_cktk');
        return $query->result_array();
	}
	public function nhatkytachkhau()
	{
		$this->db->order_by('ngay_th', 'DESC');
		$this->db->where('loai', 'Tách khẩu');
		$query = $this->db->get('log_cktk');
        return $query->result_array();
	}
	public function hokhau()
	{
		$query = $this->db->get('hokhau');
        return $query->result_array();
	}
	public function mot_hokhau($mahk)
	{
		$this->db->where('mahk', $mahk);
		$query = $this->db->get('hokhau');
        return $query->result_array();
	}
	public function delete_hokhau($mahk)
	{
		$this->db->where('mahk', $mahk);
		$this->db->delete('hokhau');
	}
	public function get_nhankhau($mahk)
	{
		$this->db->select('socmnd')->where('mahk', $mahk);
		$query = $this->db->get('nhankhau');
        return $query->result_array();
	}
	public function insert_log_hokhau($delete_data)
	{
		$this->db->insert('log_hokhau', $delete_data);
	}
	
	public function delete_nhankhau($socmnd)
	{
		$this->db->where('socmnd', $socmnd)->delete('tttv');
		$this->db->where('socmnd', $socmnd)->delete('cktk');
		$this->db->where('socmnd', $socmnd)->delete('nhankhau');
	}
	public function show_once_hk($mahk)
	{
		// SELECT * FROM nhankhau, hokhau WHERE hokhau.mahk = 'hk001' AND hokhau.mahk = nhankhau.mahk AND hokhau.tench = nhankhau.hvt
		$this->db->where('hokhau.mahk', $mahk)->where('hokhau.mahk = nhankhau.mahk')->where('hokhau.tench = nhankhau.hvt');
		$query = $this->db->get('nhankhau, hokhau');
        return $query->result_array();
	}
	public function check_cmnd($socmnd, $tench)
	{
		$this->db->from('nhankhau')->where('socmnd', $socmnd)->where('hvt', $tench);
		return $this->db->count_all_results();
	}
	public function update_chuhocu($mahk, $qhcu)
	{
		// UPDATE nhankhau SET qhvchuho = 'Chủ hộ cũ' WHERE mahk = 'hk001' AND qhvchuho = 'Chủ hộ'
		$this->db->set('qhvchuho', $qhcu);
		$this->db->where('mahk', $mahk);
		$this->db->where('qhvchuho', 'Chủ hộ');
		$this->db->update('nhankhau');
	}
	public function update_chuhomoi($mahk, $tench, $dc)
	{
		$this->db->set('tench', $tench);
		$this->db->set('dc', $dc);
		$this->db->where('mahk', $mahk);
		$this->db->update('hokhau');
	}
	public function doiten_chuho($ten_ch_moi, $mahk)
	{
		$this->db->set('tench', $ten_ch_moi);
		$this->db->where('mahk', $mahk);
		$this->db->update('hokhau');
	}
	public function set_chu_ho($mahk, $tench)
	{
		$this->db->set('tench', $tench);
		$this->db->where('mahk', $mahk);
		$this->db->update('hokhau');
	}
	public function update_nhankhau($mahk, $socmnd, $tench)
	{
		$this->db->set('qhvchuho', 'Chủ hộ');
		$this->db->where('mahk', $mahk);
		$this->db->where('socmnd', $socmnd);
		$this->db->where('hvt', $tench);
		$this->db->update('nhankhau');
	}
	public function check_mahk($mahk)
	{
		$this->db->from('hokhau')->where('mahk', $mahk);
		return $this->db->count_all_results();
	}
	public function them_ho_khau($add_data)
	{
		$this->db->insert('hokhau', $add_data);
	}
	public function thay_chu_ho($add_data)
	{
		$this->db->set('qhvchuho', 'Chủ hộ');
		$this->db->set('mahk', $add_data['mahk']);
		$this->db->where('socmnd', $add_data['socmnd']);
		$this->db->where('hvt', $add_data['hvt']);
		$this->db->update('nhankhau');
	}
	public function xemhokhau($mahk)
	{
		$this->db->where('mahk', $mahk);
		$query = $this->db->get('nhankhau');
        return $query->result_array();
	}
	public function nhankhau()
	{
		$query = $this->db->get('nhankhau');
        return $query->result_array();
	}
	public function mot_nhankhau($socmnd)
	{
		$this->db->where('socmnd', $socmnd);
		$query = $this->db->get('nhankhau');
        return $query->result_array();
	}
	public function insert_log_nhankhau($data)
	{
		$this->db->insert('log_nhankhau', $data);
	}
	public function suanhankhau($socmnd, $update_data)
	{
		$this->db->where('socmnd', $socmnd);
		$this->db->update('nhankhau', $update_data);
	}
	public function addnhankhau($add_data)
	{
		$this->db->insert('nhankhau', $add_data);
	}
	public function check_only_cmnd($socmnd)
	{
		$this->db->from('nhankhau')->where('socmnd', $socmnd);
		return $this->db->count_all_results();
	}
	public function tamtru()
	{
		$this->db->where('loai', 'Tạm trú');
		$query = $this->db->get('tttv');
        return $query->result_array();
	}
	public function insert_log_tttv($data)
	{
		$this->db->insert('log_tttv', $data);
	}
	public function show_tamtru($id)
	{
		$this->db->where('loai', 'Tạm trú');
		$this->db->where('id', $id);
		$query = $this->db->get('tttv');
        return $query->result_array();
	}
	public function suatamtru($id, $update_data)
	{
		$this->db->where('id', $id);
		$this->db->update('tttv', $update_data);
	}
	public function xoatamtru($id)
	{
		$this->db->where('id', $id)->delete('tttv');
	}
	public function themtamtru($add_data)
	{
		$this->db->insert('tttv', $add_data);
	}
	public function tamvang()
	{
		$this->db->where('loai', 'Tạm vắng');
		$query = $this->db->get('tttv');
        return $query->result_array();
	}
	public function show_tamvang($id)
	{
		$this->db->where('loai', 'Tạm vắng');
		$this->db->where('id', $id);
		$query = $this->db->get('tttv');
        return $query->result_array();
	}
	public function suatamvang($id, $update_data)
	{
		$this->db->where('id', $id);
		$this->db->update('tttv', $update_data);
	}
	public function xoatamvang($id)
	{
		$this->db->where('id', $id)->delete('tttv');
	}
	public function themtamvang($add_data)
	{
		$this->db->insert('tttv', $add_data);
	}
	public function chuyenkhau()
	{
		$this->db->where('loai', 'Chuyển khẩu');
		$query = $this->db->get('cktk');
        return $query->result_array();
	}
	public function check_khau_ca_nhan($mahk)
	{
		$this->db->from('nhankhau')->where('mahk', $mahk);
		return $this->db->count_all_results();
	}
	public function update_chuyenkhau_nhankhau($qhvchuho, $add_data)
	{
		$this->db->set('mahk', $add_data['khaumoi']);
		$this->db->set('qhvchuho', $qhvchuho.' - chuyển từ khẩu '.$add_data['khaucu']);
		$this->db->where('socmnd', $add_data['socmnd']);
		$this->db->update('nhankhau');
	}
	public function themchuyenkhau($add_data)
	{
		$this->db->insert('cktk', $add_data);
	}
	public function insert_log_cktk($data)
	{
		$this->db->insert('log_cktk', $data);
	}
	public function select_cktk_nhankhau($id)
	{
		// SELECT * FROM cktk, nhankhau WHERE cktk.id = 3 AND cktk.socmnd = nhankhau.socmnd
		$this->db->where('cktk.id', $id);
		$this->db->where('cktk.socmnd = nhankhau.socmnd');
		$query = $this->db->get('cktk, nhankhau');
        return $query->result_array();
	}
	public function update_lai_nhankhau($socmnd, $khaucu, $qhvchuho)
	{
		$this->db->set('mahk', $khaucu);
		$this->db->set('qhvchuho', $qhvchuho);
		$this->db->where('socmnd', $socmnd);
		$this->db->update('nhankhau');
	}
	public function xoachuyenkhau($id)
	{
		$this->db->where('id', $id)->delete('cktk');
	}
	public function show_chuyenkhau($id)
	{
		$this->db->where('loai', 'Chuyển khẩu');
		$this->db->where('id', $id);
		$query = $this->db->get('cktk');
        return $query->result_array();
	}
	public function suachuyenkhau($id, $update_data)
	{
		$this->db->where('id', $id);
		$this->db->update('cktk', $update_data);
	}
	public function update_suachuyenkhau_nhankhau($update_data)
	{
		$this->db->set('mahk', $add_data['khaumoi']);
		$this->db->where('socmnd', $add_data['socmnd']);
		$this->db->update('nhankhau');
	}
	public function tachkhau()
	{
		$this->db->where('loai', 'Tách khẩu');
		$query = $this->db->get('cktk');
        return $query->result_array();
	}
	public function themtachkhau($add_data)
	{
		$this->db->insert('cktk', $add_data);
	}
	public function update_nhankhau_tachkhau($socmnd, $khaumoi, $khaucu)
	{
		$this->db->set('mahk', $khaumoi);
		$this->db->set('qhvchuho', 'Chủ hộ');
		$this->db->where('socmnd', $socmnd);
		$this->db->update('nhankhau');
	}
	public function GetRow($keyword) {        
        $this->db->order_by('tendd', 'ASC');
        $this->db->like("tendd", $keyword);
        return $this->db->get('diadiem')->result_array();
    }
    public function diadiem()
    {
    	$query = $this->db->get('diadiem');
        return $query->result_array();
    }
    public function importData($fetchData)
    {
    	 $this->db->insert_batch('diadiem', $fetchData);
    }
    public function xoadiadiem()
    {
    	$this->db->delete('diadiem');
    }
    public function vipham()
    {
		$this->db->where('vipham.socmnd = nhankhau.socmnd');
    	$query = $this->db->get('vipham, nhankhau');
        return $query->result_array();
    }
    public function xoavipham($id)
    {
    	$this->db->where('mavp', $id)->delete('vipham');
    }
    public function show_vipham($id)
    {
		$this->db->where('vipham.mavp', $id)->where('vipham.socmnd = nhankhau.socmnd');
		$query = $this->db->get('vipham, nhankhau');
        return $query->result_array();
    }
    public function update_vipham($update_data)
    {
		$this->db->where('mavp', $update_data['mavp']);
		$this->db->update('vipham', $update_data);
    }
    public function themvipham($add_data)
    {
		$this->db->insert('vipham', $add_data);
    }
    public function nhanvien()
    {
    	$query = $this->db->get('nhanvien');
        return $query->result_array();
    }
    public function xoanhanvien($manv)
    {
    	$this->db->where('manv', $manv)->delete('nhanvien');
    }
    public function mot_nhanvien($manv)
    {
    	$this->db->where('manv', $manv);
    	$query = $this->db->get('nhanvien');
        return $query->result_array();
    }
    public function update_nhanvien($update_data, $manv)
    {
    	$this->db->where('manv', $manv);
		$this->db->update('nhanvien', $update_data);
    }
    public function themnhanvien($add_data)
    {
		$this->db->insert('nhanvien', $add_data);
    }
    public function tk_huyen_nhankhau($like, $date, $pre_date)
    {
    	// SELECT * FROM diadiem, nhankhau WHERE diadiem.tendd = nhankhau.dc AND diadiem.tendd LIKE '%Thành phố Bắc Ninh%' AND nhankhau.ngay_tao_nk <= '2019-03-28' AND nhankhau.ngay_tao_nk >= '2000-01-01'
    	$this->db->where('nhankhau.ngay_tao_nk <=', $date)->where('nhankhau.ngay_tao_nk >=', $pre_date);
    	$this->db->where('diadiem.tendd = nhankhau.dc')->like('diadiem.tendd', $like)->from('diadiem, nhankhau');
    	return $this->db->count_all_results();
    }
    public function tk_huyen_hokhau($like, $date, $pre_date)
    {
    	$this->db->where('hokhau.ngay_tao_hk <=', $date)->where('hokhau.ngay_tao_hk >=', $pre_date);
    	$this->db->where('diadiem.tendd = hokhau.dc')->like('diadiem.tendd', $like)->from('diadiem, hokhau');
    	return $this->db->count_all_results();
    }
    public function tk_huyen_tttv($like, $date, $pre_date)
    {
    	// SELECT * FROM diadiem, tttv WHERE diadiem.tendd = tttv.dc AND diadiem.tendd LIKE '%Thành phố Bắc Ninh%'
    	$this->db->where('tttv.ngay_tao_tttv <=', $date)->where('tttv.ngay_tao_tttv >=', $pre_date);
    	$this->db->where('diadiem.tendd = tttv.dc')->like('diadiem.tendd', $like)->from('diadiem, tttv');
    	return $this->db->count_all_results();
    }
    public function tk_huyen_vipham($like, $date, $pre_date)
    {
    	// SELECT * FROM diadiem, vipham, nhankhau WHERE diadiem.tendd = nhankhau.dc AND diadiem.tendd LIKE '%Thành phố Bắc Ninh%' AND vipham.socmnd = nhankhau.socmnd
    	$this->db->where('vipham.ngaylap <=', $date)->where('vipham.ngaylap >=', $pre_date);
    	$this->db->where('diadiem.tendd = nhankhau.dc')->like('diadiem.tendd', $like)->where('vipham.socmnd = nhankhau.socmnd')->from('diadiem, vipham, nhankhau');
    	return $this->db->count_all_results();
    }
}