<?php
if(!$_SESSION['loggedin']){
		//User is not logged in
		
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}
?>
<br><br><h1><p style ='text-align:center; font-family:Helvetica,sans-serif;'> Forum</h1>
<?php
//Displaying all the information from the employees table 

		$query = "SELECT * FROM employees  ";
		$result = $DBH->prepare($query);
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			
			?>

<br>
<br>
<div class="container card mt-5" style="max-width: 700px;">
  
  <div class="card-body">
    <h5 class="card-title">Welcome!</h5>
      
    <p class="card-text">Today we have another brilliant persons who joined us. Please welcome <?php echo $row['employee_name'];  ?> who is <?php echo $row['employee_age'];?> and joined today to the <?php echo $row['employee_departament'];  ?> department. If you want, you can contact <?php echo $row['employee_name'];  ?> at the new company email: <?php echo $row['employee_email'];  ?> </p>
      
      <?php 
	//Based on the employee id founded above and the user that is logged in the session is selecting and displaying the comments and the first name of the user who wrote that comment 		
	  echo "<br>Comments<br>"; 
	$employee_id= $row['employee_id'];
	$admin_id = $_SESSION['userData']['admin_id'];
	$sql = "SELECT * FROM comments LEFT JOIN admins  ON admins.admin_id= comments.admin_id WHERE employee_id = :employeeid";
	$sql_comment = $DBH->prepare($sql);
	$sql_comment->bindParam(':employeeid', $employee_id);
	$sql_comment->execute();

	while($row_comment = $sql_comment->fetch(PDO::FETCH_ASSOC)) {
		echo $row_comment['comment_text']."-";
	    echo $row_comment['admin_firstname']; 
       ?>
		<!--A way to delete the comments-->
	 <form action="ajax/removecomment.php">
		 <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $row_comment['comment_id']?>" >
	 <button type="submit"id="button" class="fa fa-times pull-right"></button>
	 </form>
	 <?php
	}
?>
      
   <p class="card-text"><small class="text-muted">   <form action="ajax/processNewComment.php">	
 <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $row['employee_id']?>" >
Comments:<input name="comment_text" id="comment_text" rows="5" cols="50"><br>
<br>
<button type="submit"  id="addcomment">Submit Comments</button> <!--the button that will sumbit the information and will update the database-->
	
</form>
      
   </small></p>
  </div>
</div>
<br>
<?php
	
	
		}
?>
