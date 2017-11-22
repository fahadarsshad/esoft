<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
	public $store_id;
	public $store_name;
	public $store_shead;
	public $store_pass;
	public $store_email;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('store_model');
	}
	
	public function store_home()
	{	
		$data['all_stores'] = $this->store_model->get_all_stores();

		$this->load->view('templates/header');
		$this->load->view('store/store-home',$data);
		$this->load->view('templates/footer');
	}
	
	public function create_store()
	{ 
		$this->form_validation->set_rules("store_shead","store Type","required");
		$this->form_validation->set_rules("store_name","Email","required");
			if($this->form_validation->run()==FALSE){
			
			$data['store_sheads'] = $this->store_model->get_store_sheads();
			$data['store_mheads'] = $this->store_model->get_store_mheads();
			
			
			$this->load->view('templates/header');
			$this->load->view('store/create-store',$data);
			$this->load->view('templates/footer');
			
			}else{
				if($_REQUEST){
					$insert_data = array(
					'store_shead'=>$this->input->post('store_shead'),
					'store_name'=>$this->input->post('store_name'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($insert_id = $this->store_model->insert_store($insert_data)){
						$shead_id = (int) $this->input->post('store_shead');
						$m = $this->store_model->get_mhead_by_shead($shead_id);
						$mhead_id = (int) $m['mhead_id'];
						
						
	
						$store_code = $mhead_id = sprintf('%03d',$mhead_id).'-'.$shead_id = sprintf('%03d',$shead_id).'-'.$insert_id = sprintf('%03d',$insert_id);	
						$this->store_model->create_code($store_code ,$mhead_id,$insert_id);
						
						$data['message'] = "store Enter Successfully";				
						redirect(base_url().'index.php/store/store_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function update_store($store_id = 1)
	{ 	 
		$this->form_validation->set_rules("store_shead","store Type","required");
		$this->form_validation->set_rules("store_name","store Name","required");
		
			if($this->form_validation->run()==FALSE){
			
			$data['store_detail'] = $this->store_model->get_store_by_id($store_id);
			
			$data['store_sheads'] = $this->store_model->get_store_sheads();
			$data['store_mheads'] = $this->store_model->get_store_mheads();		
			
			$this->load->view('templates/header');
			$this->load->view('store/update-store',$data);
			$this->load->view('templates/footer');
			
			
			}else{
				if($_REQUEST){
					$update_data = array(
					'store_shead'=>$this->input->post('store_shead'),
					'store_name'=>$this->input->post('store_name'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($this->store_model->update_store($update_data,$store_id)){
						$data['message'] = "store Update Successfully";
						
						redirect(base_url().'index.php/store/store_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function delete_store($store_id){
		
		if($this->store_model->delete_store($store_id)){
			
			$data['message'] = "store Delete Successfully";
			
			redirect(base_url().'index.php/store/store_home?ms='.$data['message']);
		}
		
		
	}
	
}
