<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Menu extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_portal');
		$this->load->model('m_menu');
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal list
		$data['rs_portal']			= $this->m_portal->get_all_portal();
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/menu/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// list menu
	public function list_menu($portal_slug = "") {
		// user_auth
		$this->check_auth('R');

		if ($portal_slug == "") {
			redirect('setting/menu/');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['portal']				= $this->m_portal->get_portal_by_slug($portal_slug);
		// echo '<pre>'; print_r($data['portal']); die;
		// get menu by portal
		$data['rs_menu']			= $this->m_menu->get_all_menu_by_portal($data['portal']['portal_id']);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/menu/list_menu";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add
	public function add($portal_slug = "") {
		// user_auth
		$this->check_auth('U');

		if ($portal_slug == "") {
			redirect('setting/menu');
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['portal']				= $this->m_portal->get_portal_by_slug($portal_slug);
		// get all menu
		$data['rs_menu']			= $this->m_menu->get_all_menu($data['portal']['portal_id']);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/menu/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('portal_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_name', 'Name', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('menu_desc', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_url', 'Url', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('menu_order', 'Order', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('menu_icon', 'Icon', 'required|trim|xss_clean|max_length[100]');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array($this->input->post('portal_id'), $this->input->post('parent_id'), $this->input->post('menu_name'), str_replace($this->char, "_", strtolower($this->input->post('menu_name'))), $this->input->post('menu_desc'), $this->input->post('menu_url'), $this->input->post('menu_order'), $this->input->post('menu_icon'), $this->input->post('user_id'));
			if ($this->m_menu->add_menu($params)) {
				$data['message'] = "Data successfully added";
			}
			$this->session->set_flashdata($data);
			redirect('setting/menu/list_menu/' . $this->input->post('portal_slug'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'menu_name'		=> $this->input->post('menu_name'),
				'menu_desc'		=> $this->input->post('menu_desc'),
				'menu_url'		=> $this->input->post('menu_url'),
				'menu_order'	=> $this->input->post('menu_order'),
				'menu_icon'		=> $this->input->post('menu_icon'),
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/menu/add/' . $this->input->post('portal_slug'));
	}

	// edit
	public function edit($portal_slug = "", $menu_slug = "") {
		// user_auth
		$this->check_auth('U');

		if ($portal_slug == "") {
			redirect('setting/menu');
		}
		if ($menu_slug == "") {
			redirect('setting/menu/list_menu/' . $portal_slug);
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['portal']				= $this->m_portal->get_portal_by_slug($portal_slug);
		// get all menu
		$data['rs_menu']			= $this->m_menu->get_all_menu($data['portal']['portal_id']);
		// get menu detail
		$data['result']				= $this->m_menu->get_menu_by_slug($menu_slug);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content']				= "setting/menu/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_name', 'Name', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('menu_desc', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_url', 'Url', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('menu_order', 'Order', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('menu_icon', 'Icon', 'required|trim|xss_clean|max_length[100]');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array($this->input->post('parent_id'), $this->input->post('menu_name'), str_replace($this->char, "_", strtolower($this->input->post('menu_name'))), $this->input->post('menu_desc'), $this->input->post('menu_url'), $this->input->post('menu_order'), $this->input->post('menu_icon'), $this->input->post('menu_id'));
			if ($this->m_menu->edit_menu($params)) {
				$data['message'] = "Data successfully edited";
			}
			$this->session->set_flashdata($data);
			redirect('setting/menu/list_menu/' . $this->input->post('portal_slug'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'menu_name'		=> $this->input->post('menu_name'),
				'menu_desc'		=> $this->input->post('menu_desc'),
				'menu_url'		=> $this->input->post('menu_url'),
				'menu_order'	=> $this->input->post('menu_order'),
				'menu_icon'		=> $this->input->post('menu_icon'),
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/menu/edit/' . $this->input->post('portal_slug') . '/' . $this->input->post('menu_slug'));
	}

	// delete
	public function delete($portal_slug = "", $menu_slug = "") {
		// user_auth
		$this->check_auth('D');

		if ($portal_slug == "") {
			redirect('setting/menu');
		}
		if ($menu_slug == "") {
			redirect('setting/menu/list_menu/' . $portal_slug);
		}
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get portal by slug
		$data['portal']				= $this->m_portal->get_portal_by_slug($portal_slug);
		// get all menu
		$data['rs_menu']			= $this->m_menu->get_all_menu_default($data['portal']['portal_id']);
		// get menu detail
		$data['result']				= $this->m_menu->get_menu_by_slug($menu_slug);
		// load template
		$data['title']	= "Setting Menu Pinaple Sas";
		$data['main_content'] = "setting/menu/delete";
		$this->load->view('dashboard/admin/template', $data);
	}

	// delete process
	public function delete_process() {
		// form validation
		$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('portal_slug', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_slug', '', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array($this->input->post('menu_id'));
			if ($this->m_menu->delete_menu($params)) {
				$data['message'] = "Data successfully deleted";
			}
			$this->session->set_flashdata($data);
			redirect('setting/menu/list_menu/' . $this->input->post('portal_slug'));
		} else {
			$data = array(
				'message'		=> validation_errors()
			);
		}
		$this->session->set_flashdata($data);
		redirect('setting/menu/delete/' . $this->input->post('portal_slug') . '/' . $this->input->post('menu_slug'));
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Menu';
		$this->session->set_userdata($data);
	}
}
