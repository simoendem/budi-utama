<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Daftar_ulang extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_permission');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get role list
		$data['rs_role'] = $this->m_role->get_all_role();
		// get permission list
		$data['rs_permission'] = $this->m_permission->get_all_permission();
		// load template
		$data['title']	= "Manage Students PinapleSAS";
		$data['main_content'] = "setting/daftar_ulang/list";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	// page title
	public function page_title() {
		$data['page_title'] = 'Daftar Ulang';
		$this->session->set_userdata($data);
	}
}
