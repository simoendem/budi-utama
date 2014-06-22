<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Buka_kelas extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_portal');
		$this->load->model('m_extra');
		$this->load->model('m_kelas');
		$this->load->model('m_tahun_ajaran');

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
		// get tahun ajaran
		$data['tahun']		= $this->m_tahun_ajaran->get_tahun_aktif();
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/buka_kelas/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// list menu
	public function list_buka($id_unit = "") {
		// user_auth
		$this->check_auth('R');

		if ($id_unit == "") {
			redirect('setting/buka_kelas/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_buka_by_unit_tahun($id_unit,$thn);
		// get unit
		$data['unit']				= $this->m_extra->get_unit($id_unit);

		// get succes/error message
		$data['message'] = $this->session->flashdata('message');

		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/buka_kelas/list_buka";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add
	public function add($id_unit = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/buka_kelas/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get all possible class to open
		$data['kelass']				= $this->m_kelas->get_kelas_option_by_unit($id_unit);
		//
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/buka_kelas/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {

		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');


		if ($this->form_validation->run() == TRUE) {
			// insert

		foreach ($_POST as $value) 
			{
				if (isset($value['check']))
				{
					$params = array(
						'id_kelas' 		=> $value['id_kelas'],
		            	'id_unit' 	=> $value['id_unit'],
		            	'tahun_ajaran' 	=> $value['tahun_ajaran']
		            	);
					$this->m_kelas->add_buka_kelas($params);
				}
				// echo "<pre>"; print_r($_POST); die;

			}

			$data['message'] = "Data successfully added";

			$this->session->set_flashdata($data);
			redirect('setting/buka_kelas/list_buka/' . $this->input->post('id_unit'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'kelas_name'		=> $this->input->post('kelas_name'),
				'kelas_tingkat'		=> $this->input->post('kelas_tingkat'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('setting/buka_kelas/add/' . $this->input->post('id_unit'));
	}

	// delete
	public function delete($id_unit = "", $id_buka = "") {
		// user_auth
		$this->check_auth('U');

		if ($id_unit == "") {
			redirect('setting/buka_kelas');
		}
		if ($id_buka == "") {
			redirect('setting/buka_kelas/list_buka/' . $id_unit);
		}

		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_buka_by_unit_tahun($id_unit,$thn);
		// get unit
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// load template
		$data['result']				= $this->m_kelas->get_kelas_buka_by_unit_tahun_detail($id_buka);
		// load template

		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/buka_kelas/delete";
		$this->load->view('dashboard/admin/template', $data);
	}

	// delete process
	public function delete_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('id_buka', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			if ($this->m_kelas->delete_kelas_buka($this->input->post('id_buka'))) {
				$data['message'] = "Data successfully deleted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/buka_kelas/list_buka/' . $this->input->post('id_unit'));
		} else {
			$data = array(
				'message'		=> validation_errors()
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/buka_kelas/delete/' . $this->input->post('id_unit') . '/' . $this->input->post('id'));
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Buka Kelas';
		$this->session->set_userdata($data);
	}
}
