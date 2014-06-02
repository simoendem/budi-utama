<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Role extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_portal');
		$this->load->model('m_role');
		// load role
		$this->load->helper('text');
		// page title
		$this->page_title();
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get role list
		$data['rs_role'] = $this->m_role->get_all_role();
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']	= "Setup Role PinapleSAS";
		$data['main_content'] = "setting/role/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add
	public function add() {
		// user_auth
		$this->check_auth('C');

		// menu
		$data['menu'] = $this->menu();
		// get portal list
		$data['rs_portal'] = $this->m_portal->get_all_portal();
		// user detail
		$data['user'] = $this->user;
		// load template
		$data['title']	= "Add Role PinapleSAS";
		$data['main_content'] = "setting/role/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('portal_id', 'Portal', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_name', 'Name', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('role_desc', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_default_url', 'Default URL', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_st', 'Status', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array($this->input->post('portal_id'), $this->input->post('role_name'), $this->input->post('role_desc'), $this->input->post('role_default_url'), $this->input->post('role_st'), $this->input->post('user_id'));
			if ($this->m_role->add_role($params)) {
				$data['message'] = "Data successfully added";
			}
			$this->session->set_flashdata($data);
			redirect('setting/role');
		} else {
			$data = array(
				'message'			=> str_replace("\n", "", validation_errors()),
				'portal_id'			=> $this->input->post('portal_id'),
				'role_name'			=> $this->input->post('role_name'),
				'role_desc'			=> $this->input->post('role_desc'),
				'role_default_url'	=> $this->input->post('role_default_url'),
				'role_st'			=> $this->input->post('role_st')
			);
			$this->session->set_flashdata($data);
			redirect('setting/role/add');
		}
	}

	// edit
	public function edit($role_slug = "") {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['rs_portal'] = $this->m_portal->get_all_portal();
		// get role list
		$data['result'] = $this->m_role->get_role_by_slug($role_slug);
		// load template
		$data['title']	= "Setup Role PinapleSAS";
		$data['main_content'] = "setting/role/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('portal_id', 'Portal', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_name', 'Name', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('role_desc', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_default_url', 'Default URL', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_st', 'Status', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array($this->input->post('portal_id'), $this->input->post('role_name'), $this->input->post('role_desc'), $this->input->post('role_default_url'), $this->input->post('role_st'), $this->input->post('role_id'));
			if ($this->m_role->edit_role($params)) {
				$data['message'] = "Data successfully edited";
			}
			$this->session->set_flashdata($data);
			redirect('setting/role');
		} else {
			$data = array(
				'message'			=> str_replace("\n", "", validation_errors()),
				'role_name'			=> $this->input->post('role_name'),
				'role_desc'			=> $this->input->post('role_desc'),
				'role_default_url'	=> $this->input->post('role_default_url'),
				'role_st'			=> $this->input->post('role_st')
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/role/edit/' . $this->input->post('role_id'));
	}

	// delete
	public function delete($role_slug = "") {
		// user_auth
		$this->check_auth('D');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get role list
		$data['result'] = $this->m_role->get_role_by_slug($role_slug);
		// load template
		$data['title']	= "Delete Role PinapleSAS";
		$data['main_content'] = "setting/role/delete";
		$this->load->view('dashboard/admin/template', $data);
	}

	// delete process
	public function delete_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_id', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array($this->input->post('role_id'));
			if ($this->m_role->delete_role($params)) {
				$data['message'] = "Data successfully deleted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/role');
		} else {
			$data = array(
				'message'	=> str_replace("\n", "", validation_errors()),
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/role/delete/' . $this->input->post('role_id'));
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Role';
		$this->session->set_userdata($data);
	}
}
