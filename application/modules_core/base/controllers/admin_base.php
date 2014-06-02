<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_base extends CI_Controller {
	protected $portal_id;
	protected $user;
	protected $char;
	protected $role;

	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('base/m_base');
		// load library
		$this->load->library('form_validation');
		// load other
		$this->get_user_login();
		$this->menu();
		$this->replace_character();
	}

	// menu
	public function menu() {
		// id portal
		$this->portal_id = $this->config->item('portal_admin');
		// page active
		$active = $this->session->userdata('page_title');
		$html = "<ul id='leftsidePanel' class='nav nav-pills nav-stacked nav-bracket'>";
		// load menu
		$data['parent_menu'] = $this->m_base->get_parent_menu(array($this->portal_id, $this->user['role_id']));
		foreach ($data['parent_menu'] as $value_parent) {

				$html .= "<li class='dashboard ";
				if ($active == $value_parent['menu_name']) {
					$html .= "active";
				}
				$html .= "'> <a href='" . base_url() . $value_parent['menu_url'] . "'> <i class='fa fa-" . $value_parent['menu_icon'] . "'></i> <span>" . $value_parent['menu_name'] . "</span></a></li>";
		}
		$html .= "</ul>";
		return $html;
	}

	// get user login
	protected function get_user_login() {
		// get user login
		$session = $this->session->userdata('session_admin');
		if (!empty($session)) {
			$this->user = $session;
		} else {
			redirect('login/admin');
		}
	}

	protected function check_auth($auth) {
		// get display page id
		$params = array($this->uri->segment(1) . '/' . $this->uri->segment(2));
		if ($result = $this->m_base->get_display_page_id($params)) {
			// get user auth
			$params = array($this->user['role_id'], $result['menu_id']);
			$role = $this->m_base->get_user_auth($params);
			$this->role = array('C' => substr($role['permission'], 0, 1), 'R' => substr($role['permission'], 1, 1), 'U' => substr($role['permission'], 2, 1), 'D' => substr($role['permission'], 3, 1));
			if ($this->role[$auth] != '1' || empty($auth)) {
				redirect('operator/forbidden/');
			}
		}
	}

	// character
	public function replace_character() {
		$this->char = array(" ", "'", "\"", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "{", "}", "[", "]", "|", "\\", "?", "<", ">", ",", ".", "/", "~", "`");
	}
}
