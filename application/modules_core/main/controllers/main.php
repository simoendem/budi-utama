<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller
{
/*
	public function __construct()
	{
	}
*/

	public function index(){
		# checking whether logged in or not
		if (!isset($this->session->userdata['username'] )) {
			redirect('main/login');	
		} 
		else
		{	
			$data['title'] = 'BU | Pinaple SAS';
			$data['main_content'] = 'dashboard';
			$this->load->view('main/template', $data);
		}
	}

	public function login(){
		if(!empty($_POST)){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$this->session->set_userdata('username', $username);
			redirect(base_url(), 'refresh');
		}
		
		$data['form_action'] = 'main/login';
		$data['title'] = 'BU | Pinaple SAS';
		$this->load->view('home', $data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
		
	public function _404(){
		$this->load->view('404');
	}
}
