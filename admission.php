<?php

class Admission{
	//database connection and table name

private $conn;
private $table_name="admission";

//object properties
public $student_usn;
public $batch_code;
public $rollnumber;
public $class_no;
public $division;
public $academic_year;
public $fees;
public $payment_type;
public $total_installments;
public $payment_plan_date;
public $fees_balance;
public $promotion_status;
public $joindate;
public $feesconcession_given;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{

	$query="INSERT INTO ".$this->table_name. "(student_usn,academic_year,fees,payment_type,total_installments,payment_plan_date,promotion_status,joindate,feesconcession_given) values(?,?,?,?,?,?,?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->student_usn);
	$stmt->bindParam(2,$this->academic_year);
	$stmt->bindParam(3,$this->fees);
	$stmt->bindParam(4,$this->payment_type);
	$stmt->bindParam(5,$this->total_installments);
	$stmt->bindParam(6,$this->payment_plan_date);
	$stmt->bindParam(7,$this->promotion_status);
	$stmt->bindParam(8,$this->joindate);
	$stmt->bindParam(9,$this->feesconcession_given);
	
 	if($stmt->execute()){
		return "success";
	}
	else{
		return "fail";
	}
}
catch(Exception $ex){
	return $ex.errorMessage();
}
}

//select all data
function readAll(){
	$query="SELECT * FROM ". $this->table_name;
	
	$stmt=$this->conn->query($query);
	$output=array();
	$output=$stmt->fetchall(PDO::FETCH_ASSOC);
	return $output;
}



}
?>