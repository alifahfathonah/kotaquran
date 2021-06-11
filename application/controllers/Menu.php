<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('sequence', 'ASC');
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('sequence', 'Sequence', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'menu' => $this->input->post('menu'),
				'sequence' => $this->input->post('sequence')
			];
			$this->db->insert('user_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added!</div>');
			redirect('menu');
		}
	}

	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'submenu_sequence' => $this->input->post('submenu_sequence'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New submenu added!</div>');
			redirect('menu/submenu');
		}
	}

	public function editmenu($id)
	{
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get_where('user_menu',['id' => $id])->row_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('sequence', 'Sequence', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/editmenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'menu' => $this->input->post('menu'),
				'sequence' => $this->input->post('sequence')
			];

			$this->db->where('id', $id);
			$this->db->update('user_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu edited!</div>');
			redirect('menu');
		}
	}

	public function editsubmenu($id)
	{
		$data['title'] = 'Edit Submenu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $id = 1;
		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenubyId($id);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'submenu_sequence' => $this->input->post('submenu_sequence'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->where('id', $id);
			$this->db->update('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu edited!</div>');
			redirect('menu/submenu');
		}
	}

	public function hapusmenu($id)
	{
		
		$this->db->delete('user_menu', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Menu deleted!</div>');
		redirect('menu');
	}

	public function hapussubmenu($id)
	{
		
		$this->db->delete('user_sub_menu', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Submenu deleted!</div>');
		redirect('menu/submenu');
	}
}