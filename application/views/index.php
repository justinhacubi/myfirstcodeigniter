<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Bootstrap 101 Template</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<style>
a { color: inherit; } 
</style>
  </head>
  
  <body style="background-color: #2c3e50;color:white;">

<div class="row" style="margin-top:15%;">
        <div class="col-md-4"></div>

                  <div class="col-md-4">


                          <div class="panel panel-default" style="color:gray;text-align: center;">
                            <div class="panel-body">
                              <h1>Login</h1>

                              <h3 id="error" name="error" style="color:red">.</h3>

                                <div class="form-group">
                                  <label for="usern">Username</label>
                                  <input type="text" class="form-control" id="usern" name="usern" placeholder="Username">
                                </div>

                                <div class="form-group">
                                  <label for="usern">Password</label>
                                  <input type="password" class="form-control" id="passw" password="passw" placeholder="Password">
                                </div>

                                <button class="btn btn-success" onclick="makeAjaxRequest(1)">Login</button>


                            </div>
                          </div>
                          

                  </div>

        <div class="col-md-4"></div>
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
      url: '<?php echo base_url(); ?>users/users_login',
      type: 'POST',
      data: {j:j,usern:$("#usern").val(),passw:$("#passw").val(),},
        success: function(response){
       
       // $('div#maincont').html(response);

       if(response == 1){
         window.location.href = "<?php echo base_url(); ?>users/home";    
       }
       if(response == 2){
       $('h3#error').html("Wrong username or password");
       }
        
      
        }
      });
    
    }

    



  


    
    
  }

 




</script>
  





</html>