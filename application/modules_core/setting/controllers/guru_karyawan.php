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
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|xss_clean|callback_check_nik');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim|xss_clean');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim|xss_clean');
		$this->form_validation->set_rules('warga_negara', 'Kewarganegaraan', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_guru_karyawan->add_ugk($this->input->post());
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('setting/guru_karyawan');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'nik'			=> $this->input->post('nik'),
				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'nama_panggilan'=> $this->input->post('nama_panggilan'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir'	=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
				'alamat'		=> $this->input->post('alamat'),
				'kota'			=> $this->input->post('kota'),
				'kode_pos'		=> $this->input->post('kode_pos'),
				'agama'			=> $this->input->post('agama'),
				'warga_negara'	=> $this->input->post('warga_negara'),
				'telpon_hp'		=> $this->input->post('telpon_hp'),
				'telpon_rumah'	=> $this->input->post('telpon_rumah'),
				'email'			=> $this->input->post('email'),
				'jabatan'		=> $this->input->post('jabatan'),
				'golongan'		=> $this->input->post('golongan'),
				//'foto'			=> $this->input->post('foto'),
				'tgl_mulai'		=> $this->input->post('tgl_mulai'),
				'tgl_keluar'	=> $this->input->post('tgl_keluar'),
				'keterangan_keluar'	=> $this->input->post('keterangan_keluar')
			);
			$this->session->set_flashdata($data);
			redirect('setting/guru_karyawan/add');
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
		// form validation
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|xss_clean');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim|xss_clean');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim|xss_clean');
		$this->form_validation->set_rules('warga_negara', 'Kewarganegaraan', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_guru_karyawan->edit_ugk($this->input->post());
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('setting/guru_karyawan');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'nik'			=> $this->input->post('nik'),
				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'nama_panggilan'=> $this->input->post('nama_panggilan'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir'	=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
				'alamat'		=> $this->input->post('alamat'),
				'kota'			=> $this->input->post('kota'),
				'kode_pos'		=> $this->input->post('kode_pos'),
				'agama'			=> $this->input->post('agama'),
				'warga_negara'	=> $this->input->post('warga_negara'),
				'telpon_hp'		=> $this->input->post('telpon_hp'),
				'telpon_rumah'	=> $this->input->post('telpon_rumah'),
				'email'			=> $this->input->post('email'),
				'jabatan'		=> $this->input->post('jabatan'),
				'golongan'		=> $this->input->post('golongan'),
				//'foto'			=> $this->input->post('foto'),
				'tgl_mulai'		=> $this->input->post('tgl_mulai'),
				'tgl_keluar'	=> $this->input->post('tgl_keluar'),
				'keterangan_keluar'	=> $this->input->post('keterangan_keluar')
			);
			$this->session->set_flashdata($data);
			redirect('setting/guru_karyawan/edit/'.$this->input->post('nik'));
		}
	}

	public function check_nik($id)
	{
		$cek=$this->m_guru_karyawan->get_ugk_by_id($id);
	    if (!empty($cek)){
			$this->form_validation->set_message('check_nik', 'NIK Guru & Karyawan is already used');
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
