<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Tahun_ajaran extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_tahun_ajaran');
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
		// get user list
		$data['rs_tahun_ajaran'] = $this->m_tahun_ajaran->get_all_tahun_ajaran();
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Tahun Ajaran PinapleSAS";
		$data['main_content'] = "setting/tahun_ajaran/list";
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
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Tahun Ajaran PinapleSAS";
		$data['main_content'] = "setting/tahun_ajaran/add";
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
		$data['result'] = $this->m_tahun_ajaran->get_tahun_ajaran_by_id($id);
		// load template
		$data['title']	= "Edit Tahun Ajaran PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		$data['main_content'] = "setting/tahun_ajaran/edit";
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

	public function check_tahun_ajaran($ta) {
		$id=$this->input->post('id');
		$row=$this->m_tahun_ajaran->get_tahun_ajaran_nama($ta,$id);
		if(!empty($row)){
			$this->form_validation->set_message('check_tahun_ajaran', 'Tahun Ajaran is already used');
		    return FALSE;
		}
		else{
		    return TRUE;
		}
	}

	public function check_less($akhir,$mulai)
	{
	    if ($akhir < $mulai){
			$this->form_validation->set_message('check_less', 'Mulai > Akhir is not permitted');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_status($status)
	{
		$id=$this->input->post('id');
		$cek=$this->m_tahun_ajaran->get_status_aktif($id);
	    if (!empty($cek) && $status=="AKTIF"){
			$this->form_validation->set_message('check_status', 'There are AKTIF status on the other Tahun Ajaran');
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
		
		$params['id']=$id;
		$this->m_tahun_ajaran->delete_tahun_ajaran($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('setting/tahun_ajaran');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Tahun Ajaran';
		$this->session->set_userdata($data);
	}
}
