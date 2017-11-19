<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/site-heading');
		$this->load->view('templates/side-nav');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
	public function login()
	{
		$this->load->view('templates/header');
		$this->load->view('user/login');
		$this->load->view('templates/footer');
	}
	public function create_user()
	{
		$this->load->view('templates/header');
		$this->load->view('user/create-user');
		$this->load->view('templates/footer');
	}
	public function user_home()
	{
		$this->load->view('templates/header');
		$this->load->view('user/user-home');
		$this->load->view('templates/footer');
	}
	public function update_user()
	{
		$this->load->view('templates/header');
		$this->load->view('user/update-user');
		$this->load->view('templates/footer');
	}
	
}
