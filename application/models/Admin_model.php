<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 管理员数据模型
*/
class Admin_model extends CI_Model
{
	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'admin';
	}

	/**
	 * 根据条件获取管理员数据信息
	 */
	public function getOneAdminInfo($where)
	{
		return $this->db->from($this->table)->where($where)->get()->row_array();
	}

	/**
	 * 登陆更新
	 */
	public function loginUpdate($adminId)
	{
		$data = array(
			'loginTime' => time(),
			'loginIp' 	=> ip2long($_SERVER['REMOTE_ADDR']),
		);
		$this->db->update($this->table,$data,'adminId = '.$adminId);
		return $this->db->affected_rows();
	}
}