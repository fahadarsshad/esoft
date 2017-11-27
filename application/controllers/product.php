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
		$this->form_validation->set_rules("product_name","Product Name","required");
		$this->form_validation->set_rules("product_cprice","Product Cost","required");
		$this->form_validation->set_rules("product_wprice","Product Whole Sale","required");
		$this->form_validation->set_rules("product_rprice","Product Retail","required");
		
			if($this->form_validation->run()==FALSE){
			
			$data['product_sheads'] = $this->product_model->get_product_sheads();
			$data['product_mheads'] = $this->product_model->get_product_mheads();
			$data['product_sizes'] = $this->product_model->get_product_size();
			$data['product_colors'] = $this->product_model->get_product_color();
			
			$this->load->view('templates/header');
			$this->load->view('product/create-product',$data);
			$this->load->view('templates/footer');
			
			}else{
				if($_REQUEST){
					$insert_data = array(
					'product_shead'=>$this->input->post('product_shead'),
					'product_name'=>$this->input->post('product_name'),
					'product_cprice'=>$this->input->post('product_cprice'),
					'product_wprice'=>$this->input->post('product_wprice'),
					'product_rprice'=>$this->input->post('product_rprice'),
					'product_color_id'=>$this->input->post('product_color'),
					'product_size_id'=>$this->input->post('product_size'),
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
			$data['product_mheads'] = $this->product_model->get_product_mheads();				$data['product_sizes'] = $this->product_model->get_product_size();
			$data['product_colors'] = $this->product_model->get_product_color();
			
			$this->load->view('templates/header');
			$this->load->view('product/update-product',$data);
			$this->load->view('templates/footer');
			
			
			}else{
				if($_REQUEST){
					$update_data = array(
					'product_shead'=>$this->input->post('product_shead'),
					'product_name'=>$this->input->post('product_name'),
					'product_cprice'=>$this->input->post('product_cprice'),
					'product_wprice'=>$this->input->post('product_wprice'),
					'product_rprice'=>$this->input->post('product_rprice'),
					'product_color_id'=>$this->input->post('product_color'),
					'product_size_id'=>$this->input->post('product_size'),
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
	
	public function image_upload($product_code) {
		 
         $this->load->view('upload_form', array('error' => ' ','product_code'=>$product_code )); 
      }
	
	public function do_upload($product_code) {
		
		 
         $config['upload_path']   = './product_img/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 1024; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;
		 $config['file_name'] = $product_code;
         $this->load->library('upload', $config);
         
			
         if ( ! $this->upload->do_upload('product_image')) {
            $error = array('error' => $this->upload->display_errors()); 
            var_dump($error); die();
         }
      }
      
    public function create_pur_invoice(){
		$this->load->view('templates/header');
		$this->load->view('product/create_pur_invoice');
		$this->load->view('templates/footer');
	}
	
	public function get_product_ajax($productCode){
		$data['product_autoload'] = $this->product_model->get_product_by_code($productCode);
		
		echo json_encode($data['product_autoload']);
	}
	
	public function save_product_ajax(){
		
		if(isset($_REQUEST)){
			$arr = array();
			$as = array_values($_REQUEST['table_array']);
			$sizeas = count($as);
			$darray = array_chunk($as,8);
			foreach($darray as $d){
				$arr[] = array(
				'code'=>$d[0],
				'name'=>$d[1],
				'type'=>$d[2],
				'color'=>$d[3],
				'size'=>$d[4],
				'price'=>$d[5],
				'qty'=>$d[6],
				'amount'=>$d[7]
				);
			}
			
			echo json_encode($arr);
		}else{
			echo json_encode(0000);
		}
	} 
	
}
