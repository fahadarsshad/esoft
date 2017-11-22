<?php
class Product_model extends CI_Model{
	function __construct(){
				
	}
	
	function get_all_products(){
		$query = $this->db->query("select * from products inner join product_shead on products.product_shead = product_shead.shead_id where products.is_delete=0 and products.is_active=1");
		
		return $query->result_array();
	}
	
	function get_product_by_id($product_id){
		$query = $this->db->query("SELECT * FROM products INNER JOIN product_shead ON  product_shead.shead_id = products.product_shead INNER JOIN product_mhead ON  product_mhead.mhead_id = products.product_shead where products.product_id='$product_id' AND products.is_delete=0 AND products.is_active=1");
		
		return $query->row_array();
	}
	
	function get_product_sheads(){
		$query = $this->db->query("SELECT * FROM product_shead WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_product_mheads(){
		$query = $this->db->query("SELECT * FROM product_mhead WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function insert_product($data){
		$this->db->insert('products',$data);
		return $this->db->insert_id();
	}
	
	function create_code($product_code,$mhead_id,$product_id){
		$this->db->where('product_id', $product_id);
		return $this->db->update('products',array('product_code'=>$product_code,'product_mhead'=>$mhead_id));
	}
	
	function update_product($data,$product_id){
				$this->db->where('product_id', $product_id);
		return $this->db->update('products',$data);
	}
	
	function delete_product($product_id){
		$this->db->where('product_id', $product_id);
		return $this->db->update('products',array('is_delete'=>1,'is_active'=>0));
	}
	
	function get_mhead_by_shead($shead){
			$query = $this->db->query("SELECT * FROM product_shead WHERE shead_id='$shead' AND is_delete=0 AND is_active=1 LIMIT 1");
			
			return $query->row_array();
				
	}
}
?>