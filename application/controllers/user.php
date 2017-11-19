<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public $user_id;
	public $user_name;
	public $user_type;
	public $user_pass;
	public $user_email;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}
	
	public function user_home()
	{	
		$data['all_users'] = $this->user_model->get_all_users();

		$this->load->view('templates/header');
		$this->load->view('user/user-home',$data);
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
		$this->form_validation->set_rules("user_name","Email","required");
		$this->form_validation->set_rules("user_pass","Password","required");
		$this->form_validation->set_rules("user_name","Email","required");
		$this->form_validation->set_rules("user_pass","Password","required");
			if($this->form_validation->run()==FALSE){
			
			$data['user_types'] = $this->user_model->get_user_types();
			$data['user_roles'] = $this->user_model->get_user_roles();
			
			$this->load->view('templates/header');
			$this->load->view('user/create-user',$data);
			$this->load->view('templates/footer');
			
			}else{
				if($_REQUEST){
					$insert_data = array(
					'user_type'=>$this->input->post('user_type'),
					'user_role'=>$this->input->post('user_role'),
					'user_name'=>$this->input->post('user_name'),
					'user_pass'=>$this->input->post('user_pass')
					);	
				
					if($this->user_model->insert_user($insert_data)){
						$data['message'] = "User Enter Successfully";
						
						$this->load->view('templates/header');
						$this->load->view('user/create-user',$data);
						$this->load->view('templates/footer');
					}			
				}
			}
	}
	
	public function update_user($user_id = 1)
	{ 	 
		$this->form_validation->set_rules("user_name","Email","required");
		$this->form_validation->set_rules("user_pass","Password","required");
		$this->form_validation->set_rules("user_name","Email","required");
		$this->form_validation->set_rules("user_pass","Password","required");
			if($this->form_validation->run()==FALSE){
			
			
			$data['user_detail'] = $this->user_model->get_user_by_id($user_id);
			$data['user_types'] = $this->user_model->get_user_types();
			$data['user_roles'] = $this->user_model->get_user_roles();		
			
			$this->load->view('templates/header');
			$this->load->view('user/create-user',$data);
			$this->load->view('templates/footer');
			
			}else{
				if($_REQUEST){
					$insert_data = array(
					'user_type'=>$this->input->post('user_type'),
					'user_role'=>$this->input->post('user_role'),
					'user_name'=>$this->input->post('user_name'),
					'user_pass'=>$this->input->post('user_pass')
					);	
				
					if($this->user_model->insert_user($insert_data)){
						$data['message'] = "User Enter Successfully";
						
						$this->load->view('templates/header');
						$this->load->view('user/create-user',$data);
						$this->load->view('templates/footer');
					}			
				}
			}
	}
	
}
