<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Coba extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_portal');
		$this->load->model('m_extra');
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal list
		$data['extras']				= $this->m_extra->get_unit();
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/extrakurikuler/list";
		$this->load->view('dashboard/admin/template', $data);
	}


	// page title
	public function page_title() {
		$data['page_title'] = 'Coba';
		$this->session->set_userdata($data);
	}
}
