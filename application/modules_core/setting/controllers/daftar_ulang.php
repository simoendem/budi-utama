<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Daftar_ulang extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_permission');
		$this->load->model('m_tahun_ajaran');		
		$this->load->model('m_daftar_ulang');
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
		// get tahun
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;		
		// get daftar siswa no daftar ulang yet
		$data['siswas']		= $this->m_daftar_ulang->get_siswa_no_daftar_ulang($thn);
		// load template
		$data['title']	= "Manage Students PinapleSAS";
		$data['main_content'] = "setting/daftar_ulang/list";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	public function add_process($nis = "")
	{
		// user_auth
		$this->check_auth('U');

		if ($nis == "") {
			redirect('setting/daftar_ulang/');
		}
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;

	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

		$params = array(
				'nis'			=> $nis,
				'tahun_ajaran' => $thn,
				'tgl_daftar'	=> $now
			);

		if ($this->m_daftar_ulang->daftar_ulang_siswa($params)) {
			$data['message'] = "Data successfully deleted";
		}
		$this->session->set_flashdata($data);		
		redirect('setting/daftar_ulang/');

	}
	// page title
	public function page_title() {
		$data['page_title'] = 'Daftar Ulang';
		$this->session->set_userdata($data);
	}
}
