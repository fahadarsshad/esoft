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
		$this->form_validation->set_rules("user_type","User Type","required");
		$this->form_validation->set_rules("user_role","User Role","required");
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
					'user_pass'=>$this->input->post('user_pass'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($insert_id = $this->user_model->insert_user($insert_data)){
						$type_id = (int) $this->input->post('user_type');
						$role_id = (int) $this->input->post('user_role');
						$user_code = $type_id = sprintf('%03d',$type_id).'-'.$role_id = sprintf('%03d',$role_id).'-'.$insert_id = sprintf('%03d',$insert_id);
						
						$this->user_model->create_code($user_code ,$insert_id);
					
						$data['message'] = "User Enter Successfully";				
						redirect(base_url().'index.php/user/user_home?ms='.$data['message']);
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
			$this->load->view('user/update-user',$data);
			$this->load->view('templates/footer');
			
			
			}else{
				if($_REQUEST){
					$update_data = array(
					'user_type'=>$this->input->post('user_type'),
					'user_role'=>$this->input->post('user_role'),
					'user_name'=>$this->input->post('user_name'),
					'user_pass'=>$this->input->post('user_pass'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($this->user_model->update_user($update_data,$user_id)){
						$data['message'] = "User Update Successfully";
						
						redirect(base_url().'index.php/user/user_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function delete_user($user_id){
		
		if($this->user_model->delete_user($user_id)){
			
			$data['message'] = "User Delete Successfully";
			
			redirect(base_url().'index.php/user/user_home?ms='.$data['message']);
		}
		
		
	}
	
}
