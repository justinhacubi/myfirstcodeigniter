<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller{



	function __construct(){
	parent::__construct();

	$this->load->model('users_model');

	}
	function index(){
	$this->load->view('index');
	}

  function trial(){
  $this->load->view('trial');
  }

	function home(){
  $data['gchart']=$this->users_model->getC();
	$this->load->view('home', $data);
	}

	function manage_user(){
	$this->load->view('manage_user');
	}


	function logout(){
		$this->session->sess_destroy();
		$this->load->view('index');
	}


		function users_login(){


				$username = $this->input->post('usern');
				$password = $this->input->post('passw');


		         $checker = $this->users_model->loginuser($username,$password);


		         if($checker == 1) {
		         	echo 1;
		         } else {
		         	 echo "2";
		         }
        
	}

		function users_list(){

	   $getj = $this->input->post('j');

	   if($getj == 1) {

            $data = $this->users_model->get_all_users();
            ?>
         <div class="table-responsive" style="width:100%;">
               <table class="table table-bordered" id="dataUsers"  cellspacing="0">
                  	         <thead>
			                <tr>
			                  <th>Name</th>
			                  <th>Username</th>
			                   <th>Action</th>
			                 
			                  
			                 
			                </tr>
			              </thead>
			              <tfoot>
			                <tr>
			                   <th>Name</th>
			                  <th>Username</th>
			                    <th>Action</th>
			                  
			               
			                </tr>
			              </tfoot>

	   	   <?php
             foreach ($data as $datas) {
           ?>

                   <tr>
		         <td><?php echo $datas['u_name']; ?></td>
		          <td><?php echo $datas['u_usern']; ?></td>
		          <td align="center"><button class="btn btn-info" style="width:60px;">Edit</button>&nbsp;<button class="btn btn-danger">Delete</button></td>
		         </tr>

            <?php
              }
            ?>  
             </table>
		              <script>
						   $(document).ready(function() {
								$('#dataUsers').DataTable();
							});

						</script>

              </div>

              <?php
	        }
        if($getj == 2){
        	?>

        	  <form class="form-horizontal" id="submit" style="width: 30%;margin-left:auto; margin-right: auto;">

                   <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-left:120px;">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  <img data-src="holder.js/100%x100%" alt="..."    src="<?php echo base_url();?>/public/images/userpic.png">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="userFile"></span>
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
              <h3 id="error" style="color:red;"></h3>
               <br>
               <br>
              <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" id="txtfname" name="txtfname" placeholder="Product Name" required>
              </div>

               <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="txtusername" name="txtusername" placeholder="Username" required>
              </div>

              <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Password" required>
              </div>

                  <div class="form-group">
              <label>Re-type Password</label>
              <input type="password" class="form-control" id="txtrepass" name="txtrepass" placeholder="Re-type Password" required>
              </div>

              <br>

            <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>

              </form>

              <script>

            $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>users/insertUser',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:true,
                      success: function(response){


                         if(response == 1){

                            $('h3#error').html("Password Doesnt Match");
                         }

                           if(response == 2){

                             location.reload(); 
                         }
                          
                   }
                 });
            });

              </script>	

        	<?php
        }

			
        
	}



	function insertUser(){  

				    $config['upload_path']="./userimg";
                   $config['allowed_types']='gif|jpg|png';
              





               $this->load->library('upload',$config);

               if( !$this->upload->do_upload('userFile')){
                  $error = array('error' => $this->upload->display_errors() );
                   $file_name = "default.png";


               }
               else{
               	    $data=$this->upload->data();
               	    $file_name = $data['file_name'];
               	   
               	  
               }
         




				  $pdata['u_name'] = $this->input->post('txtfname');
				  $pdata['u_usern'] = $this->input->post('txtusername');
				  $pdata['u_pass'] = $this->input->post('txtpass');
				  $pdata['u_type'] = "2";
				  $pdata['u_img'] = $file_name;
				  $pdata['u_type'] = "e";
			

				

                  $gpass= $this->input->post('txtpass');
                  $gpass2 =  $this->input->post('txtrepass');
                   
                   if($gpass == $gpass2){

                       $res = $this->users_model->insert_users_to_db($pdata);

				    	if($res){
				    	  echo "2";
				    	}


                   }
                   else {
                   		
                         echo "1";
                   }

				 
			}




		


}
?>