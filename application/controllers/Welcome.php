<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 网站首页主页
* @author Phil Wong
* @email  siqitech@qq.com	
* www.udobe.cn
*/
class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 显示首页
	 */
	public function index()
	{
		$this->load->view('front/home');
	}
}
//end of home.php