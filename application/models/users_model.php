<?php

class Users_model extends CI_Model {

			function __construct()

			{

			parent::__construct();

			$this->load->database("");

			}




					public function loginuser($guser , $gpass)

			{


            $sql="select * from users where u_usern='".$guser."' AND u_pass='".$gpass."'";
            $result=$this->db->query($sql);

	
			 $row = $result->row();

			       if($result->num_rows() > 0) {

             $sess_data =array (
                     'gid' => $row->u_id,
                     'guser' => $row->u_name,
                     'gtype' => $row->u_type
             );

             $this->session->set_userdata($sess_data);


			       	return 1;
			       }
			       else {
			       	return false;
			       }

			}




					public function get_all_users()

			{

				$this->db->select("*");
				$this->db->from("users");
			     $this->db->where('u_type',"e");
			   $sql = $this->db->get();
    
               return $sql->result_array();
	
	

             }



             	public function insert_users_to_db($data){

					return $this->db->insert('users', $data);
			}


				public function getC()

			{

				$str="s_qty";

				return $this->db->query('select * ,  sa.`s_pid` as gpid , SUM(s_qty) as gqty from sales sa LEFT JOIN products pr ON (sa.`s_pid` = pr.`p_id`) GROUP BY s_pid')->result_array();

			}




	
			


	






}

?>
