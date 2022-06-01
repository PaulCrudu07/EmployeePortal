<?php
require_once('../includes/db.php');

//Getting the informations from the form in dashboard plus the actual admin id
$employeename=$_GET['employeename'];
$employeeemail=$_GET['employeeemail'];
$employeeage=$_GET['employeeage'];
$employeedepartament=$_GET['employeedepartament'];
$employeegender=$_GET['employeegender'];
$admin_id= $_SESSION['userData']['admin_id'];

//If user logged in the information can be sented to the database
if(isset($_SESSION['userData']['admin_id'])){
	$query="INSERT INTO employees (employee_name, employee_email, employee_age, employee_departament, employee_gender, admin_id) VALUES (:employeename, :employeeemail, :employeeage, :employeedepartament,  :employeegender, :adminid)";
	$result = $DBH->prepare($query);
    $result->bindParam(':employeename', $employeename);
    $result->bindParam(':employeeemail', $employeeemail);
    $result->bindParam(':employeeage', $employeeage);
    $result->bindParam(':employeedepartament', $employeedepartament);
	$result->bindParam(':employeegender', $employeegender);
	$result->bindParam(':adminid', $admin_id);
	$result->execute();

echo "<script> window.location.assign('https://www.crup1-18.wbs.uni.worc.ac.uk/Company/index.php?p=dashboard'); </script>";
}
?>