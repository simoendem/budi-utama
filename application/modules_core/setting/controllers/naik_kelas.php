<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Naik_kelas extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_extra');		
		$this->load->model('m_permission');
		$this->load->model('m_kelas');
		$this->load->model('m_tahun_ajaran');
		$this->load->model('m_pendaftaran');
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
		// data tahun ajaran
		$data['tahun']		= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// data unit
		$data['ls_unit']	= $this->m_extra->get_unit();
		// data kelas
		$data['kelass']		= $this->m_kelas->get_kelas_buka_by_tahun($thn);
		// data siswa di kelas itu
				
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		
		$data['main_content'] = "setting/naik_kelas/grades";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	public function daftar_siswa()
	{
		// echo "<pre>";print_r($_POST);die;
		$id = '';
		foreach ($_POST as $value) {
			$id = $value['id_buka'];
		}
		// get assigned student
		$siswas	= $this->m_kelas->get_siswa_kelas($id);
		 //add the header here
	    header('Content-Type: application/json');
	    echo json_encode($siswas);		
    	// get assigned student
		// $data['siswas']	= $this->m_kelas->get_siswa_kelas();
	}
	//kurang jenjangnya ditambah
	//nek lulus dijadikan ALUMNI
	public function update_kesimpulan()
	{
        $this->load->helper('date');
        $datestring = '%Y-%m-%d %h:%i:%a';
        $time = time();
        $now = mdate($datestring, $time);

		// echo "<pre>";print_r($_POST);die;
		$id = '';
		foreach ($_POST as $value) {
			$id = $value['id'];
			$input = array(
				'status'		=> 'BERAKHIR',
				'kesimpulan'	=> $value['kesimpulan'],
				'tgl_dimasukan'	=> $now
				);
			// echo "<pre>"; print_r($input);die;
			// get assigned student
			$update = $this->m_kelas->update_siswa_kesimpulan($id,$input);

			$skl = $this->m_kelas->get_siswa_kelas_lengkap_row($id);	
			$jjg = $skl->jenjang;
			$jjs = $skl->jenjang_siswa;
			$tgkt= $jjs;
			$slsh= abs($jjs-$skl->tingkat);
			if($jjs<$jjg && $jjs>0 && ($slsh==0)){
				switch ($value['kesimpulan']) {
					case 'NAIK KELAS':
							$tgkt=$jjs+1;
						break;
					case 'TINGGAL KELAS':
							$tgkt=$skl->tingkat;
						break;
					default:
							$tgkt=$jjs;
						break;
				}
			}		

			$params  = array(
				'nis' => $skl->nis,
				'date_updated' => $now,
				'jenjang' => $tgkt
				);
			$this->m_pendaftaran->update_users_siswa_alumni($params);
		}
		 // //add the header here
	    header('Content-Type: application/json');
	    // echo json_encode($$_POST);		
    	// get assigned student
		// $data['siswas']	= $this->m_kelas->get_siswa_kelas();
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Naik/Tinggal Kelas';
		$this->session->set_userdata($data);
	}
}
