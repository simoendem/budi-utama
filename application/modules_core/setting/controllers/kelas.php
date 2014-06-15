<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Kelas extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_portal');
		$this->load->model('m_extra');
		$this->load->model('m_kelas');
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
		$data['ls_unit']			= $this->m_extra->get_unit();
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/kelas/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// list menu
	public function list_kelas($id_unit = "") {
		// user_auth
		$this->check_auth('R');

		if ($id_unit == "") {
			redirect('setting/kelas/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);

		$data['message'] = $this->session->flashdata('message');

		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/kelas/list_kelas";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add
	public function add($id_unit = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/kelas/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/kelas/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kelas_name', 'Nama', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kelas_tingkat', 'Tingkat', 'required|trim|xss_clean|integer');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

        	$params = array(
				'kelas' 		=> $this->input->post('kelas_name'), 
				'tingkat' 	=> $this->input->post('kelas_tingkat'), 
				'id_unit'	=> $this->input->post('id_unit'),
				'date_created'	=> $now,
				'date_updated'	=> $now
			);

			if ($this->m_kelas->add_kelas($params)) {
				$data['message'] = "Data successfully added";
			}

			$this->session->set_flashdata($data);
			redirect('setting/kelas/list_kelas/' . $this->input->post('id_unit'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'kelas_name'		=> $this->input->post('kelas_name'),
				'kelas_tingkat'		=> $this->input->post('kelas_tingkat'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('setting/kelas/add/' . $this->input->post('id_unit'));
	}

	// edit
	public function edit($id_unit = "", $id_kelas = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/kelas');
		}
		if ($id_kelas == "") {
			redirect('setting/kelas/list_kelas/' . $id_kelas);
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// load template
		$data['result']				= $this->m_kelas->get_kelas_detail($id_kelas);
		// load template
		$data['title']			= "Setting Menu Pinaple Sas";
		$data['main_content']	= "setting/kelas/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kelas_name', 'Nama', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kelas_tingkat', 'Tingkat', 'required|trim|xss_clean|integer');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

	        $params = array(
				'kelas' 		=> $this->input->post('kelas_name'), 
				'tingkat' 	=> $this->input->post('kelas_tingkat'), 
				'id_unit'	=> $this->input->post('id_unit'),
				'date_updated'	=> $now
			);	

			if ($this->m_kelas->edit_kelas($this->input->post('id'),$params)) {
				$data['message'] = "Data successfully edited";
			}
			$this->session->set_flashdata($data);
			redirect('setting/kelas/list_kelas/' . $this->input->post('id_unit'));
		} else {
			$data['message'] = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'kelas_name'		=> $this->input->post('kelas_name'),
				'kelas_tingkat'		=> $this->input->post('kelas_tingkat'),
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/kelas/edit/' . $this->input->post('id_unit') . '/' . $this->input->post('id'));
	}

	// delete
	public function delete($id_unit = "", $id_kelas = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/kelas');
		}
		if ($id_kelas == "") {
			redirect('setting/kelas/list_kelas/' . $id_kelas);
		}

		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// load template
		$data['result']				= $this->m_kelas->get_kelas_detail($id_kelas);
		// load template

		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/kelas/delete";
		$this->load->view('dashboard/admin/template', $data);
	}

	// delete process
	public function delete_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('id', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			if ($this->m_kelas->delete_kelas($this->input->post('id'))) {
				$data['message'] = "Data successfully deleted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/kelas/list_kelas/' . $this->input->post('id_unit'));
		} else {
			$data = array(
				'message'		=> validation_errors()
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/kelas/delete/' . $this->input->post('id_unit') . '/' . $this->input->post('id'));
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Kelas';
		$this->session->set_userdata($data);
	}
}
