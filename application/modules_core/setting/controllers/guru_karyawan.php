<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Guru_karyawan extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
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
		$data['rs_guru_karyawan'] = $this->m_guru_karyawan->get_all_ugk();
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Guru & Karyawan PinapleSAS";
		$data['main_content'] = "setting/guru_karyawan/list";
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

	//	$data['rs_jabatan']  = $this->m_guru_karyawan->get_all_jabatan();
	//	$data['rs_golongan'] = $this->m_guru_karyawan->get_all_golongan();

		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Guru & Karyawan PinapleSAS";
		$data['main_content'] = "setting/guru_karyawan/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		//$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim|xss_clean|callback_check_tahun_ajaran');
		$this->form_validation->set_rules('mulai', 'Mulai', 'required|trim|xss_clean|max_length[10]');
		$this->form_validation->set_rules('akhir', 'Akhir', 'required|trim|xss_clean|max_length[10]|callback_check_less['.$this->input->post('mulai').']');
		$this->form_validation->set_rules('status', 'Status', 'required|trim|xss_clean|callback_check_status');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_tahun_ajaran->add_tahun_ajaran($this->input->post());
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'tahun_ajaran'	=> $this->input->post('tahun_ajaran'),
				'mulai'			=> $this->input->post('mulai'),
				'akhir'			=> $this->input->post('akhir'),
				'status'		=> $this->input->post('status'),
				'keterangan'	=> $this->input->post('keterangan')
			);
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran/add');
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

	//	$data['rs_jabatan']  = $this->m_guru_karyawan->get_all_jabatan();
	//	$data['rs_golongan'] = $this->m_guru_karyawan->get_all_golongan();
		$data['result'] = $this->m_guru_karyawan->get_ugk_by_id($id);
		// load template
		$data['title']	= "Edit Guru & Karyawan PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		$data['main_content'] = "setting/guru_karyawan/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim|xss_clean|callback_check_tahun_ajaran');
		$this->form_validation->set_rules('mulai', 'Mulai', 'required|trim|xss_clean|max_length[10]');
		$this->form_validation->set_rules('akhir', 'Akhir', 'required|trim|xss_clean|max_length[10]|callback_check_less['.$this->input->post('mulai').']');
		$this->form_validation->set_rules('status', 'Status', 'required|trim|xss_clean|callback_check_status');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_tahun_ajaran->edit_tahun_ajaran($this->input->post());
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'tahun_ajaran'	=> $this->input->post('tahun_ajaran'),
				'mulai'			=> $this->input->post('mulai'),
				'akhir'			=> $this->input->post('akhir'),
				'status'		=> $this->input->post('status'),
				'keterangan'	=> $this->input->post('keterangan')
			);
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran/edit/'.$this->input->post('id'));
		}
	}

	public function check_id_ugk($id)
	{
		$cek=$this->m_guru_karyawan->get_ugk_by_id($id);
	    if (!empty($cek)){
			$this->form_validation->set_message('check_id_ugk', 'ID Guru & Karyawan is already used');
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
		
		$params['nik']=$id;
		$this->m_guru_karyawan->delete_ugk($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('setting/guru_karyawan');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Guru & Karyawan';
		$this->session->set_userdata($data);
	}
}
