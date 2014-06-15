<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Unit extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_unit');
		$this->load->model('m_guru_karyawan');
		// load user
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
		// get unit list
		$data['rs_unit'] = $this->m_unit->get_all_unit_completed();
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Unit PinapleSAS";
		$data['main_content'] = "setting/unit/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add
	public function add() {
		// user_auth
		$this->check_auth('C');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;

		$data['rs_parent'] = $this->m_unit->get_all_unit();
		$data['rs_kepala'] = $this->m_guru_karyawan->get_all_ugk();

		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Unit PinapleSAS";
		$data['main_content'] = "setting/unit/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', 'ID Unit', 'required|trim|xss_clean|callback_check_id_unit');
		$this->form_validation->set_rules('unit', 'Nama Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('jenjang', 'Jenjang', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params=$this->input->post();

			$this->m_unit->add_unit($params);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('setting/unit');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id_unit'		=> $this->input->post('id_unit'),
				'id_parent'		=> $this->input->post('id_parent'),
				'unit'			=> $this->input->post('unit'),
				'kategori'		=> $this->input->post('kategori'),
				'jenjang'		=> $this->input->post('jenjang'),
				//'logo'		=> $this->input->post('status'),
				'nama_kepala'	=> $this->input->post('nama_kepala'),
				'no_registrasi'	=> $this->input->post('no_registrasi'),
				'no_telpon'		=> $this->input->post('no_telpon'),
				'email'			=> $this->input->post('email'),
				'alamat'		=> $this->input->post('alamat'),
				'kota'			=> $this->input->post('kota'),
				'kecamatan'		=> $this->input->post('kecamatan'),
				'kelurahan'		=> $this->input->post('kelurahan'),
				'no_fax'		=> $this->input->post('no_fax'),
				'email'			=> $this->input->post('email')
			);
			$this->session->set_flashdata($data);
			redirect('setting/unit/add');
		}
	}

	// edit
	public function edit($id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get tahun ajaran row
		$data['rs_parent'] = $this->m_unit->get_all_unit_except_self($id);
		$data['rs_kepala'] = $this->m_guru_karyawan->get_all_ugk();
		$data['result'] = $this->m_unit->get_unit_by_id($id);
		// load template
		$data['title']	= "Edit Unit PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		$data['main_content'] = "setting/unit/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('id_unit', 'ID Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('unit', 'Nama Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('jenjang', 'Jenjang', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params=$this->input->post();

			$this->m_unit->edit_unit($params);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('setting/unit');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id_unit'		=> $this->input->post('id_unit'),
				'id_parent'		=> $this->input->post('id_parent'),
				'unit'			=> $this->input->post('unit'),
				'kategori'		=> $this->input->post('kategori'),
				'jenjang'		=> $this->input->post('jenjang'),
				//'logo'		=> $this->input->post('status'),
				'nama_kepala'	=> $this->input->post('nama_kepala'),
				'no_registrasi'	=> $this->input->post('no_registrasi'),
				'no_telpon'		=> $this->input->post('no_telpon'),
				'email'			=> $this->input->post('email'),
				'alamat'		=> $this->input->post('alamat'),
				'kota'			=> $this->input->post('kota'),
				'kecamatan'		=> $this->input->post('kecamatan'),
				'kelurahan'		=> $this->input->post('kelurahan'),
				'no_fax'		=> $this->input->post('no_fax'),
				'email'			=> $this->input->post('email')
			);
			$this->session->set_flashdata($data);
			redirect('setting/unit/edit/'.$this->input->post('id_unit'));
		}
	}

	public function check_id_unit($id)
	{
		$cek=$this->m_unit->get_unit_by_id($id);
	    if (!empty($cek)){
			$this->form_validation->set_message('check_id_unit', 'ID Unit is already used');
			return false;       
		}
		else{
	        return true;
      	}
	}

	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id_unit']=$id;
		$this->m_unit->delete_unit($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('setting/unit');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Unit';
		$this->session->set_userdata($data);
	}
}
