<?php

class Sales_model extends CI_Model {

			function __construct()

			{

			parent::__construct();

			$this->load->database("");

			}




			


             	public function insert_sales_to_db($data){

					return $this->db->insert('sales', $data);
			}



				public function getref()

			{

				$this->db->select("*");
				$this->db->from("sales");
			
			   $sql = $this->db->get();
  
               return $sql->result_array();
	
	

             }



             public function getSales($gd, $gd2){

 return $this->db->query('select *, sa.`s_pid` as gpid  from sales sa LEFT JOIN products pr ON (sa.`s_pid` = pr.`p_id`) LEFT JOIN users us ON (sa.`s_uid` = us.`u_id`) 
  where s_date BETWEEN "'.$gd.'" and "'.$gd2.'"  ')->result_array();
        }

			


	






}

?>
