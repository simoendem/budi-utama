<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Extrakurikuler extends Admin_base {
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

	// list menu
	public function list_extra($id_unit = "") {
		// user_auth
		$this->check_auth('R');

		if ($id_unit == "") {
			redirect('setting/extrakurikuler/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['extras']				= $this->m_extra->get_extra_by_unit($id_unit);

		$data['unit']				= $this->m_extra->get_unit($id_unit);

		$data['message'] = $this->session->flashdata('message');

		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/extrakurikuler/list_extra";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add
	public function add($id_unit = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/extrakurikuler/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['extras']				= $this->m_extra->get_extra_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/extrakurikuler/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_harga', 'Harga', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

        	$params = array(
				'id_unit' 		=> $this->input->post('id_unit'), 
				'extrakurikuler' 	=> $this->input->post('extra_name'), 
				'biaya'	=> $this->input->post('extra_harga'),
				'date_created'	=> $now,
				'date_updated'	=> $now
			);

			if ($this->m_extra->add_extra($params)) {
				$data['message'] = "Data successfully added";
			}

			$this->session->set_flashdata($data);
			redirect('setting/extrakurikuler/list_extra/' . $this->input->post('id_unit'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'extra_name'		=> $this->input->post('extra_name'),
				'extra_harga'		=> $this->input->post('extra_harga'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('setting/extrakurikuler/add/' . $this->input->post('id_unit'));
	}

	// edit
	public function edit($id_unit = "", $id_extra = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/extrakurikuler');
		}
		if ($id_extra == "") {
			redirect('setting/extrakurikuler/list_extra/' . $id_extra);
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['extras']				= $this->m_extra->get_extra_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		$data['result']				= $this->m_extra->get_extra_detail($id_extra);
		// load template
		$data['title']			= "Setting Menu Pinaple Sas";
		$data['main_content']	= "setting/extrakurikuler/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('id_extra', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_harga', 'Harga', 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required|trim|xss_clean');


		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

	        $params = array(
				'extrakurikuler' 	=> $this->input->post('extra_name'), 
				'biaya'		=> $this->input->post('extra_harga'),
				'status'	=> $this->input->post('extra_harga'),
				'date_updated'	=> $now,
			);	

			if ($this->m_extra->edit_extra($this->input->post('id_extra'),$params)) {
				$data['message'] = "Data successfully edited";
			}
			$this->session->set_flashdata($data);
			redirect('setting/extrakurikuler/list_extra/' . $this->input->post('id_unit'));
		} else {
			$data['message'] = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'menu_name'		=> $this->input->post('menu_name'),
				'menu_desc'		=> $this->input->post('menu_desc'),
				'menu_url'		=> $this->input->post('menu_url'),
				'menu_order'	=> $this->input->post('menu_order'),
				'menu_icon'		=> $this->input->post('menu_icon'),
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/extrakurikuler/edit/' . $this->input->post('id_unit') . '/' . $this->input->post('id_extra'));
	}

	// delete
	public function delete($id_unit = "", $id_extra = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/extrakurikuler');
		}
		if ($id_extra == "") {
			redirect('setting/extrakurikuler/list_extra/' . $id_extra);
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['extras']				= $this->m_extra->get_extra_by_unit($id_unit);
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		$data['result']				= $this->m_extra->get_extra_detail($id_extra);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/extrakurikuler/delete";
		$this->load->view('dashboard/admin/template', $data);
	}

	// delete process
	public function delete_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('id_extra', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			if ($this->m_extra->delete_extra($this->input->post('id_extra'))) {
				$data['message'] = "Data successfully deleted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/extrakurikuler/list_extra/' . $this->input->post('id_unit'));
		} else {
			$data = array(
				'message'		=> validation_errors()
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/extrakurikuler/delete/' . $this->input->post('id_unit') . '/' . $this->input->post('id_extra'));
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Extrakurikuler';
		$this->session->set_userdata($data);
	}
}
