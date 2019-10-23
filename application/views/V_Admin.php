<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_Admin
{
	
	public function index($data, $dateNews)
	{
		include "res/dashboard.php";
	}
	public function hokhau($data_table)
	{
		include "res/hokhau.php";
	}
	public function suahokhau($data, $mahk)
	{
		include "res/suahokhau.php";
	}
	public function themhokhau()
	{
		include "res/themhokhau.php";
	}
	public function xemhokhau($mahk, $data_table)
	{
		include "res/xemhokhau.php";
	}
	public function nhatkyhokhau($data_table)
	{
		include "res/nhatkyhokhau.php";
	}
	public function nhatkynhankhau($data_table)
	{
		include "res/nhatkynhankhau.php";
	}
	public function nhatkytamtru($data_table)
	{
		include "res/nhatkytamtru.php";
	}
	public function nhatkytamvang($data_table)
	{
		include "res/nhatkytamvang.php";
	}
	public function nhatkychuyenkhau($data_table)
	{
		include "res/nhatkychuyenkhau.php";
	}
	public function nhatkytachkhau($data_table)
	{
		include "res/nhatkytachkhau.php";
	}
	public function nhankhau($data_table)
	{
		include "res/nhankhau.php";
	}
	public function xemnhankhau($socmnd, $data_nhankhau)
	{
		include "res/xemnhankhau.php";
	}
	public function suanhankhau($socmnd, $data_nhankhau)
	{
		include "res/suanhankhau.php";
	}
	public function themnhankhau($data_hokhau)
	{
		include "res/themnhankhau.php";
	}
	public function tamtru($data_table)
	{
		include "res/tamtru.php";
	}
	public function suatamtru($nguoi, $data)
	{
		include "res/suatamtru.php";
	}
	public function themtamtru($nhankhau)
	{
		include "res/themtamtru.php";
	}
	public function tamvang($data_table)
	{
		include "res/tamvang.php";
	}
	public function suatamvang($nguoi, $data)
	{
		include "res/suatamvang.php";
	}
	public function themtamvang($nhankhau)
	{
		include "res/themtamvang.php";
	}
	public function chuyenkhau($data_table)
	{
		include "res/chuyenkhau.php";
	}
	public function themchuyenkhau($nhankhau, $hokhau)
	{
		include "res/themchuyenkhau.php";
	}
	public function suachuyenkhau($data, $nhankhau, $hokhau)
	{
		include "res/suachuyenkhau.php";
	}
	public function tachkhau($data_table)
	{
		include "res/tachkhau.php";
	}
	public function themtachkhau($nhankhau)
	{
		include "res/themtachkhau.php";
	}
	public function qldd($data_table)
	{
		include "res/diadiem.php";
	}
	public function vipham($data_table)
	{
		include "res/vipham.php";
	}
	public function suavipham($data)
	{
		include "res/suavipham.php";
	}
	public function themvipham($nhankhau)
	{
		include "res/themvipham.php";
	}
	public function nhanvien($data_table)
	{
		include "res/nhanvien.php";
	}
	public function suanhanvien($data)
	{
		include "res/suanhanvien.php";
	}
	public function themnhanvien()
	{
		include "res/themnhanvien.php";
	}
	public function thongke($data)
	{
		include "res/thongke.php";
	}
	// public function phongban($data_table)
	// {
	// 	include "res/phongban.php";
	// }
	// public function themphongban()
	// {
	// 	include "res/themphongban.php";
	// }
	// public function suaphongban($data)
	// {
	// 	include "res/suaphongban.php";
	// }
}