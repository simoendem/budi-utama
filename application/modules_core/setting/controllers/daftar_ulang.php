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
		$this->load->model('m_pendaftaran');
		$this->load->model('m_items_type');
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
		$data['message_error'] = $this->session->flashdata('message_error');
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

		// get tahun ajaran
		$data['tahun']	= $this->m_tahun_ajaran->get_tahun_aktif();
		$ta_id = $data['tahun']->id;
		$thn = $data['tahun']->tahun_ajaran;

		$cek_ac = $this->m_items_type->get_administration_costs_aktif($ta_id);
		$cc_ac = count($cek_ac);
		//echo $cc_ac."<pre>";print_r($cek_ac);echo "</pre>"; die();
		if($cc_ac<28){
			$data['message_error'] = "Ada administration cost yang belum disetting..";
			$this->session->set_flashdata($data);		
			redirect('setting/daftar_ulang/');
		}

		if ($nis == "" OR $id_unit == "") {
			redirect('setting/daftar_ulang/');
		}

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
			$this->_generate_invoice($params,$id_unit);
			$data['message'] = "Siswa ".$params['nis']." berhasil didaftarulangkan..";
		}
		$this->session->set_flashdata($data);		
		redirect('setting/daftar_ulang/');

	}

	function _generate_invoice($params,$id_unit){
		$ta_aktif	  = $this->m_tahun_ajaran->get_tahun_aktif();
		$amount_dpp   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'DPP',$id_unit);
		$amount_spp   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'SPP',$id_unit);
		$amount_srg   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'Seragam',$id_unit);
		$amount_keg   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'Kegiatan',$id_unit);
		$amount_min   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'Minitrip',$id_unit);
		$amount_wis   = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'Wisuda',$id_unit);
		//$amount_extra = $this->m_tahun_ajaran->get_administration_cost_by_ta_name($ta_aktif->id,'Ekstrakurikuler',$id_unit);
		$periods	  = $this->m_tahun_ajaran->get_all_periods();
		$siswa_du 	  = $this->m_pendaftaran->get_users_siswa_alumni_by_nis($params['nis']);
		//echo "<pre>";print_r($params);echo "</pre>"; 
		//die();
		//generate invoice DPP
		if($siswa_du->sk_id == null){
			$pj = array(
				'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $params['tgl_daftar'],
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $params['nis'],
				'notes' => 'Invoice DPP',
				'transaction_code' => 0  // not yet
				);
			$this->m_journals->add_journals($pj);
			$j_id = $this->db->insert_id();
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_dpp->amount,
				'debit_credit_flag' => 1, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_dpp->amount,
				'debit_credit_flag' => 2, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);

			$pi = array(
				'nis' => $params['nis'],
				'tahun_ajaran_id' => $ta_aktif->id,
				'journal_id' => $j_id, 
				'template_id' => 1, //default paket for siswa baru
				'nik' => $this->user['user_id']
				);
			$this->m_invoices->add_invoices($pi);
			$i_id = $this->db->insert_id();
			$ii = array(
				'invoice_id' => $i_id, 
				'item_type_id' => $amount_dpp->id,
				'qty' => 1,
				'amount' => $amount_dpp->amount,
				'scholarship' => 0, 
				'period_name' => ''
				);
			$this->m_invoices->add_invoice_items($ii);
		}

		//generate invoice SPP
		foreach ($periods as $key => $value) {
			# code...
			$period_name = $value->index."-".$ta_aktif->tahun_ajaran;

			$pj = array(
				'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $params['tgl_daftar'],
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $params['nis'],
				'notes' => 'Invoice SPP',
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
				'template_id' => 0, // for daftar ulang siswa
				'nik' => $this->user['user_id']
				);
			if($siswa_du->sk_id == null && $value->index=='07')
				$pi['template_id'] = 1; // siswa baru
			if($siswa_du->jenjang_siswa == $siswa_du->jenjang)
				$pi['template_id'] = 2; // for siswa akhir				
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
	
		//generate invoice Seragam
		if($siswa_du->sk_id == null){
			$pj = array(
				'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $params['tgl_daftar'],
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $params['nis'],
				'notes' => 'Invoice Seragam',
				'transaction_code' => 0  // not yet
				);
			$this->m_journals->add_journals($pj);
			$j_id = $this->db->insert_id();
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_srg->amount,
				'debit_credit_flag' => 1, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_srg->amount,
				'debit_credit_flag' => 2, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);

			$pi = array(
				'nis' => $params['nis'],
				'tahun_ajaran_id' => $ta_aktif->id,
				'journal_id' => $j_id, 
				'template_id' => 1, //default paket for siswa baru
				'nik' => $this->user['user_id']
				);
			$this->m_invoices->add_invoices($pi);
			$i_id = $this->db->insert_id();
			$ii = array(
				'invoice_id' => $i_id, 
				'item_type_id' => $amount_srg->id,
				'qty' => 1,
				'amount' => $amount_srg->amount,
				'scholarship' => 0, 
				'period_name' => ''
				);
			$this->m_invoices->add_invoice_items($ii);
		}

		//generate invoice Uang Kegiatan
		$pj = array(
			'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
			'transacted_on' => $params['tgl_daftar'],
			'handled_by_id' => $this->user['user_id'],
			'client_id' => $params['nis'],
			'notes' => 'Invoice Kegiatan',
			'transaction_code' => 0  // not yet
			);
		$this->m_journals->add_journals($pj);
		$j_id = $this->db->insert_id();
		$pji = array(
			'journal_id' => $j_id,
			'account_code_id' => 0, //not yet
			'amount' => $amount_keg->amount,
			'debit_credit_flag' => 1, // 1 = debit, 2 = credit
			'account_type' => 0 //not yet
			);
		$this->m_journal_items->add_journal_items($pji);
		$pji = array(
			'journal_id' => $j_id,
			'account_code_id' => 0, //not yet
			'amount' => $amount_keg->amount,
			'debit_credit_flag' => 2, // 1 = debit, 2 = credit
			'account_type' => 0 //not yet
			);
		$this->m_journal_items->add_journal_items($pji);

		$pi = array(
			'nis' => $params['nis'],
			'tahun_ajaran_id' => $ta_aktif->id,
			'journal_id' => $j_id, 
			'template_id' => 0, //default for daftar ulang siswa
			'nik' => $this->user['user_id']
			);
		if($siswa_du->sk_id == null)
			$pi['template_id'] = 1; // for siswa baru
		if($siswa_du->jenjang_siswa == $siswa_du->jenjang)
			$pi['template_id'] = 2; // for siswa akhir	
		$this->m_invoices->add_invoices($pi);
		$i_id = $this->db->insert_id();
		$ii = array(
			'invoice_id' => $i_id, 
			'item_type_id' => $amount_keg->id,
			'qty' => 1,
			'amount' => $amount_keg->amount,
			'scholarship' => 0, 
			'period_name' => ''
			);
		$this->m_invoices->add_invoice_items($ii);

		//generate invoice Uang Minitrip
		$pj = array(
			'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
			'transacted_on' => $params['tgl_daftar'],
			'handled_by_id' => $this->user['user_id'],
			'client_id' => $params['nis'],
			'notes' => 'Invoice Minitrip',
			'transaction_code' => 0  // not yet
			);
		$this->m_journals->add_journals($pj);
		$j_id = $this->db->insert_id();
		$pji = array(
			'journal_id' => $j_id,
			'account_code_id' => 0, //not yet
			'amount' => $amount_min->amount,
			'debit_credit_flag' => 1, // 1 = debit, 2 = credit
			'account_type' => 0 //not yet
			);
		$this->m_journal_items->add_journal_items($pji);
		$pji = array(
			'journal_id' => $j_id,
			'account_code_id' => 0, //not yet
			'amount' => $amount_min->amount,
			'debit_credit_flag' => 2, // 1 = debit, 2 = credit
			'account_type' => 0 //not yet
			);
		$this->m_journal_items->add_journal_items($pji);

		$pi = array(
			'nis' => $params['nis'],
			'tahun_ajaran_id' => $ta_aktif->id,
			'journal_id' => $j_id, 
			'template_id' => 0, //default for daftar ulang siswa
			'nik' => $this->user['user_id']
			);
		if($siswa_du->sk_id == null)
			$pi['template_id'] = 1; // for siswa baru
		if($siswa_du->jenjang_siswa == $siswa_du->jenjang)
			$pi['template_id'] = 2; // for siswa akhir	
		$this->m_invoices->add_invoices($pi);
		$i_id = $this->db->insert_id();
		$ii = array(
			'invoice_id' => $i_id, 
			'item_type_id' => $amount_min->id,
			'qty' => 1,
			'amount' => $amount_min->amount,
			'scholarship' => 0, 
			'period_name' => ''
			);
		$this->m_invoices->add_invoice_items($ii);

		//generate invoice wisuda
		if($siswa_du->jenjang_siswa == $siswa_du->jenjang){
			$pj = array(
				'transaction_type' => 1, 	// 1 = invoice, 2 = payment 
				'transacted_on' => $params['tgl_daftar'],
				'handled_by_id' => $this->user['user_id'],
				'client_id' => $params['nis'],
				'notes' => 'Invoice Wisuda',
				'transaction_code' => 0  // not yet
				);
			$this->m_journals->add_journals($pj);
			$j_id = $this->db->insert_id();
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_wis->amount,
				'debit_credit_flag' => 1, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);
			$pji = array(
				'journal_id' => $j_id,
				'account_code_id' => 0, //not yet
				'amount' => $amount_wis->amount,
				'debit_credit_flag' => 2, // 1 = debit, 2 = credit
				'account_type' => 0 //not yet
				);
			$this->m_journal_items->add_journal_items($pji);

			$pi = array(
				'nis' => $params['nis'],
				'tahun_ajaran_id' => $ta_aktif->id,
				'journal_id' => $j_id, 
				'template_id' => 2, //default paket for siswa akhir
				'nik' => $this->user['user_id']
				);
			$this->m_invoices->add_invoices($pi);
			$i_id = $this->db->insert_id();
			$ii = array(
				'invoice_id' => $i_id, 
				'item_type_id' => $amount_wis->id,
				'qty' => 1,
				'amount' => $amount_wis->amount,
				'scholarship' => 0, 
				'period_name' => ''
				);
			$this->m_invoices->add_invoice_items($ii);
		}



	/*
		//generate invoice Ekstrakurikuler -> tidak perlu karena tiap siswa beda harga ekstrakurikulernya
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
