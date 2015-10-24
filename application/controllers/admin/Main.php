<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 网站后台主页
* @author Phil Wong
* @email  siqitech@qq.com	
* www.udobe.cn
*/
class Main extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$admin_info = $this->session->userdata('admin_session');
		$params['admin_info'] = $admin_info;
		$this->load->vars($params);
	}

	/**
	 * 显示首页
	 */
	public function index()
	{
		$this->view('admin/main/main');
	}

	/**
	 * 后台首页左框架 菜单
	 */
	public function left()
	{
		$this->view('admin/main/left');
	}

	/**
	 * 后台首页顶框架 菜单
	 */
	public function top()
	{
		$this->view('admin/main/top');
	}
	/**
	 * 后台首页右框架 菜单
	 */
	public function home()
	{
		$this->view('admin/main/home');
	}
}
//end of home.php