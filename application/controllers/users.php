<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		echo "index of users";
	}
	
	function employee(){
		$data['title'] = 'Pinaple SAS | Manage Employee';
		$data['main_content'] = 'employee';
		$this->load->view('includes/template', $data);
	}	
	
	function superadmin(){
		$data['title'] = 'Pinaple SAS | Manage Employee';
		$data['main_content'] = 'superadmin';
		$this->load->view('includes/template', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */