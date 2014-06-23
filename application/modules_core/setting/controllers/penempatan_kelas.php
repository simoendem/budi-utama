<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Penempatan_kelas extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_permission');
		$this->load->model('m_tahun_ajaran');
		$this->load->model('m_extra');
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
		// get tahun ajaran
		$data['tahun']		= $this->m_tahun_ajaran->get_tahun_aktif();
		$data['ls_unit'] = $this->m_extra->get_unit();
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		
		$data['main_content'] = "setting/penempatan_kelas/penempatan";
		$this->load->view('dashboard/admin/template', $data);
	}	

	// page title
	public function page_title() {
		$data['page_title'] = 'Penempatan Kelas';
		$this->session->set_userdata($data);
	}
}
