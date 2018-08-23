<?php

class products_model extends CI_Model {

			function __construct()

			{

			parent::__construct();

			$this->load->database("");

			}

				public function insert_products_to_db($data){

					return $this->db->insert('products', $data);
			}




					public function get_all_products()

			{

				$this->db->select("*");
				$this->db->from("products");
			     $sql = $this->db->get();
    
               return $sql->result_array();
	
	

             }

             	public function getProdId($id){
				$query = $this->db->get_where('products',array('p_id'=>$id));
				
				return $query->row_array();
				}



             			public function get_product_meal($gp)

			{

				$this->db->select("*");
				$this->db->from("products");
			     $this->db->where('p_type',$gp);
			      $this->db->where('p_status',"1");
			   $sql = $this->db->get();
    
               return $sql->result_array();
	
	

             }

             	public function update_product($data,$id)

				{

				$this->db->where('products.p_id',$id);

				return $this->db->update('products', $data);

				}



				 	public function update_productres($data,$id)

				{

				$this->db->where('products.p_id',$id);

				return $this->db->update('products', $data);

				}

					public function edit_product($data,$id)

				{

				$this->db->where('products.p_id',$id);

				return $this->db->update('products', $data);

				}







	



}

?>
