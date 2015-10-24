<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 自定义基类
* @author Phil Wong
* @email  siqitech@qq.com	
* www.udobe.cn
*/
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 自定义加载视图模型
	 */
	public function view($template,$data='')
	{
		if ($data) {
			$this->load->view($template,$data);
		} else {
			$this->load->view($template);
		}	
	}
}
//end of MY_Controller.php