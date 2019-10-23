<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
	public function check_account($email, $password)
	{
		$this->db->from('nhanvien')->where('email', $email)->where('password', $password);
		return $this->db->count_all_results();
	}
	public function show_account($email, $password)
	{
		$this->db->from('nhanvien')->where('email', $email)->where('password', $password);
		$query = $this->db->get();
        return $query->result_array();
	}
	public function check_email($email)
	{
		$this->db->from('nhanvien')->where('email', $email);
		return $this->db->count_all_results();
	}
	public function set_code($email, $code)
	{
		$this->db->set('code', $code);
		$this->db->where('email', $email);
		$this->db->update('nhanvien');
	}
	public function check_code($email, $code)
	{
		$this->db->from('nhanvien')->where('email', $email)->where('code', $code);
		return $this->db->count_all_results();
	}
	public function change_pass($email, $newpass, $code)
	{
		$this->db->set('password', $newpass);
		$this->db->set('code', '');
		$this->db->where('email', $email);
		$this->db->update('nhanvien');
	}
}