<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public $product_id;
	public $product_name;
	public $product_shead;
	public $product_pass;
	public $product_email;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('product_model');
	}
	
	public function product_home()
	{	
		$data['all_products'] = $this->product_model->get_all_products();

		$this->load->view('templates/header');
		$this->load->view('product/product-home',$data);
		$this->load->view('templates/footer');
	}
	
	public function create_product()
	{ 
		$this->form_validation->set_rules("product_shead","product Type","required");
		$this->form_validation->set_rules("product_name","Email","required");
			if($this->form_validation->run()==FALSE){
			
			$data['product_sheads'] = $this->product_model->get_product_sheads();
			$data['product_mheads'] = $this->product_model->get_product_mheads();
			
			
			$this->load->view('templates/header');
			$this->load->view('product/create-product',$data);
			$this->load->view('templates/footer');
			
			}else{
				if($_REQUEST){
					$insert_data = array(
					'product_shead'=>$this->input->post('product_shead'),
					'product_name'=>$this->input->post('product_name'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($insert_id = $this->product_model->insert_product($insert_data)){
						$shead_id = (int) $this->input->post('product_shead');
						$m = $this->product_model->get_mhead_by_shead($shead_id);
						$mhead_id = (int) $m['mhead_id'];
						
						
	
						$product_code = $mhead_id = sprintf('%03d',$mhead_id).'-'.$shead_id = sprintf('%03d',$shead_id).'-'.$insert_id = sprintf('%03d',$insert_id);	
						$this->product_model->create_code($product_code ,$mhead_id,$insert_id);
						
						$data['message'] = "product Enter Successfully";				
						redirect(base_url().'index.php/product/product_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function update_product($product_id = 1)
	{ 	 
		$this->form_validation->set_rules("product_shead","product Type","required");
		$this->form_validation->set_rules("product_name","product Name","required");
		
			if($this->form_validation->run()==FALSE){
			
			$data['product_detail'] = $this->product_model->get_product_by_id($product_id);
			
			$data['product_sheads'] = $this->product_model->get_product_sheads();
			$data['product_mheads'] = $this->product_model->get_product_mheads();		
			
			$this->load->view('templates/header');
			$this->load->view('product/update-product',$data);
			$this->load->view('templates/footer');
			
			
			}else{
				if($_REQUEST){
					$update_data = array(
					'product_shead'=>$this->input->post('product_shead'),
					'product_name'=>$this->input->post('product_name'),
					'is_delete'=>0,
					'is_active'=>1
					);	
				
					if($this->product_model->update_product($update_data,$product_id)){
						$data['message'] = "product Update Successfully";
						
						redirect(base_url().'index.php/product/product_home?ms='.$data['message']);
					}			
				}
			}
	}
	
	public function delete_product($product_id){
		
		if($this->product_model->delete_product($product_id)){
			
			$data['message'] = "product Delete Successfully";
			
			redirect(base_url().'index.php/product/product_home?ms='.$data['message']);
		}
		
		
	}
	
}
