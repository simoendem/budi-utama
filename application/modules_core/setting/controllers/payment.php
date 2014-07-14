<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Payment extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_role');
		$this->load->model('m_menu');
		$this->load->model('m_permission');

		$this->load->model('m_tahun_ajaran');
		$this->load->model('m_items_type');
		$this->load->model('m_payments');
		$this->load->model('m_pendaftaran');
		$this->load->model('m_journals');
		$this->load->model('m_journal_items');
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
		// get role list
		$data['rs_role'] = $this->m_role->get_all_role();
		// get permission list
		$data['rs_permission'] = $this->m_permission->get_all_permission();
		
		$data['r_ta'] = $this->m_tahun_ajaran->get_tahun_aktif();
		$data['rs_item_type'] = $this->m_items_type->get_all_items_type_for_student_payment();

		$params['ta_id']=$data['r_ta']->id;
		//die($this->input->post['nama_siswa']);
		$cek=$this->input->post('nama_siswa');
		if(isset($cek)){
			$params['ns']=$data['nama_siswa']=$this->input->post('nama_siswa');
			$params['ct']=$data['cost_type']=$this->input->post('cost_type');
		}
		else{
			$params['ns']='';
			$params['ct']='';
		}
		$data['rs_siswa']= $this->m_payments->get_student_invoice_tahun_aktif($params);
		//echo "<pre>";print_r($data['rs_siswa']);echo "</pre>";
		// load template
		$data['title']	= "Payment Transactions PinapleSAS";
		$data['main_content'] = "setting/payment/list";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	public function details($nis,$ta_id,$iti)
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		
		// user detail
		$data['user'] = $this->user;
		// get role list
		$data['rs_role'] = $this->m_role->get_all_role();
		// get permission list
		$data['rs_permission'] = $this->m_permission->get_all_permission();
		
		$data['rs_bank'] = $this->m_payments->get_all_bank();
		$data['r_student'] = $this->m_pendaftaran->get_users_siswa_alumni_by_nis($nis);
		$data['r_ta'] = $this->m_tahun_ajaran->get_tahun_ajaran_by_id($ta_id);
		$data['rs_invoices']= $this->m_payments->get_student_invoices($nis,$ta_id,$iti);
		//echo "<pre>";print_r($data['rs_invoices']);echo "</pre>";
		// load template
		$data['title']	= "Detail Payment Transactions PinapleSAS";
		$data['main_content'] = "setting/payment/details";
		$this->load->view('dashboard/admin/template', $data);
	}	

	public function payment_process(){
		$this->check_auth('U');
		$data['message'] = $this->session->flashdata('message');
		$data['user'] = $this->user;
		$data['rs_role'] = $this->m_role->get_all_role();
		$data['rs_permission'] = $this->m_permission->get_all_permission();
		//echo "<pre>";print_r($this->input->post());echo "</pre>";die();
		$this->load->helper('date');
	    $datestring = '%Y-%m-%d %H:%i:%s';
	    $time = time();
	    $now = mdate($datestring, $time);

		foreach ($this->input->post() as $key => $value) {
			if(isset($value['pay_check'])){
				//echo "<pre>";print_r($value);echo "</pre>";die();
				$notes="Payment for ".$value['item_name'];
				$pj = array(
				'transaction_type' => 2, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $now,
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $this->input->post('nis'),
				'notes' => $notes,
				'transaction_code' => 0  // not yet
				);
				$this->m_journals->add_journals($pj);
				$j_id = $this->db->insert_id();
				$pji = array(
					'journal_id' => $j_id,
					'account_code_id' => 0, //not yet
					'amount' => (float)str_replace('.', '', $value['jumlah']), //$this->input->post('total'),
					'debit_credit_flag' => 1, // 1 = debit, 2 = credit
					'account_type' => 0 //not yet
					);
				$this->m_journal_items->add_journal_items($pji);
				$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => (float)str_replace('.', '', $value['jumlah']), //$this->input->post('total'),
				'debit_credit_flag' => 2, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
				$this->m_journal_items->add_journal_items($pji);

				$pp = array(
					'journal_id' => $j_id, 
					'nis' => $this->input->post('nis'),
					'payer_name' => $this->input->post('payer_name'),
					'payment_method' => $this->input->post('payment_method'), // 1 = cash, 2 = bank
					'nik' => $this->user['user_id'] //default paket for siswa baru
					);
				$this->m_payments->add_payments($pp);
				$p_id = $this->db->insert_id();
				$pi = array(
					'payment_id' => $p_id,
					'invoice_id' => $value['invoice_id'],
					'invoice_item_id' => $value['invoice_item_id'], 
					'amount' => (float)str_replace('.', '', $value['jumlah']),
					'fines' => $value['fines']
					);
				$this->m_payments->add_payment_items($pi);
				if($this->input->post('payment_method')=='2'){
					$pt = array(
						'payment_id' => $p_id,
						'department' => $this->input->post('department'),
						'rekening' => $this->input->post('rekening'), 
						'atas_nama' => $this->input->post('atas_nama')
						);
					$this->m_payments->add_payments_transfer($pt);
				}

				$data['message'] = "Payment proses for ".$this->input->post('nama_lengkap')." is success..";
				$this->session->set_flashdata($data);
			}
		}
		echo "<script type='text/javascript'>window.close();window.opener.top.location.reload();</script>";
		//redirect('setting/payment');
	}

	// edit
/*
	public function edit($role_slug = "") {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get role detail
		$data['result'] = $this->m_role->get_role_by_slug($role_slug);
		// get menu list
		$data['rs_menu'] = $this->m_menu->get_all_menu_by_portal_role(array($role_slug, $role_slug, $data['result']['portal_id']));
		// load template
		$data['title']	= "Edit Permission PinapleSAS";
		$data['main_content'] = "setting/payment/edit";
		$this->load->view('dashboard/admin/template', $data);
	}
*/

	// edit process
/*
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('role_id', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// delete and then insert permission
			$params = array($this->input->post('role_id'), $this->input->post('permission'));
			$this->m_permission->delete_permission($params);
			if ($this->m_permission->edit_permission($params)) {
				$data['message'] = "Permission successfully granted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/permission');
		} else {
			$data = array(
				'message'	=> str_replace("\n", "", validation_errors())
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/permission/edit/' . $this->input->post('role_id'));
	}
*/

	// page title
	public function page_title() {
		$data['page_title'] = 'Payment';
		$this->session->set_userdata($data);
	}
}
