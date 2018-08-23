  <?php 
include('header.php');
  ?>
  <body>


  <?php 
include('nav_top.php');


  ?>

<div class="container-fluid">

<input type="hidden"  id="gusername" value="<?php echo $guname; ?>">
<input type="hidden"  id="getdate" value="<?php echo $gdate; ?>">
     
  <div class="row">

  
              <div class="col-md-9">
                
                     
                        <div id="maincont">

                         

                            <div id="piechart" style="float:right;"></div>

                    


                         </div>


             </div>

            <div class="col-md-3">


                        <div id="maincont2">
                                <h1 style="margin-top:20%;">Generate Report</h1>

                                <form  action="<?php echo base_url();?>sales/showReport" method="post" enctype="multipart/form-data">

                                  <div class="form-group">
                                <label>Date from</label>
                                <input type="date" class="form-control" id="txtdate" name="txtdate"   data-date=""  value="<?php echo $gdate; ?>" required>
                                </div>


                                   <div class="form-group">
                                <label>Date to</label>
                                <input type="date" class="form-control" id="txtdate2" name="txtdate2" value="<?php echo $gdate; ?>" required>
                                </div>

                                <button class="btn btn-danger" type="submit" >Generate</button>

                                </form>

                         </div>

              

            </div>

</div>




</div>      



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <?php 
 include('footer.php');
  ?>
    
  </body>

      <script type="text/javascript">

                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        // Draw the chart and set the chart values
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                          ['Product', 'Quantity'],
                             <?php
                              foreach($gchart as $gc){

                                echo "['".$gc['p_name']."',".$gc['gqty']."],";

                              }

                             ?>
                        ]);

                          // Optional; add a title and set the width and height of the chart
                          var options = {'title':'Sales Chart', 'width':1500, 'height':1000};

                          // Display the chart inside the <div> element with id="piechart"
                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                          chart.draw(data, options);
                        }
                        </script>

<script>

  var gpid = new Array();
  var gpname= new Array();
  var gprice= new Array();
  var gqty= new Array();
  var gtotalb= new Array();

  var spid = new Array();
  var spname= new Array();
  var sprice= new Array();
  var sqty= new Array();
  var stotalb= new Array();


var gprod="";
var getuname="";
var getprice="";
var gtotal="";
var guid="";

 $(document).ready(function() {

       <?php 
       if($getype == "e"){
       ?>
         makeAjaxRequest(2);
         makeAjaxRequest(4);
         gclickP('Meals');
       <?php
       } 

        ?>

           <?php 
       if($getype == "a"){
       ?>
      
       
       
       <?php
       } 

        ?>


        
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
        alert("Success")
       }
       if(response == 2){
       $('h3#error').html("Wrong username or password");
       }
        
      
        }
      });
    
    }


       if(j==2){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/showProd',
      type: 'POST',
      data: {j:j,},
        success: function(response){
       
        $('div#maincont').html(response);

     
      
        }
      });
    
    }


         if(j==3){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/showProd',
      type: 'POST',
      data: {j:j,gprod:gprod,},
        success: function(response){
       
        $('div#foodcont').html(response);


     
      
        }
      });
    
    }

       if(j==4){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/showProd',
      type: 'POST',
      data: {j:j,gprod:gprod,},
        success: function(response){
       
        $('div#maincont2').html(response);
  

     
      
        }
      });
    
    }


    if(j==5){
      
      $.ajax({
      url: '<?php echo base_url(); ?>products/showProd',
      type: 'POST',
      data: {j:j,spname:spname,spid:spid,sprice:sprice,stotalb:stotalb,sqty:sqty, },
        success: function(response){
       
        $('div#maincont2').html(response);
  


     
      
        }
      });
    
    }

       if(j==6){

       
        guid=<?php echo $getid; ?>;

      $.ajax({
      url: '<?php echo base_url(); ?>sales/insertSales',
      type: 'POST',
      data: {j:j, guid:guid , gtbill:$("#gtbill").val(),  gtqty:$("#gtqty").val(),  gtpid:$("#gtpid").val(), gtpay:$("#getpayment").val(), gtname:$("#gtname").val(),gtprice:$("#gtprice").val(), getuname:$("#gusername").val(),getdate:$("#getdate").val(),},
        success: function(response){
       
             

     
        if(response == 2){
          alert("The payment is less than the bill");
        }
        else{
            loadReceipt(response);
        }
  


     
      
        }
      });
    
    }


     




    

    



  


    
    
  }

 function selectP(gpid,gpname,gprice){

  $('h3#foodtotal').html("Total: P" + gprice);
  $('h3#foodname').html(gpname + " - P" + gprice);
    document.getElementById("gid").value =  gpid;
    document.getElementById("gname").value =  gpname;
    document.getElementById("getprice").value =  gprice;
    getprice=gprice;
 }

  function gclickP(str){
  
  gprod=str;
  makeAjaxRequest(3);


 }

 function calcu(str){
  gtotal= getprice * str;
   $('h3#foodtotal').html("Total: P" + gtotal);
 }
 function tablePut()
 {

 gpid.push($("#gid").val());
 gpname.push($("#gname").val());
 gprice.push($("#getprice").val());
 gqty.push($("#getqty").val());
 gtotalb.push(gtotal);
 gtotal=0;

for(var i=0 ; i < gpname.length ; i++){
    if(i == 0 ){
      spname = gpname[i];
      sqty=gqty[i];
       spid = gpid[i];
       sprice = gprice[i];
      
     if(gqty[i] == 1){
       stotalb = gprice[i];
     }
     else {
        stotalb = gtotalb[i];
     }


    }
    else {
      spname = spname + "-" + gpname[i];
      spid = spid + "-" + gpid[i];
      sprice = sprice + "-" + gprice[i];
     
       sqty= sqty+ "-" + gqty[i];

        if(gqty[i] == 1){
     
       stotalb = stotalb+ "-" + gprice[i];
     }
     else {
          stotalb = stotalb+ "-" + gtotalb[i];
     }


    }

}







makeAjaxRequest(5);

    document.getElementById("getqty").value =  1;


 }

 function gpay(str)
 {


  var gtb=$("#gtbill").val();

 if(+str < +gtb){

  
     $('h4#pchange').html("Change:");

 }
 else if(+str > +gtb) {

  var gchange=str-gtb;

  
     $('h4#pchange').html("Change: " + gchange);

 }


 }

 function loadReceipt(str){
    window.location.href='<?php echo base_url();?>sales/loadRec/' + str;
 }

 


</script>
  





</html>