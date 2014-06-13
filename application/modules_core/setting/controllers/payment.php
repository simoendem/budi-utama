<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Payment extends Admin_base {
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
		$data['title']	= "Payment Transactions PinapleSAS";
		$data['main_content'] = "setting/payment/list";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	public function details($id)
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		
		// user detail
		$data['user'] = $this->user;
		// get role list
		$data['rs_role'] = $this->m_role->get_all_role();
		// get permission list
		$data['rs_permission'] = $this->m_permission->get_all_permission();
		$data['id_students'] = $id;
		// load template
		$data['title']	= "Detail Payment Transactions PinapleSAS";
		$data['main_content'] = "setting/payment/details";
		$this->load->view('dashboard/admin/template', $data);
	}	

	// edit
/*
	public function edit($role_slug = "") {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get role detail
		$data['result'] = $this->m_role->get_role_by_slug($role_slug);
		// get menu list
		$data['rs_menu'] = $this->m_menu->get_all_menu_by_portal_role(array($role_slug, $role_slug, $data['result']['portal_id']));
		// load template
		$data['title']	= "Edit Permission PinapleSAS";
		$data['main_content'] = "setting/payment/edit";
		$this->load->view('dashboard/admin/template', $data);
	}
*/

	// edit process
/*
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_id', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// delete and then insert permission
			$params = array($this->input->post('role_id'), $this->input->post('permission'));
			$this->m_permission->delete_permission($params);
			if ($this->m_permission->edit_permission($params)) {
				$data['message'] = "Permission successfully granted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/permission');
		} else {
			$data = array(
				'message'	=> str_replace("\n", "", validation_errors())
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/permission/edit/' . $this->input->post('role_id'));
	}
*/

	// page title
	public function page_title() {
		$data['page_title'] = 'Payment';
		$this->session->set_userdata($data);
	}
}
