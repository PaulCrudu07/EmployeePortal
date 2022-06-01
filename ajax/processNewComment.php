
<?php
session_start();
require_once('../includes/db.php');
//Geting the information through the comment form
$comment= $_GET['comment_text'];
$employee_id= $_GET['employee_id'];
$admin_id= $_SESSION['userData']['admin_id'];

//If the user is logged in the comment can be inserted into the table
if(isset($_SESSION['userData']['admin_id'])){
	$sql="INSERT INTO comments (comment_text, employee_id, admin_id) VALUES ( :comment, :employee_id, :adminid)";
	$result = $DBH->prepare($sql);
    $result->bindParam(':comment', $comment);
    $result->bindParam(':employee_id', $employee_id);
	 $result->bindParam(':adminid', $admin_id);
	
	
	$result->execute();
	
	echo "<script> window.location.assign('https://www.crup1-18.wbs.uni.worc.ac.uk/Company/index.php?p=forum'); </script>";
	
	}
	
	
?>

