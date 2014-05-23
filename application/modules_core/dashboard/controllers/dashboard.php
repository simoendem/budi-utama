<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
	
	function index(){
	
		$data['title'] = 'BU | Pinaple SAS Dashboard';
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/template', $data);
	}
}