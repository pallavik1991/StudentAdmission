<?php
include_once 'database.php';
include_once 'admission.php';

$database = new Database();
$db = $database->getConnection();

$admission = new Admission($db);
$msg="";
 
    try{
    	if (empty($_POST["param_usn"])) {
            $msg = " Student USN is required ";
        }
        else
        {
             $admission->student_usn=$_POST["param_usn"];    
        }
    	if (empty($_POST["param_academic"])) {
            $msg.= "<br> Academic Year is required ";
        }
        else
        {
             $admission->academic_year=$_POST["param_academic"];
        }
    	if (empty($_POST["param_installments"])) {
            $msg.= "<br> Total Installments is required ";
        }
        else
        {
             $admission->total_installments=$_POST["param_installments"];
        }
		 if (empty($_POST["param_paymentdate"])) {
            $msg.= "<br> Payment Date is required ";
        }
        else
        {
             $admission->payment_plan_date=$_POST["param_paymentdate"];
        }

        if (empty($_POST["param_joindate"])) {
            $msg.= "<br> Join Date is required ";
        }
        else
        {
             $admission->joindate=$_POST["param_joindate"];
        }   	
    	$admission->payment_type=$_POST["param_paymenttype"];
        $admission->promotion_status=$_POST["param_promotion"];
        $admission->feesconcession_given=$_POST["param_concession"];

        if(empty($msg))
        {


        if($admission->create()){
            $msg="Success";
          
        }
    
    else{
         $msg= "Unable";
        }
         echo json_encode($msg);
    }
    else
    {
    	 echo json_encode($msg);
    }
    }
    catch(Exception $ex)
    {
        $msg=$ex.errorMessage();
    }
    finally{
        //echo $msg;
    }
 
?>
