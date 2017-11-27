<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public $account_id;
	public $account_name;
	public $account_shead;
	public $account_pass;
	public $account_email;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('account_model');
	}
	
	public function account_home()
	{	
		$data['all_accounts'] = $this->account_model->get_all_accounts();

		$this->load->view('templates/header');
		$this->load->view('account/account-home',$data);
		$this->load->view('templates/footer');
	}
	
	public function create_account()
	{ 
		$this->form_validation->set_rules("account_shead","Account Type","required");
		$this->form_validation->set_rules("account_name","Email","required");
			if($this->form_validation->run()==FALSE){
			
			$data['account_sheads'] = $this->account_model->get_account_sheads();
			$data['account_mheads'] = $this->account_model->get_account_mheads();
			
			
			$this->load->view('templates/header');
			$this->load->view('account/create-account',$data);
			$this->load->view('templates/footer');
			
			}else{
				if($_REQUEST){
					$insert_data = array(
					'account_shead'=>$this->input->post('account_shead'),
					'account_name'=>$this->input->post('account_name'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($insert_id = $this->account_model->insert_account($insert_data)){
						$shead_id = (int) $this->input->post('account_shead');
						$m = $this->account_model->get_mhead_by_shead($shead_id);
						$mhead_id = (int) $m['mhead_id'];
						
						
	
						$account_code = $mhead_id = sprintf('%03d',$mhead_id).'-'.$shead_id = sprintf('%03d',$shead_id).'-'.$insert_id = sprintf('%03d',$insert_id);	
						$this->account_model->create_code($account_code ,$mhead_id,$insert_id);
						
						$data['message'] = "Account Enter Successfully";				
						redirect(base_url().'index.php/account/account_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function update_account($account_id = 1)
	{ 	 
		$this->form_validation->set_rules("account_shead","Account Type","required");
		$this->form_validation->set_rules("account_name","Account Name","required");
		
			if($this->form_validation->run()==FALSE){
			
			$data['account_detail'] = $this->account_model->get_account_by_id($account_id);
			
			$data['account_sheads'] = $this->account_model->get_account_sheads();
			$data['account_mheads'] = $this->account_model->get_account_mheads();		
			
			$this->load->view('templates/header');
			$this->load->view('account/update-account',$data);
			$this->load->view('templates/footer');
			
			
			}else{
				if($_REQUEST){
					$update_data = array(
					'account_shead'=>$this->input->post('account_shead'),
					'account_name'=>$this->input->post('account_name'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($this->account_model->update_account($update_data,$account_id)){
						$data['message'] = "account Update Successfully";
						
						redirect(base_url().'index.php/account/account_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function delete_account($account_id){
		
		if($this->account_model->delete_account($account_id)){
			
			$data['message'] = "account Delete Successfully";
			
			redirect(base_url().'index.php/account/account_home?ms='.$data['message']);
		}
		
		
	}
	
}
