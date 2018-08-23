<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Sales extends CI_Controller{



  function __construct(){
  parent::__construct();

  $this->load->model('sales_model');

  }

  function loadRec(){
  $gstr = $this->uri->segment(3);
  $data['page_str'] = $gstr;
  $this->load->view('gfpdf', $data);
  }
  


  function insertSales(){


$getj = $this->input->post('j');

     if($getj == 6){

           $getuid = $this->input->post('guid');
           $getbill = $this->input->post('gtbill');
           $getname = $this->input->post('gtname');
           $getuser = $this->input->post('getuname');
           $gpid = $this->input->post('gtpid');
           $gqty = $this->input->post('gtqty');
           $gprice = $this->input->post('gtprice');
           $gpay = $this->input->post('gtpay');
           $gdate = $this->input->post('getdate');

           $getref=0;

            $data = $this->sales_model->getref();

             if($data !=null){

                      foreach ($data as $datas) {
                         $getref = $datas['refno'] + 1;
                             }

             }
             else if ($data == null) {
              $getref = 1;

             }


       if($gpay >= $getbill){


         $gchange=$gpay-$getbill;


               
                $getpid = explode("-", $gpid);
                $getqty = explode("-", $gqty);
                $getprice = explode("-", $gprice);
              


              for($x= 0 ; $x < sizeof($getpid) ; $x++){



                        $sdata['s_pid'] = $getpid[$x];
                        $sdata['s_qty'] = $getqty[$x];
                        $sdata['refno'] = $getref;
                        $sdata['s_date'] = $gdate;
                         $sdata['s_uid'] = $getuid;

                      

                       
 

                    $res = $this->sales_model->insert_sales_to_db($sdata);


                 if($x == sizeof($getpid) - 1){
                    if($res){


                        
                        echo $getname."^".$gqty."^".$gprice."^".$getbill."^".$gpay."^".$gchange."^".$getuser."^".$getref;

                         
    
                       

                    }

                 }

                  




              }


            } else {
              echo "2";
            }
               

        

      }
              
 
  }


  function showReport(){
  $gdate = $this->input->post('txtdate');
  $gdate2 = $this->input->post('txtdate2');

 





    $data['gsales'] = $this->sales_model->getSales($gdate,$gdate2);
  $this->load->view('show_report.php' , $data);


  }



 




    


}
?>