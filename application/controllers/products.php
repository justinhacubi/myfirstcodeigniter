<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller{



	function __construct(){
	parent::__construct();

	$this->load->model('products_model');

	}

	function manage_products(){
	$this->load->view('manage_products');
	}

       function editProd(){

  $id = $this->uri->segment(3);
  $data['gprod'] = $this->products_model->getProdId($id);
  $this->load->view('edit_product' , $data);



  }


	


    function manageprod(){

     $getj = $this->input->post('j');

     if($getj == 1){

           $data = $this->products_model->get_all_products();
         ?>

           <div class="table-responsive" style="width:100%;">
               <table class="table table-bordered" id="dataProd"  cellspacing="0">
                             <thead>
                      <tr>

                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Category</th>
                        <th>Status</th>
                         <th>Action</th>
                       
                        
                       
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>

                         <th>Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Category</th>
                        <th>Status</th>
                         <th>Action</th>
                     
                      </tr>
                    </tfoot>

               <?php 
                foreach ($data as $datas) {
               ?>   
                <tr align="center">
                  <td><img class="img img-thumbnail" src="<?php echo base_url()."prodimg/".$datas['p_img'];?>" style="width:250px;height: 250px;"></td>
                   <td ><h4><?php echo $datas['p_name']; ?></h4></td>
                    <td><h4><?php echo $datas['p_price']; ?></h4></td>
                    <td><h4><?php echo $datas['p_type']; ?></h4></td>
                     <td>
                         <?php if($datas['p_status'] == 1){
                               ?>
                                <h4>Active</h4>
                               <?php
                                 }
                         ?>

                          <?php if($datas['p_status'] == 2){
                               ?>
                                <h4>Not Active</h4>
                               <?php
                                 }
                         ?>


                     </td>
                     <td><a href="<?php echo base_url()."products/editProd/".$datas['p_id'];?>"> <button  style="width:67px;"class="btn btn-info">Edit</button></a>&nbsp;<button class="btn btn-danger" onclick="gdel(<?php echo $datas['p_id']; ?>)">Delete</button> &nbsp; <button class="btn btn-danger" onclick="gres(<?php echo $datas['p_id']; ?>)">Restore</button></td>
                </tr>

                <?php 
                 }
               ?>   
                 
                    </table>
                  <script>
               $(document).ready(function() {
                $('#dataProd').DataTable();
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
                  <img data-src="holder.js/100%x100%" alt="..."    src="<?php echo base_url();?>prodimg/default.png">
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
              <label>Product Name</label>
              <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Product Name" required>
              </div>

               <div class="form-group">
              <label >Product Price</label>
              <input type="number" min="1" step="any" class="form-control" id="txtprice"  name="txtprice" placeholder="Product Price" required>
            </div>

             <div class="form-group">
            <h4>Product Type</h4>
            <select class="form-control" name="txtype">
              <label for="exampleInputEmail1">Product Type</label>
                   <option value="Meals" selected>Meals</option>
                   <option value="Burgers">Burgers</option>
                    <option value="Dessert">Dessert</option>
                     <option value="Drinks">Drinks</option>
                 
                </select>
                       </div>
                       <br>

            <button class="btn btn-success" id="btn_upload" type="submit" style="float:right;">Add</button>

              </form>

              <script>

            $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>products/insertProd',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:true,
                      success: function(response){


                         if(response == 1){

                             location.reload(); 
                         }

                         if(response == 2){

                            $('h3#error').html("Please Select Image");
                         }

                        
                          
                   }
                 });
            });

              </script> 

         <?php
     }

      if($getj == 3){

                    $getp = $this->input->post('gpid');

                     $pdata['p_status']="2";

                    
                    $res=$this->products_model->update_product($pdata,$getp);

                    if($res){

                      echo "1";

                    }




         }



               if($getj == 4){

                    $getp = $this->input->post('gpid');

                     $pdata2['p_status']="1";

                    
                    $res=$this->products_model->update_productres($pdata2,$getp);

                    if($res){

                      echo "1";

                    }




         }


   }

   function insertProd(){  

            $config['upload_path']="./prodimg";
            $config['allowed_types']='gif|jpg|png';
              





               $this->load->library('upload',$config);

               if( !$this->upload->do_upload('userFile')){
                  $error = array('error' => $this->upload->display_errors() );
                   $file_name = "default.png";

                      echo "2";


               }
               else{


                    $data=$this->upload->data();
                    $file_name = $data['file_name'];



                    $pdata['p_uid'] = $this->input->post('txtname');
                    $pdata['p_price'] = $this->input->post('txtprice');
                    $pdata['p_type'] = $this->input->post('txtype');
                    $pdata['p_img'] = $file_name;
                    $pdata['p_status'] = 1;
               
               
                

                  

                            $gpass= $this->input->post('txtpass');
                            $gpass2 =  $this->input->post('txtrepass');
                             
                         

                                 $res = $this->products_model->insert_products_to_db($pdata);

                        if($res){
                          echo "1";
                        }

                             
                           
                                
                                
                             




                   
                  
               }
         





         
      }


      function showProd(){

       $getj = $this->input->post('j');

       if($getj == 1){


       }

         if($getj == 2){
          ?>

          <div class="panel panel-default" style="height: 900px;border:10px solid #2c3e50;border-radius: 5px; overflow-y: scroll;"> 
            <div class="panel-body">
           
            <button class="btn" style="background-color:#2c3e50;font-size:20px;color:white; width:325px;" onclick="gclickP('Meals')">Meals</button>
            <button class="btn" style="background-color:#2c3e50;font-size:20px;color:white; width:325px;" onclick="gclickP('Burgers')">Burger</button>
            <button class="btn" style="background-color:#2c3e50;font-size:20px;color:white; width:325px;" onclick="gclickP('Dessert')">Dessert</button>
            <button class="btn" style="background-color:#2c3e50;font-size:20px;color:white; width:325px;" onclick="gclickP('Drinks')">Drinks</button>
           
                       <div id="foodcont" align="center" style="margin-top: 20px;">
                       </div> 
           </div>
        </div>
              


         <?php
                        }
          if($getj == 3){

             $getp = $this->input->post('gprod');

             $data = $this->products_model->get_product_meal($getp);
             foreach ($data as $datas) {
          ?>
              <div class="panel panel-default" style="margin-top:10px;width:450px;display: inline-block;text-align: center;border:5px solid #2c3e50;margin-left:10px;">
                <div class="panel-body">

               <img class="img img-thumbnail" src="<?php echo base_url()."prodimg/".$datas['p_img'];?>" style="width:250px;height: 150px;">

                  <h3><?php echo  $datas['p_name'];?><h3>
                    <h3>P <?php echo  $datas['p_price'];?><h3>
                  <button type="button" class="btn btn-info btn-lg"  onclick="selectP('<?php echo $datas['p_id'];?>' , '<?php echo  $datas['p_name'];?>', '<?php echo  $datas['p_price'];?>')" data-toggle="modal" data-target="#myModal">Order</button>
                </div>
              </div>



            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h3 id="foodname" class="modal-title"></h3>
                    </div>
                    <div class="modal-body">
                          <div class="form-group">
                          <h3 id="foodtotal" class="modal-title"></h3>
                          <h4>Quantity</h4>
                          <input type="hidden"  id="gid" value="">
                          <input type="hidden"  id="gname" value="">
                           <input type="hidden"  id="getprice" value="">

                          <input type="number" value="1" id="getqty" onchange="calcu(this.value) "min="1" max="500">
                           </div>
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal" onclick="tablePut();">Order</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Order</button>
                    </div>
                  </div>
                  
                </div>
              </div>

        <?php
                                        }

                           }

           if($getj == 4){
            ?>
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                </tr>
               
             
              </table>

           <?php
           }

                   if($getj == 5){
                        $gbill=0;
                        $gpname = $this->input->post('spname');
                        $gpid = $this->input->post('spid');
                        $gprice = $this->input->post('sprice');
                        $gtotalb = $this->input->post('stotalb');
                        $gqty = $this->input->post('sqty');


                        $getpname = explode("-", $gpname);
                        $getpid = explode("-", $gpid);
                        $getprice = explode("-", $gprice);
                        $getotal = explode("-", $gtotalb);
                        $getqty = explode("-", $gqty);

                        ?>
                          <table class="table table-bordered">
                               <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                              </tr>

                        <?php

                   for($x=0 ; $x < sizeof($getpname) ; $x++){  
                    $gbill=$gbill + $getotal[$x];

            ?>

                 <h1></h1>
          
                 <tr>
                  <th><?php echo $getpname[$x]; ?></th>
                  <th><?php echo $getprice[$x]; ?></th>
                  <th><?php echo $getqty[$x]; ?></th>           
                  <th><?php echo $getotal[$x]; ?></th>
                </tr>

           <?php
                         }



                         ?>
                      <tr>
                       <td colspan="4" style="font-size: 20px;"><?php echo "Total: ".$gbill; ?></td>
                      </tr>  
                      <tr>

                       <td colspan="4" style="font-size: 15px;"> 
              
                        <h3>Payment Form</h3>
                        <h4 id="pchange">Change:</h4>
                        
                        <hr style="border:2px solid  #2c3e50">
                           <div class="form-group">
                           <label style="font-size:18px;">Payment:  </label>
                          
                           <input type="hidden"  id="gtpid" value="<?php echo $gpid; ?>">
                           <input type="hidden"  id="gtprice" value="<?php echo $gprice; ?>">
                          <input type="hidden"  id="gtbill" value="<?php echo $gbill; ?>">
                           <input type="hidden"  id="gtname" value="<?php echo $gpname; ?>">
                           <input type="hidden"  id="gtqty" value="<?php echo $gqty; ?>">

                              
                         
                         
                          <input type="number"  id="getpayment" onchange="gpay(this.value)" min="1" >

                               <button class="btn btn-danger" style="float:right;" onclick="makeAjaxRequest(6)">Pay</button>

                        </div>

                       </td>

                      </tr> 
                       </table>

                         <?php

                                  }

                                            





     }


               function edit_upload(){
                       $config['upload_path']="./prodimg";
                       $config['allowed_types']='gif|jpg|png';
                      

                       $this->load->library('upload',$config);


                       $pdata['p_name'] = $this->input->post('txtname');
                       $pdata['p_price'] = $this->input->post('txtprice');
                       $pdata['p_type'] = $this->input->post('txtype');
                       $gimg = $this->input->post('txtimg');
                       $gpid = $this->input->post('txtpid');

                     




                       if( !$this->upload->do_upload('userFile')){
                          $error = array('error' => $this->upload->display_errors() );
                           $file_name = $gimg;


                       }
                       else{

                    

                          

                            $data=$this->upload->data();
                            unlink("./prodimg/".$gimg);
                            $file_name = $data['file_name'];
                           
                          
                       }

                       //data
                      $pdata['p_img'] = $file_name ;
                     
                 
                       //data

                       



                               $res=$this->products_model->edit_product($pdata, $gpid);


                if($res){

               
                      ?>

             <script>
                window.location.href='<?php echo base_url();?>products/manage_products';
                alert('Data Edited');

            </script>
                <?php 

                }
                  



              }



		


}
?>