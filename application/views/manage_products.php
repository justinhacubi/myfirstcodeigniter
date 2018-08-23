  <?php 
include('header.php');
  ?>
  <body>


  <?php 
include('nav_top.php');
  ?>

<div class="container">

  <div class="row" style="margin-top:5%;">

              <div class="col-md-12">
                   <ol class="breadcrumb">
                    
                   <li><a onclick="makeAjaxRequest(1)">Products List</a></li>
                   <li><a onclick="makeAjaxRequest(2)">Add Products</a></li>
                  



                
                
                    </ol>
                     
                        <div id="maincont">
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

  var gpid="";



 $(document).ready(function() {

  makeAjaxRequest(1);  



        
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

     if(j==2){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/manageprod',
      type: 'POST',
      data: {j:j,},
        success: function(response){
       
        $('div#maincont').html(response);

      
        }
      });
    
    }


     if(j==3){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/manageprod',
      type: 'POST',
      data: {j:j,gpid:gpid,},
        success: function(response){
       
       if(response == 1){
          alert("Product Deleted");
           location.reload(); 
       }

      
        }
      });
    
    }


         if(j==4){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/manageprod',
      type: 'POST',
      data: {j:j,gpid:gpid,},
        success: function(response){

        if(response == 1){
          alert("Product Restored");
           location.reload(); 
       }

      
        }
      });
    
    }

    



  


    
    
  }

  function gdel(str){

    gpid=str;

    makeAjaxRequest(3);

  }

  function gres(str){

    gpid=str;

    makeAjaxRequest(4);

  }

 




</script>
  





</html>