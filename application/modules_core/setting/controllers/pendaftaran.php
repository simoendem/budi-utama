<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Pendaftaran extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_permission');
		$this->load->model('m_extra');
		$this->load->model('m_pendaftaran');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();
	}

	//menampilkan semua siswa yang mendaftar berdasarkan unit
	public function index()
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// unit list
		$data['ls_unit']			= $this->m_extra->get_unit();
		// load template
		$data['title']	= "Manage Students PinapleSAS";
		$data['main_content'] = "setting/pendaftaran/list";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	//registrasi untuk siswa baru
	public function siswa_baru()
	{
	// user_auth
		$this->check_auth('C');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// unit list
		$data['ls_unit'] = $this->m_extra->get_unit();

		$data['message'] = $this->session->flashdata('message');
		// load template
		$data['title']	= "New Registration form PinapleSAS";		
		$data['main_content'] = "setting/pendaftaran/siswa_baru";
		$this->load->view('dashboard/admin/template', $data);
	}	

	public function add_process()
	{
        $this->load->helper('date');
        $datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $now = mdate($datestring, $time);

		// echo "<pre>"; print_r($_POST); die;

		foreach ($_POST as $value) {
			if ($value['profil'] == 'yes') {
				$input = array(
					'thn_ajaran_mulai' => $value['siswa_tahun_mulai'],
		            'jenjang_mulai' => $value['siswa_jenjang'],
		            'id_unit' => $value['siswa_kelas'],
		            'nis' => $value['siswa_nis'],
		            'nama_lengkap' => $value['siswa_nama_lengkap'],
		            'nama_panggilan' => $value['siswa_nama_panggilan'],
		            'jenis_kelamin' => $value['siswa_jk'],
		            'tempat_lahir' => $value['siswa_tempat_lahir'],
		            'tanggal_lahir' => $value['siswa_tgl_lahir'],
		            'anak_ke' => $value['siswa_anak_ke'],
		            'jmlh_saudara' => $value['siswa_saudara'],
		            'alamat' => $value['siswa_alamat'],
		            'agama' => $value['siswa_agama'],
		            'kewarganegaraan' => $value['siswa_kewarganegaraan'],
		            'asal_sekolah' => $value['siswa_sekolah_asal'],
		            'nama_lengkap_ayah' => $value['nama_lengkap_ayah'],
		            'tempat_lahir_ayah' => $value['tempat_lahir_ayah'],
		            'tanggal_lahir_ayah' => $value['tgl_lahir_ayah'],
		            'hp_ayah' => $value['hp_ayah'],
		            'pekerjaan_ayah' => $value['pekerjaan_ayah'],
		            'penghasilan_ayah' => $value['penghasilan_ayah'],
		            'kewarganegaraan_ayah' => $value['kewarganegaraan_ayah'],
		            'nama_lengkap_ibu' => $value['nama_lengkap_ibu'],
		            'tempat_lahir_ibu' => $value['tempat_lahir_ibu'],
		            'tanggal_lahir_ibu' => $value['tgl_lahir_ibu'],
		            'hp_ibu' => $value['hp_ibu'],
		            'pekerjaan_ibu' => $value['pekerjaan_ibu'],
		            'penghasilan_ibu' => $value['penghasilan_ibu'],
		            'kewarganegaraan_ibu' => $value['kewarganegaraan_ibu'],
		            'tinggal_bersama' => $value['tinggal_bersama'],
		            'alamat_wali' => $value['alamat_lengkap'],
		            'telp_rumah' => $value['telpon_rumah'],
		            'nama_lengkap_wali' => $value['nama_lengkap_wali'],
		            'hp_wali' => $value['hp_wali'],
		            'pekerjaan_wali' => $value['pekerjaan_wali'],
		            'kewarganegaraan_wali' => $value['kewarganegaraan_wali'],
		            'status'		=> 'SISWA',
					'date_created'	=> $now,
					'date_updated'	=> $now
				);
				//masukan ke tabel siswa
				$insert = $this->m_pendaftaran->add_siswa_baru($input);
				//ambil id siswa
				$nis = $value['siswa_nis'];
			}
			else {
				$input = array(   
					'nis' => $nis,
			        'prestasi' => $value['nama_prestasi'],
			        'jenis' => $value['jenis_prestasi'],
			        'tingkat' => $value['tingkat_prestasi'],
			        'tahun' => $value['tahun_prestasi'],
					'date_created'	=> $now,
					'date_updated'	=> $now
				);
				//masukan ke tabel siswa_prestasi
				$insert = $this->m_pendaftaran->add_siswa_baru_prestasi($input);
			}
		}
		$data['message'] = "Data successfully added";
		$this->session->set_flashdata($data);
		redirect('setting/pendaftaran/siswa_baru');

	}

	public function import_excel_siswa()
	{
	// user_auth
		$this->check_auth('C');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// unit list
		$data['ls_unit'] = $this->m_extra->get_unit();

		// load template
		$data['title']	= "Import Siswa PinapleSAS";
		
		$data['main_content'] = "setting/pendaftaran/import_excel";
		$this->load->view('dashboard/admin/template', $data);		
	}

	public function import_process()
	{
		 $this->load->library('excel_reader');		
		$config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls|xlsx';
 
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload())
        {
            $data = array('error' => $this->upload->display_errors());
        	echo '<pre>';print_r($data); die; 
        }
        else
        {
        	// echo "berhasil upload";die;
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

            $data = array('error' => false);
            $upload_data = $this->upload->data();
 
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
 
            $file =  $upload_data['full_path'];
            $this->excel_reader->read($file);

            error_reporting(E_ALL ^ E_NOTICE);
 
            // Sheet 1
            $data = $this->excel_reader->sheets[0] ;
                        $dataexcel = Array();
            for ($i = 2; $i <= $data['numRows']; $i++) {
 
                if($data['cells'][$i][1] == '') break;            
		            $dataexcel[$i-1]['nis'] 			 	= $data['cells'][$i][1];
		            $dataexcel[$i-1]['nama_lengkap'] 		= $data['cells'][$i][2];
		            $dataexcel[$i-1]['nama_panggilan'] 		= $data['cells'][$i][3];
		            $dataexcel[$i-1]['jenis_kelamin']		= $data['cells'][$i][4];
		            $dataexcel[$i-1]['tempat_lahir']		= $data['cells'][$i][5];
		            $dataexcel[$i-1]['tanggal_lahir']		= $data['cells'][$i][6];
		            $dataexcel[$i-1]['anak_ke']				= $data['cells'][$i][7];
		            $dataexcel[$i-1]['jmlh_saudara']		= $data['cells'][$i][8];
		            $dataexcel[$i-1]['alamat'] 				= $data['cells'][$i][9];
		            $dataexcel[$i-1]['agama']				= $data['cells'][$i][10];
		            $dataexcel[$i-1]['kewarganegaraan']		= $data['cells'][$i][11];
		            $dataexcel[$i-1]['asal_sekolah']		= $data['cells'][$i][12];
					$dataexcel[$i-1]['thn_ajaran_mulai']	= $data['cells'][$i][13];
		            $dataexcel[$i-1]['jenjang_mulai'] 		= $data['cells'][$i][14];
		            $dataexcel[$i-1]['id_unit']				= $data['cells'][$i][15];
		            $dataexcel[$i-1]['nama_lengkap_ayah']	= $data['cells'][$i][16];
		            $dataexcel[$i-1]['tempat_lahir_ayah']	= $data['cells'][$i][17];
		            $dataexcel[$i-1]['tanggal_lahir_ayah']	= $data['cells'][$i][18];
		            $dataexcel[$i-1]['hp_ayah']				= $data['cells'][$i][19];
		            $dataexcel[$i-1]['pekerjaan_ayah']		= $data['cells'][$i][20];
		            $dataexcel[$i-1]['penghasilan_ayah']	= $data['cells'][$i][21];
		            $dataexcel[$i-1]['kewarganegaraan_ayah'] = $data['cells'][$i][22];
		            $dataexcel[$i-1]['nama_lengkap_ibu']	= $data['cells'][$i][23];
		            $dataexcel[$i-1]['tempat_lahir_ibu']	= $data['cells'][$i][24];
		            $dataexcel[$i-1]['tanggal_lahir_ibu']	= $data['cells'][$i][25];
		            $dataexcel[$i-1]['hp_ibu'] 				= $data['cells'][$i][26];
		            $dataexcel[$i-1]['pekerjaan_ibu']		= $data['cells'][$i][27];
		            $dataexcel[$i-1]['penghasilan_ibu']		= $data['cells'][$i][28];
		            $dataexcel[$i-1]['kewarganegaraan_ibu'] = $data['cells'][$i][29];
		            $dataexcel[$i-1]['alamat_wali'] 		= $data['cells'][$i][30];
		            $dataexcel[$i-1]['telp_rumah'] 			= $data['cells'][$i][31];
					$dataexcel[$i-1]['date_created']		= $now;
					$dataexcel[$i-1]['date_updated']		= $now;
            }

            // echo '<pre>'; print_r($dataexcel);die; 
            delete_files($upload_data['file_path']);
            $this->m_pendaftaran->add_siswa_import($dataexcel);
            // $data['user'] = $this->m_pendaftaran->getuser();
        }
        $data = array(
		     'message' => 'Data successfully imported'
	     );
		// echo $data['message']; die;
		$this->session->set_flashdata($data);
		redirect('setting/pendaftaran');
        //$this->load->view('hasil', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Pendaftaran';
		$this->session->set_userdata($data);
	}
}
