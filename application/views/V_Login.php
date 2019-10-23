<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_Login
{
	
	public function index()
	{
		include "res/login.php";
	}
	public function reset_password()
	{
		include "res/forgot_pass.php";
	}
}