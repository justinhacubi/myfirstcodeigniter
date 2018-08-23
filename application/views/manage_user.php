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
                   <li><a onclick="makeAjaxRequest(1)">Employee List</a></li>
                   <li><a onclick="makeAjaxRequest(2)">Add Employee</a></li>

                
                
                    </ol>
                     
                        <div id="maincont">
                         </div>


             </div>

            <div class="col-md-0">.col-md-4</div>

</div>



    





      

</div>      



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <?php 
 include('footer.php');
  ?>
    
  </body>

<script>





 $(document).ready(function() {

  makeAjaxRequest(1);

  

        
  });


  function makeAjaxRequest(j) {
  


       if(j==1){
      
      $.ajax({
      url: '<?php echo base_url(); ?>users/users_list',
      type: 'POST',
      data: {j:j,},
        success: function(response){
       
        $('div#maincont').html(response);

      
        }
      });
    
    }

     if(j==2){
      
      $.ajax({
      url: '<?php echo base_url(); ?>users/users_list',
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