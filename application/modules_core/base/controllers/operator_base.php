<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator_base extends CI_Controller {
	protected $portal_id;
	protected $user;
	protected $char;
	protected $role;
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_base');
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
		$this->portal_id = $this->config->item('portal_operator');
		// page active
		$parent_active = $this->session->userdata('parent_active');
		$child_active = $this->session->userdata('child_active');
		$html = "<ul class='list-unstyled'>";
		// load menu
		$data['parent_menu'] = $this->m_base->get_parent_menu(array($this->portal_id, $this->user['role_id']));
		foreach ($data['parent_menu'] as $value_parent) {
			if ($value_parent['read'] == 'true') {
				$html .= "<li";
				($parent_active == $value_parent['menu_slug']) ? $html .= " class='active'" : "" ;
				$html .= ">";
				$html .= "<a href='#sidebar-discover-" . $value_parent['menu_name'] . "' class='glyphicons " . $value_parent['menu_icon'] . "' data-toggle='sidebar-discover'><i></i><span>" . $value_parent['menu_name'] . "</span></a>";
				$html .= "<div id='sidebar-discover-" . $value_parent['menu_name'] . "' class='sidebar-discover-menu'>";
				$html .= "<div class='innerAll text-center border-bottom text-muted-dark'>";
				$html .= "<strong>" . $value_parent['menu_name'] . "</strong>";
				$html .= "<button class='btn btn-xs btn-default close-discover'><i class='fa fa-fw fa-times'></i></button>";
				$html .= "</div>";
				if ($data['child_menu'] = $this->m_base->get_child_menu(array($value_parent['menu_id'], $this->user['role_id']))) {
					foreach ($data['child_menu'] as $value_child) {
						if ($value_child['read'] == 'true') {
							$html .= "<ul class='animated fadeIn'>";
							$html .= "<li";
							($child_active == $value_child['menu_slug']) ? $html .= " class='active'" : "" ;
							$html .= "><a href='" . base_url() . $value_child['menu_url'] . "' /><i class='fa fa-" . $value_child['menu_icon'] . "'></i>" . $value_child['menu_name'] . "</a></li>";
							$html .= "</ul>";
						}
					}
				}
				$html .= "</div>";
				$html .= "</li>";
			}
		}
		$html .= "</ul>";
		return $html;
	}

	// get user login
	protected function get_user_login() {
		// get user login
		$session = $this->session->userdata('session_operator');
		if (!empty($session)) {
			$this->user = $session;
		} else {
			redirect('login/operator');
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
