<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller
{
	
	 function index(){
		$data['title'] = 'BU | Pinaple SAS';
		$this->load->view('home', $data);		
	}
}