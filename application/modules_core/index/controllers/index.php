<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MX_Controller
{
	
	public function index(){
		$data['title'] = 'BU | Pinaple SAS';
		$this->load->view('index', $data);		
	}
}