  <?php 
include('header.php');
  ?>
  <body>


  <?php 
include('nav_top.php');
extract($gprod);
  ?>

<div class="container">

  <div class="row" style="margin-top:5%;">

              <div class="col-md-12">

                     
                        <div id="maincont">

                           <form  action="<?php echo base_url();?>products/edit_upload" method="post" enctype="multipart/form-data" style="width: 30%;margin-left:auto; margin-right: auto;">

                             <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-left:120px;">
                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <img data-src="holder.js/100%x100%" alt="..."    src="<?php echo base_url()."prodimg/".$p_img;?>">
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

                        <input type="hidden" class="form-control" id="txtpid" value="<?php echo $p_id;?>" name="txtpid" placeholder="Product Name" required>
                        <input type="hidden" class="form-control" id="txtimg" value="<?php echo $p_img;?>" name="txtimg" placeholder="Product Name" required>


                        <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="txtname"  name="txtname"  value="<?php echo $p_name;?>"placeholder="Product Name" required>
                        </div>

                         <div class="form-group">
                        <label >Product Price</label>
                        <input type="number" min="1" step="any" class="form-control" id="txtprice"   value="<?php echo $p_price;?>"name="txtprice" placeholder="Product Price" required>
                      </div>

                       <div class="form-group">
                      <h4>Product Type</h4>
                      <select class="form-control" name="txtype">
                        <label for="exampleInputEmail1">Product Type</label>
                            <option value="<?php echo $p_type;?>" selected><?php echo $p_type;?></option>
                             <option value="Meals">Meals</option>
                             <option value="Burgers">Burgers</option>
                              <option value="Dessert">Dessert</option>
                               <option value="Drinks">Drinks</option>
                           
                          </select>
                                 </div>
                                 <br>

                      <button type="submit" class="btn btn-success" style="float:right;">Update</button>

                        </form>


                         </div>


             </div>

            <div class="col-md-0"></div>

</div>



    





      

</div>      



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <?php 
 include('footer.php');
  ?>
    
  </body>

<script>

 



 $(document).ready(function() {





        
  });


  function makeAjaxRequest(j) {
  


       if(j==1){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/manageprod',
      type: 'POST',
      data: {j:j,},
        success: function(response){
       
        $('div#maincont').html(response);

      
        }
      });
    
    }

 

    



  


    
    
  }

  

 




</script>
  





</html>