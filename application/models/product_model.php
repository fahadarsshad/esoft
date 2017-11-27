<?php
class Product_model extends CI_Model{
	function __construct(){
				
	}
	
	function get_all_products(){
		$query = $this->db->query("select products.product_id AS pid,products.product_code AS pcode,products.product_name AS pname,products.product_image AS pimage,product_shead.shead_id AS ptypeid,product_shead.shead_name AS ptypename,products.product_cprice AS cprice,products.product_wprice AS wprice,products.product_rprice AS rprice,product_size.size_id AS psizeid,product_size.size_name AS psizename,product_color.color_id AS pcoloreid,product_color.color_name AS pcolorname,products.product_balance AS pqtybalance from products inner join product_shead on products.product_shead = product_shead.shead_id left join product_size on products.product_size_id = product_size.size_id left join product_color on products.product_color_id = product_color.color_id where products.is_delete=0 and products.is_active=1");
		
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
	
	function get_product_size(){
		$query = $this->db->query("SELECT * FROM product_size WHERE is_delete=0 AND is_active=1");
		
		return $query->result_array();
	}
	
	function get_product_color(){
		$query = $this->db->query("SELECT * FROM product_color WHERE is_delete=0 AND is_active=1");
		
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
	
	function get_product_by_code($productCode){
		$query = $this->db->query("SELECT * FROM products WHERE product_code='$productCode' AND is_delete=0 AND is_active=1");
		
		return $query->row_array();
	
	}
}
?>