<?php
include_once 'database.php';
include_once 'studentmaster.php';

$database = new Database();
$db = $database->getConnection();
$student = new Student($db);
$msg="";
 
    try{
    	if (empty($_POST["param_usn"])) {
            $msg = " Usn is required ";
        }
        else
        {
             $student->student_usn=$_POST["param_usn"];    
        }
    	if(empty($msg))
        {

        	$val=$student->fetchFees();
         echo json_encode($val);
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
