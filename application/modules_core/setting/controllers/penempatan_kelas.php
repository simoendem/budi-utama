<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Penempatan_kelas extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_permission');
		$this->load->model('m_tahun_ajaran');
		$this->load->model('m_extra');
		$this->load->model('m_kelas');
		// load permission
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
		$data['main_content'] = "setting/penempatan_kelas/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function list_kelas($id_unit = "")
	{
	// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get portal by slug
		$data['kelass']				= $this->m_kelas->get_kelas_buka_by_unit_tahun($id_unit,$thn);
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		
		$data['main_content'] = "setting/penempatan_kelas/list_kelas";
		$this->load->view('dashboard/admin/template', $data);
	}	

	public function penempatan($id_unit = "",$id_buka = "")
	{
	// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get portal by slug
		$data['result']				= $this->m_kelas->get_kelas_buka_by_unit_tahun_detail($id_buka);
		// get assigned student
		$data['siswas']				= $this->m_kelas->get_siswa_kelas($id_buka);
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		
		$data['main_content'] = "setting/penempatan_kelas/penempatan";
		$this->load->view('dashboard/admin/template', $data);

	}

	public function add_siswa($id_unit = "",$id_buka = "",$tingkat = "")
	{
		// user_auth
		$this->check_auth('C');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get portal by slug
		$data['result']				= $this->m_kelas->get_kelas_buka_by_unit_tahun_detail($id_buka);
		// get avaiable student
		$data['siswas']				= $this->m_kelas->get_siswa_qualifikasi($id_unit,$tingkat,$thn);
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		
		$data['main_content'] = "setting/penempatan_kelas/add";
		$this->load->view('dashboard/admin/template', $data);

	}

	public function add_process($id_unit = '',$id_buka = '')
	{
		if ($id_unit == '' OR $id_buka == '')
		{
			echo "forbidden";die;
		}

		// echo "<pre>"; print_r($_POST);die;

		foreach ($_POST as $value) 
		{
				if (isset($value['check']))
				{
					$params = array(
						'nis' 		=> $value['nis'],
		            	'tahun_ajaran' 	=> $value['tahun_ajaran'],
		            	'id_buka' 	=> $value['id_buka']
		            	);
					$this->m_kelas->add_siswa_kelas($params);
				}
				// echo "<pre>"; print_r($_POST); die;

		}

			$data['message'] = "Data successfully added";

			$this->session->set_flashdata($data);
			redirect('setting/penempatan_kelas/penempatan/' . $id_unit .'/'. $id_buka);
	}

	public function hapus($id_unit = "",$id_buka = "",$id = "")
	{
	// user_auth
		$this->check_auth('D');

		
		if ($this->m_kelas->delete_siswa_kelas($id)) {
			$data['message'] = "Data successfully deleted";
		}
		$this->session->set_flashdata($data);
		redirect('setting/penempatan_kelas/penempatan/' . $id_unit .'/'. $id_buka);

	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Penempatan Kelas';
		$this->session->set_userdata($data);
	}
}
