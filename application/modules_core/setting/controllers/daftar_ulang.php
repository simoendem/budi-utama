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
		$this->load->model('m_invoices');
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
	
	public function add_process($nis = "", $id_unit= "")
	{
		// user_auth
		$this->check_auth('U');

		if ($nis == "" OR $id_unit == "") {
			redirect('setting/daftar_ulang/');
		}
		// get tahun ajaran
		$data['tahun']	= $this->m_tahun_ajaran->get_tahun_aktif();
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
			$data['message'] = "Siswa ".$params['nis']." berhasil didaftarulangkan..";
			$this->_generate_invoice($params,$id_unit);
		}
		$this->session->set_flashdata($data);		
		redirect('setting/daftar_ulang/');

	}

	function _generate_invoice($params,$id_unit){
		$ta_aktif	  = $this->m_tahun_ajaran->get_tahun_aktif();
		$amount_spp   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'SPP',$id_unit);
		//$amount_extra = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'Ekstrakurikuler',$id_unit);
		$periods	  = $this->m_tahun_ajaran->get_all_periods();

		//generate SPP
		foreach ($periods as $key => $value) {
			# code...
			$period_name = $value->index."-".$ta_aktif->tahun_ajaran;

			$pj = array(
				'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $params['tgl_daftar'],
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $params['nis'],
				'notes' => '',
				'transaction_code' => 0  // not yet
				);
			$this->m_journals->add_journals($pj);
			$j_id = $this->db->insert_id();
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_spp->amount,
				'debit_credit_flag' => 1, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_spp->amount,
				'debit_credit_flag' => 2, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);

			$pi = array(
				'nis' => $params['nis'],
				'tahun_ajaran_id' => $ta_aktif->id,
				'journal_id' => $j_id, 
				'template_id' => 0 //SPP only
				);
			$this->m_invoices->add_invoices($pi);
			$i_id = $this->db->insert_id();
			$ii = array(
				'invoice_id' => $i_id, 
				'item_type_id' => $amount_spp->id,
				'qty' => 1,
				'amount' => $amount_spp->amount,
				'scholarship' => 0, 
				'period_name' => $period_name
				);
			$this->m_invoices->add_invoice_items($ii);
		}
	
	/*
		//generate Ekstrakurikuler
		foreach ($periods as $key => $value) {
			# code...
			$period_name = $value->index."-".$ta_aktif->tahun_ajaran;

			$pj = array(
				'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $params['tgl_daftar'],
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $params['nis'],
				'notes' => '',
				'transaction_code' => 0  // not yet
				);
			$this->m_journals->add_journals($pj);
			$j_id = $this->db->insert_id();
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_extra->amount,
				'debit_credit_flag' => 1, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_extra->amount,
				'debit_credit_flag' => 2, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);

			$pi = array(
				'nis' => $params['nis'],
				'tahun_ajaran_id' => $ta_aktif->id,
				'journal_id' => $j_id, 
				'template_id' => 0 //Extra only
				);
			$this->m_invoices->add_invoices($pi);
			$i_id = $this->db->insert_id();
			$ii = array(
				'invoice_id' => $i_id, 
				'item_type_id' => $amount_extra->id,
				'qty' => 1,
				'amount' => $amount_extra->amount,
				'scholarship' => 0, 
				'period_name' => $period_name
				);
			$this->m_invoices->add_invoice_items($ii);
		}
	*/
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Daftar Ulang';
		$this->session->set_userdata($data);
	}
}
