<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 网站后台通道主页
* @author Phil Wong
* @email  siqitech@qq.com	
* www.udobe.cn
*/
class Access extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','admin');
	}

	/**
	 * 显示首页
	 */
	public function login()
	{
		$post_data = $this->input->post(null,true);
		if ($post_data) {
			$where = array(
				'account' 	=> $post_data['loginuser'],
				'password' 	=> md5($post_data['loginpwd']),
			);
			$admin_info = $this->admin->getOneAdminInfo($where);
			if ($admin_info) {
				unset($admin_info['password']);
				$this->session->set_userdata('admin_session',$admin_info);
				$this->admin->loginUpdate($admin_info['adminId']);
				redirect('/admin/Main');
			} else {
				redirect('/admin/Access/login');
			}
		} else {
			$this->view('admin/access/login');
		}
	}

	/**
	 * 验证密码正确性
	 */
	public function validatePasswd()
	{
		$ajax_data 	= $this->input->post(null,true);
		$password  	= $ajax_data['password'];
		$account 	= $ajax_data['account']; 
		$where 		= array(
			'account' 	=> $account,
			'password' 	=> md5($password),
		);
		$admin_info = $this->admin->getOneAdminInfo($where);
		if ($admin_info) {
			echo json_encode(array('code'=>1));
		} else {
			echo json_encode(array('code'=>0));
		}
	}

	/**
	 * 后台首页左框架 菜单
	 */
	public function logout()
	{
		if($this->session->has_userdata('admin_session')){
			$this->session->unset_userdata('admin_session');
		}
		redirect('/admin/Access/login');
	}
}
//end of Access.php